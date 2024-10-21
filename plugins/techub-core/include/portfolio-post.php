<?php 


function portfolio_page_template( $template ) {
    if ( is_singular( 'portfolio' )  ) {
        $new_template = __DIR__.'/template/portfolio-single.php';
	if ( '' != $new_template ) {
	    return $new_template ;
	}
    }
    return $template;
}
add_filter( 'template_include', 'portfolio_page_template', 99 );


function create_portfolio_post_type() {
    $labels = array(
        'name'               => _x( 'Portfolios', 'techub_core' ),
        'singular_name'      => _x( 'Portfolio', 'techub_core' ),
        'menu_name'          => __( 'Portfolios', 'techub_core' ),
        'name_admin_bar'     => __( 'Portfolio','techub_core' ),
        'add_new'            => __( 'Add New', 'techub_core' ),
        'add_new_item'       => __( 'Add New Portfolio', 'techub_core' ),
        'new_item'           => __( 'New Portfolio', 'techub_core' ),
        'edit_item'          => __( 'Edit Portfolio', 'techub_core' ),
        'view_item'          => __( 'View Portfolio', 'techub_core' ),
        'all_items'          => __( 'All Portfolios', 'techub_core' ),
        'search_items'       => __( 'Search Portfolios', 'techub_core' ),
        'not_found'          => __( 'No portfolios found.', 'techub_core' ),
        'not_found_in_trash' => __( 'No portfolios found in Trash.', 'techub_core' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        // Customize the slug here
        'rewrite'            => array('slug' => 'portfolio'), // Custom slug
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('portfolio', $args);


  // Taxomoy catagories 
      $labels = array(
        'name'              => _x( 'Portfolio Categories', 'techub_core' ),
        'singular_name'     => _x( 'Portfolio Category', 'techub_core' ),
        'search_items'      => __( 'Search Portfolio Categories', 'techub_core' ),
        'all_items'         => __( 'All Portfolio Categories', 'techub_core' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'techub_core' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', 'techub_core' ),
        'edit_item'         => __( 'Edit Portfolio Category', 'techub_core' ),
        'update_item'       => __( 'Update Portfolio Category', 'techub_core' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'techub_core' ),
        'new_item_name'     => __( 'New Portfolio Category Name', 'techub_core' ),
        'menu_name'         => __('Portfolio Categories','techub_core' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        // Customize the slug here
        'rewrite'           => array('slug' => 'portfolio-cat'), // Custom slug
    );

    register_taxonomy('portfolio-cat', array('portfolio'), $args);



    	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Tags', 'taxonomy general name', 'techub_core' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'techub_core' ),
		'search_items'               => __( 'Search tags', 'techub_core' ),
		'popular_items'              => __( 'Popular tags', 'techub_core' ),
		'all_items'                  => __( 'All tags', 'techub_core' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit tag', 'techub_core' ),
		'update_item'                => __( 'Update tag', 'techub_core' ),
		'add_new_item'               => __( 'Add New tag', 'techub_core' ),
		'new_item_name'              => __( 'New tag Name', 'techub_core' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'techub_core' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'techub_core' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'techub_core' ),
		'not_found'                  => __( 'No tags found.', 'techub_core' ),
		'menu_name'                  => __( 'Tags', 'techub_core' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'portfolio-tag' ),
	);

	register_taxonomy( 'portfolio-tag', 'portfolio', $args );

}
add_action('init', 'create_portfolio_post_type');










?>