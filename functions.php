<?php

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
add_image_size( 'banner-image', 615, 320 ); }

function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main menu' ),
      'footer_menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


add_filter( 'body_class', 'buddhism_manchester_body_classes' );
function buddhism_manchester_body_classes( $classes ) {
if ( is_singular() && ! is_home()  && ! is_page_template( 'sidebar-page.php' ) )
$classes[] = 'singular';

	return $classes;
}


add_action( 'init', 'create_post_type' );
function create_post_type() {

$args = array(
'labels' => array(
		'name' => __( 'quotes' ),
		'singular_name' => __( 'quotes' ),
		'add_new' => 'Add New',
		    'add_new_item' => 'Add New Quote',
		    'edit_item' => 'Edit Quote',
		    'new_item' => 'New Quote',
		    'all_items' => 'All Quotes',
		    'view_item' => 'View Quote',
		    'search_items' => 'Search Quotes',
		    'not_found' =>  'No Quotes found',
		    'not_found_in_trash' => 'No Quotes found in Trash', 
		    'parent_item_colon' => '',
		    'menu_name' => 'Quotes'
	),
'public' => true,
'has_archive' => true,
'show_ui'=> true,
'show_in_menu'=> true,
'supports'=> array('title','editor','custom-fields','excerpt','post-formats' )
);

	register_post_type( 'quotes',$args);//register_post_type
	

	$args_ext_links = array(
	'labels' => array(
			'name' => __( 'External Links' ),
			'singular_name' => __( 'External Link' ),
			'add_new' => 'Add New',
			    'add_new_item' => 'Add New Link',
			    'edit_item' => 'Edit Link',
			    'new_item' => 'New Link',
			    'all_items' => 'All Links',
			    'view_item' => 'View Link',
			    'search_items' => 'Search Links',
			    'not_found' =>  'No Links found',
			    'not_found_in_trash' => 'No Links found in Trash', 
			    'parent_item_colon' => '',
			    'menu_name' => 'Links'
		),
	'public' => true,
	'has_archive' => true,
	'show_ui'=> true,
	'show_in_menu'=> true,
	'supports'=> array('title','editor','custom-fields','excerpt','post-formats','thumbnail'  )
	);
	
		register_post_type( 'ext_links',$args_ext_links);//register_post_type
		
		$args_carousel = array(
		'labels' => array(
				'name' => __( 'carousel' ),
				'singular_name' => __( 'carousel' ),
				'add_new' => 'Add New',
				    'add_new_item' => 'Add New carousel image',
				    'edit_item' => 'Edit carousel image',
				    'new_item' => 'New carousel image',
				    'all_items' => 'All carousel images',
				    'view_item' => 'View carousel image',
				    'search_items' => 'Search carousel images',
				    'not_found' =>  'No carousel images found',
				    'not_found_in_trash' => 'No carousel images found in Trash', 
				    'parent_item_colon' => '',
				    'menu_name' => 'Carousel'
			),
		'public' => true,
		'has_archive' => true,
		'show_ui'=> true,
		'show_in_menu'=> true,
		'supports'=> array('title','editor','custom-fields','excerpt','post-formats','thumbnail'  )
		);
		
register_post_type( 'carousel',$args_carousel);//register_post_type
	
	
}//create_post_type

add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {
$args = array(
	'name'          => __( 'Right Sidebar' ),
	'id'            => 'right_sidebar',
	'description'   => '',
        'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args ); 
}//'register_sidebar'

?>