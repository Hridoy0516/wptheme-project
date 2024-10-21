<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


class Portfolio_Post_Filter extends Widget_Base
{


	public function get_name()
	{
		return 'portfolio-post';
	}


	public function get_title()
	{
		return __('Portfolio Post', 'elementor-hello-world');
	}


	public function get_icon()
	{
		return 'eicon-post-list';
	}

	public function get_categories()
	{
		return ['techub-cat-widget'];
	}


	public function get_script_depends()
	{
		return ['elementor-hello-world'];
	}


	protected function register_controls()
	{

		$this->register_controls_section();
		$this->style_tab_content();
	}


	protected function register_controls_section(){



		// about Button section
		$this->start_controls_section(
			'Portfolio_Post_Filter_section',
			[
				'label' => esc_html__('Portfolio Post', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);


		$this->add_control(
			'post_cat_list',
			[
				'label' => esc_html__( 'Category Include', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => post_cat('portfolio-cat'), 
				'label_block' => true,
				'multiple' => true,
			]
		);


		$this->add_control(
			'post_cat_exclude',
			[
				'label' => esc_html__( 'Category Exclude', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => post_cat('portfolio-cat'),
				'label_block' => true,
				'multiple' => true,
			]
		);


		$this->add_control(
			'post_in',
			[
				'label' => esc_html__( 'Post Include', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => get_all_post(),
				'label_block' => true,
				'multiple' => true,
			]
		);

		$this->add_control(
			'post_not_in',
			[
				'label' => esc_html__( 'Post Exclude', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => get_all_post(),
				'label_block' => true,
				'multiple' => true,
			]
		);


		
		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Order', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'asc',
				'options' => [
					'asc' => esc_html__( 'ASC', 'techub_core' ),
					'desc' => esc_html__( 'DESC', 'techub_core' ),
				],
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Order by', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
			        'ID' => 'Post ID',
			        'author' => 'Post Author',
			        'title' => 'Title',
			        'date' => 'Date',
			        'modified' => 'Last Modified Date',
			        'parent' => 'Parent Id',
			        'rand' => 'Random',
			        'comment_count' => 'Comment Count',
			        'menu_order' => 'Menu Order',
				],
			]
		);



	$this->end_controls_section();;
	}

	protected function style_tab_content(){

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'elementor-hello-world'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Text Color', 'techub_core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .techub-btn',
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		// normal section 
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__('Normal', 'techub_core'),
			]
		);



		$this->end_controls_tab();

		// hover
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__('Hover', 'techub_core'),
			]
		);





		$this->end_controls_tab();

		$this->end_controls_tabs();

	$this->end_controls_section();
	}


	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page'=>$settings['post_per_page'],
			'orderby' => $settings['post_orderby'],
			'order' => $settings['post_order'],
			'post__in' => $settings['post_in'],
			'post__not_in' => $settings['post_not_in'],			
		);

		if(!empty($settings['post_cat_list'] ) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-cat',
					'field' => 'slug',
					'terms' => $settings['post_cat_exclude'] ? $settings['post_cat_exclude'] : $settings['post_cat_list'],
					'operator' => $settings['post_cat_exclude'] ? 'NOT IN' : 'IN',
				),
			);
		}


		$query = new \WP_Query($args);

?>

        <!-- portfolio area start -->
        <section class="tp-portfolio-area pt-120 pb-90">
            <div class="container">
				<div class="portfolio-filter-button masonary-menu text-center mb-20">
				<button class="active" data-filter="*">show all</button>
				  <?php foreach($settings['post_cat_list'] as $item) : ?>
				      <button data-filter=".<?php echo esc_html($item); ?>"><?php echo  post_cat('portfolio-cat')[$item] ; ?></button>
				   <?php endforeach;?>
				</div>
                <div class="row grid">
				<?php if ( $query->have_posts() ) : while($query-> have_posts()  ) : $query->the_post(); 
						$categories = get_the_terms(get_the_ID(),'portfolio-cat');
					?>

                    <div class="col-xl-4 col-lg-6 col-md-6 grid-item <?php echo techub_get_cat_data($categories,' ','slug'); ?> ">
                        <div class="tp-project-3-slide-wrapper mb-30 ">
                            <div class="tp-project-3-thumb tp-project-3-thumb-inner p-relative">
							<?php the_post_thumbnail(); ?>
                                <div class="tp-project-3-down-content text-center">
                                    <span><?php echo techub_get_cat_data($categories,' ,','name'); ?></span>
                                    <h4 class="tp-project-3-down-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>

					<?php endwhile; endif; ?>	

                </div>
            </div>
        </section>
        <!-- portfolio area end -->


<?php

	}
}

$widgets_manager->register(new Portfolio_Post_Filter());
