<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );
/**
 * Enqueue all theme scripts and styles
 *

  /** --------------------------------------
 * ** REGISTERING THEME ASSETS
 * ** ------------------------------------ */
/**
 * Enqueue styles.
 */

if ( !is_admin() ) {
    wp_enqueue_style( 'geobin-fonts', 'https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap', null, GEOBIN_VERSION );
	wp_enqueue_style( 'bootstrap', GEOBIN_CSS . '/bootstrap.min.css', null, GEOBIN_VERSION );
	wp_enqueue_style( 'geobin-xs-main', GEOBIN_CSS . '/xs_main.css', null, GEOBIN_VERSION );
	wp_enqueue_style( 'geobin-custom-blog', GEOBIN_CSS . '/blog-style.css', microtime(), GEOBIN_VERSION );
    wp_enqueue_style( 'icofonts', GEOBIN_CSS . '/icofonts.css', null, GEOBIN_VERSION );
    
	wp_enqueue_style( 'font-awesome', GEOBIN_CSS . '/font-awesome.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'owlcarousel', GEOBIN_CSS . '/owlcarousel.min.css', null, GEOBIN_VERSION );
	wp_enqueue_style( 'owl-theme', GEOBIN_CSS . '/owltheme.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-style', GEOBIN_CSS . '/style.css', microtime(), GEOBIN_VERSION );
    //Enqueue gutenberg front block styles
    wp_enqueue_style( 'geobin-gutenberg-custom', GEOBIN_CSS . '/gutenberg-custom.css', null, GEOBIN_VERSION );
    wp_enqueue_style( 'geobin-responsive', GEOBIN_CSS . '/responsive.css', microtime(), GEOBIN_VERSION );
    if ( is_rtl() ) {
		wp_enqueue_style( 'geobin-rtl', GEOBIN_CSS . '/rtl.css', null, GEOBIN_VERSION );
	}

}

/**
 * Enqueue scripts.
 */
if ( !is_admin() ) {
    wp_enqueue_script( 'bootstrap', GEOBIN_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), GEOBIN_VERSION, true );

    wp_enqueue_script( 'easy-pie-chart', GEOBIN_SCRIPTS . '/easy-pie-chart.js', array( 'jquery' ), GEOBIN_VERSION, true );
    wp_enqueue_script( 'popper-min', GEOBIN_SCRIPTS . '/popper.min.js', array( 'jquery' ), GEOBIN_VERSION, true );
    wp_enqueue_script( 'owl-carousel', GEOBIN_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), GEOBIN_VERSION, true );
    wp_enqueue_script( 'waypoints', GEOBIN_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), GEOBIN_VERSION, true );
    wp_enqueue_script( 'jquery-counterup', GEOBIN_SCRIPTS . '/jquery.counterup.min.js', array( 'waypoints' ), GEOBIN_VERSION, true );
    wp_enqueue_script( 'jquery-magnific-popup', GEOBIN_SCRIPTS . '/jquery.magnific.popup.js', array( 'jquery' ), GEOBIN_VERSION, true );

  
    wp_enqueue_script( 'geobin-main-js', GEOBIN_SCRIPTS . '/main.js', array( 'jquery' ), GEOBIN_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


