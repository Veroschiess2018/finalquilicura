<?php 

function register_enqueue_style(){
$theme_data = wp_get_theme();

wp_register_style('mitema.css', 'https://fonts.googleapis.com/css?family=Cormorant+Unicase|Roboto');

wp_register_style('animate.css', get_theme_file_uri('css/animate.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('icomoon.css', get_theme_file_uri('css/icomoon.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('themify-icons.css', get_theme_file_uri('css/themify-icons.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('bootstrap.css', get_theme_file_uri('css/bootstrap.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('carousel.min.css', get_theme_file_uri('css/owl.carousel.min.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('owl.theme.default.min.css', get_theme_file_uri('css/owl.theme.default.min.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('style.css', get_theme_file_uri('css/style.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('Historia.css', get_theme_file_uri('css/Historia.css'), null, $theme_data->get('Version'), 'screen');
wp_register_style('index.css', get_theme_file_uri('index.css'), null, $theme_data->get('Version'), 'screen');



wp_enqueue_style('mitema.css');
wp_enqueue_style('animate.css');
wp_enqueue_style('icomoon.css');
 wp_enqueue_style('themify-icons.css');
 wp_enqueue_style('bootstrap.css');
 wp_enqueue_style('carousel.min.css');
 wp_enqueue_style('owl.theme.default.min.css');
 wp_enqueue_style('index.css');
 wp_enqueue_style('Historia.css');
 wp_enqueue_style('style.css');

 
}
add_action('wp_enqueue_scripts', 'register_enqueue_style');



function register_enqueue_scripts(){
$theme_data = wp_get_theme();


wp_deregister_script('jquery');
wp_deregister_script('jquery_migrate');


wp_register_script('jQuery3', get_parent_theme_file_uri('mitema/js/jQuery.min.js'), array ('jQuery_migrate'), null, true);
wp_register_script('bootstrap', get_parent_theme_file_uri('mitema/js/bootstrap.min.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('google_map', get_parent_theme_file_uri('mitema/js/google_map.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('jQuery_easing', get_parent_theme_file_uri('mitema/js/jQuery_easing.1.3.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('jQuery_waypoints', get_parent_theme_file_uri('mitema/js/jQuery_waypoints.min.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('main', get_parent_theme_file_uri('mitema/js/main.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('modernizr-2.6.2.min', get_parent_theme_file_uri('mitema/js/modernizr-2.6.2.min.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('owl_carousel.min', get_parent_theme_file_uri('mitema/js/owl_carousel.min.js'), array ('jQuery3_migrate'), null, true);
wp_register_script('respond.min', get_parent_theme_file_uri('mitema/js/respond.min.js'), array ('jQuery3_migrate'), null, true);

wp_enqueue_script('jQuery');
wp_enqueue_script('bootstrap');
wp_enqueue_script('google_map');
wp_enqueue_script('jQuery_easing');
wp_enqueue_script('jQuery_waypoints');
wp_enqueue_script('main.js');
wp_enqueue_script('modernizr-2.6.2.min');
wp_enqueue_script('owl_carousel.min');
wp_enqueue_script('respond.min');

}
add_action('wp_enqueue_scripts', 'register_enqueue_scripts');


    function config_custom_logo() {
    
    add_theme_support( 'custom-logo', array(
      'height'      => 200,
      'width'       => 200,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
    ));
  }
  add_action( 'after_setup_theme', 'config_custom_logo' );

	function thumbnails_setup() {
	add_theme_support( 'post-thumbnails' );

	function dl_images_sizes( $sizes ) {

		$add_sizes = array( 
		'portfolio-home' => __('Tamaño de las imágenes del portafolio en home'  ),
		'square' => __('Tamaño personalizado para hacer cuadradas las imágenes'  ),
		'post-custom-size' => __('Tamaño personalizado para la imágen destacada de los post'  ),
		'custom-size-blog' => __('Tamaño personalizado para la imágen destacada de los post'  ));

		return array_merge( $sizes, $add_sizes );
	}
		if ( function_exists( 'add_theme_support' ) ){
		add_image_size( 'portfolio-home', 465, 250, true);
		add_image_size( 'square', 400, 400, true);
		add_image_size( 'post-custom-size', 800, 600, true);
		add_image_size( 'custom-size-blog', 200, 200, true);
		}

}
		function menus_setup() {
		register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' ),
			'footer-menu'	=> __( 'Footer Menu' ),
		)
	);
}
		add_action( 'after_setup_theme', 'menus_setup' );


		// Register Custom Post Type
function proyecto_post_type() {

	$labels = array(
		'name'                  => _x( 'proyectos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'proyecto', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Post Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'proyecto', 'text_domain' ),
		'description'           => __( 'personalización del proyecto', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'proyecto', $args );

}
add_action( 'init', 'proyecto_post_type', 0 );

 function dl_widgets() {
  	register_sidebar( array(
  		'name' => 'Widget Footer',
  		'id' => 'widget_footer'
  	));
  }
  add_action('widgets_init', 'dl_widgets');

// Register Custom Post Type
function blog() {

	$labels = array(
		'name'                  => _x( 'blogs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'blog', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'blog', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'blog', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'blog', $args );

}
	add_action( 'init', 'blog', 0 );

Remove_action ("shutdown", "wp_ob_end_flush_all",1);
?>


