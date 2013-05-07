<nav>

<?php 

$args = array(
	'theme_location'  => 'main_menu',
	'menu'            => 'main_menu',
	'container'       => 'div',
	'container_class' => 'navbar',
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<div class="navbar-inner"><ul id="%1$s" class="%2$s">%3$s</ul></div>',
	'depth'           => 0,
	'walker'          => new MV_Cleaner_Walker_Nav_Menu()
);


wp_nav_menu($args); ?>
</nav>