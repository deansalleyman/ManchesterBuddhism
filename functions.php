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

class MV_Cleaner_Walker_Nav_Menu extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item','active' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth) {
        $output .= "</li>\n";
    }
}

?>