<?php
// Register and load the widget
function custom_recent_posts_widget() {
    register_widget( 'custom_recent_posts' );
}
add_action( 'widgets_init', 'custom_recent_posts_widget' );

// Creating the widget 
class custom_recent_posts extends WP_Widget {

    function __construct() {
        parent::__construct(
            'custom_recent_posts', 
            __('Techub Recent Posts', 'custom_recent_posts_domain'), 
            array( 'description' => __( 'A custom widget to display recent posts', 'custom_recent_posts_domain' ), ) 
        );
    }

    // Creating the widget front-end
    public function widget( $args, $instance ) {
        $post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 5;
        $order = ! empty( $instance['order'] ) ? $instance['order'] : 'DESC';
        $title_word_limit = ! empty( $instance['title_word_limit'] ) ? $instance['title_word_limit'] : 10;

        echo $args['before_widget'];

        // Widget title
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Query recent posts
        $recent_posts = new WP_Query( array(
            'posts_per_page' => $post_count,
            'post_status' => 'publish',
            'order' => $order
        ));

        if ( $recent_posts->have_posts() ) :
            while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                <div class="rc__post mb-5 d-flex align-items-center">
                    <div class="rc__post-thumb mr-20">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
                        </a>
                    </div>
                    <div class="rc__post-content">
                        <div class="rc__meta">
                            <span><i class="fa-thin fa-comments"></i> 
                                <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
                            </span>
                        </div>
                        <h3 class="rc__post-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo wp_trim_words(get_the_title(), $title_word_limit, '...'); ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;

        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'Recent Posts', 'custom_recent_posts_domain' );
        }

        if ( isset( $instance[ 'post_count' ] ) ) {
            $post_count = $instance[ 'post_count' ];
        } else {
            $post_count = 5;
        }

        if ( isset( $instance[ 'order' ] ) ) {
            $order = $instance[ 'order' ];
        } else {
            $order = 'DESC';
        }

        if ( isset( $instance[ 'title_word_limit' ] ) ) {
            $title_word_limit = $instance[ 'title_word_limit' ];
        } else {
            $title_word_limit = 10;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="number" value="<?php echo esc_attr( $post_count ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order:' ); ?></label> 
            <select class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
                <option value="DESC" <?php selected( $order, 'DESC' ); ?>>Descending</option>
                <option value="ASC" <?php selected( $order, 'ASC' ); ?>>Ascending</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title_word_limit' ); ?>"><?php _e( 'Title Word Limit:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title_word_limit' ); ?>" name="<?php echo $this->get_field_name( 'title_word_limit' ); ?>" type="number" value="<?php echo esc_attr( $title_word_limit ); ?>" />
        </p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? intval( $new_instance['post_count'] ) : 5;
        $instance['order'] = ( ! empty( $new_instance['order'] ) ) ? strip_tags( $new_instance['order'] ) : 'DESC';
        $instance['title_word_limit'] = ( ! empty( $new_instance['title_word_limit'] ) ) ? intval( $new_instance['title_word_limit'] ) : 10;
        return $instance;
    }
} // Class custom_recent_posts ends here
?>
