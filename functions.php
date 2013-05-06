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



?>