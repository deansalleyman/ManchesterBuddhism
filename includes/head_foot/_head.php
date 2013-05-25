<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7"  class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8"  class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9"  class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <!-- Bootstrap -->
	  <link href="<?php echo get_template_directory_uri(); ?>/resources/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  	  <link href="<?php echo get_template_directory_uri(); ?>/resources/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<script src='<?php bloginfo('template_directory'); ?>/resources/js/modernizr.custom.78312.js'></script>
	</head>
<body <?php body_class(); ?>>
