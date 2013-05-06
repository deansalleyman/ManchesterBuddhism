<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'main_menu' => __( 'Main menu' ),
      'extra-menu' => __( 'Extra Menu' )
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
		'name' => __( 'Quotes' ),
		'singular_name' => __( 'Quotes' ),
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
}//create_post_type


?>