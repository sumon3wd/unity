<!-- The WordPress Menu goes here -->
<?php
$xs_menu_class		 = '';
$xs_mobilemenu_class = '';
if ( !defined( 'FW' ) ) {
	$xs_menu_class = ' xs_menu_class';
} else {
	$xs_mobilemenu_class = ' xs_mobile_menu_class';
}
if ( defined( 'FW' ) ) {
	$xs_mobilemenu_class = ' xs_mobile_menu_class';
}
if ( has_nav_menu( 'primary' ) ) {
	wp_nav_menu(
	array(
		'theme_location'	 => 'primary',
		'container_class'	 => 'collapse navbar-collapse justify-content-center' . $xs_menu_class . $xs_mobilemenu_class,
		'container_id'		 => 'navbarSupportedContent',
		'menu_class'		 => 'nav navbar-nav main-menu',
		'container'			 => 'div',
		'menu_id'			 => 'main-menu',
		'fallback_cb'		 => false
	)
	);
}
?>


<!--Displays the offcanvas menu -->
<?php
if ( defined( 'FW' ) ) {
	get_template_part( 'template-parts/navigation/offcanvas' );
}
?>


