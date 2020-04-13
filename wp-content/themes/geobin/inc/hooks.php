<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );

/**
 * Theme’s filters and actions
 */
/*
 * Widget register
 */
if ( !function_exists( 'geobin_widget_init' ) ) {

	function geobin_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
			array(
				'name'			 => esc_html__( 'Blog Widget Area', 'geobin' ),
				'id'			 => 'sidebar-1',
				'description'	 => esc_html__( 'Appears on posts and pages.', 'geobin' ),
				'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
				'after_widget'	 => '</div> <!-- end widget -->',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3><span class="animate-border border-offwhite tw-mt-20"></span>',
			) );
			register_sidebar(
			array(
				'name'			 => esc_html__( 'Woocommerce sidebar Area', 'geobin' ),
				'id'			 => 'sidebar-woo',
				'description'	 => esc_html__( 'Appears on posts and pages.', 'geobin' ),
				'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
				'after_widget'	 => '</div> <!-- end widget -->',
				'before_title'	 => '<h3 class="widget-title">',
				'after_title'	 => '</h3><span class="animate-border border-offwhite tw-mt-20"></span>',
			) );
		}
	}

	add_action( 'widgets_init', 'geobin_widget_init' );
}
if ( !function_exists( 'geobin_footer_widgets' ) ) {

	function geobin_footer_widgets() {
		if ( !defined( 'FW' ) ) {
			return;
		}
		register_sidebar( array(
			'name'			 => esc_html__( 'Footer Widget one top', 'geobin' ),
			'id'			 => 'footer-widget-top',
			'description'	 => esc_html__( 'Widgets for first footer area', 'geobin' ),
			'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<h3 class="widget-title">',
			'after_title'	 => '</h3>',
		) );

		register_sidebar( array(
			'name'			 => esc_html__( 'Footer 2', 'geobin' ),
			'id'			 => 'footer-2',
			'description'	 => esc_html__( 'Widgets for second footer area', 'geobin' ),
			'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s"><div class="col-md-12">',
			'after_widget'	 => '</div></div>',
			'before_title'	 => '<h3 class="widget-title">',
			'after_title'	 => '</h3>',
		) );

		register_sidebar( array(
			'name'			 => esc_html__( 'Footer 3', 'geobin' ),
			'id'			 => 'footer-3',
			'description'	 => esc_html__( 'Widgets for 3rd footer area', 'geobin' ),
			'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<h3 class="widget-title">',
			'after_title'	 => '</h3><span class="animate-border border-black"></span>',
		) );

		register_sidebar( array(
			'name'			 => esc_html__( 'Footer 4', 'geobin' ),
			'id'			 => 'footer-4',
			'description'	 => esc_html__( 'Widgets for 4th footer area', 'geobin' ),
			'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<h3 class="widget-title">',
			'after_title'	 => '</h3><span class="animate-border border-black"></span>',
		) );
	
	}

	add_action( 'widgets_init', 'geobin_footer_widgets' );
}

/*
 * TGM REQUIRE PLUGIN
 * require or recommend plugins for your WordPress themes
 */

/** @internal */
function _action_geobin_register_required_plugins() {
	$plugins = array(
		array(
			'name'		 => esc_html__( 'Unyson', 'geobin' ),
			'slug'		 => 'unyson',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Elementor', 'geobin' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Geobin Features', 'geobin' ),
			'slug'		 => 'geobin-features',
			'required'	 => true,
			'source'	 => esc_url( GEOBIN_THEMEROOT ) . '/inc/includes/plugins/geobin-features.zip',
		),
		array(
			'name'		 => esc_html__( 'Smart Slider', 'geobin' ),
			'slug'		 => 'smart-slider',
			'required'	 => true,
			'source'	 => esc_url( GEOBIN_THEMEROOT ) . '/inc/includes/plugins/smart-slider.zip',
		),
		array(
			'name'		 => esc_html__( 'Contact Form 7', 'geobin' ),
			'slug'		 => 'contact-form-7',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'MailChimp for WordPress', 'geobin' ),
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => true,
		),
        array(
			'name'		 => esc_html__( 'Elements Kit', 'geobin' ),
			'slug'		 => 'elementskit-lite',
		),
	);



	$config = array(
		'id'			 => 'geobin', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'geobin-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => true, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', '_action_geobin_register_required_plugins' );



/*
 * Custom font for typography
 *  since 1.0
 *
 */

function geobin_filter_theme_typography_custom_fonts( $fonts ) {

	$gilroy			 = array(
		'family' => 'gilroylight'
	);
	$gilroyextrabold = array(
		'family' => 'gilroyextrabold'
	);
	array_push( $fonts, 'gilroylight', 'gilroyextrabold' );
	return $fonts;
}

add_filter( 'fw_option_type_typography_v2_standard_fonts', 'geobin_filter_theme_typography_custom_fonts' );






spl_autoload_register( 'geobin_theme_includes_autoload' );

function geobin_theme_includes_autoload( $class ) {
	switch ( $class ) {
		case 'Unyson_Google_Fonts':
			require_once GEOBIN_INC . '/includes/unyson-google-fonts/class-unyson-google-fonts.php';
			break;
	}
}

function geobin_excerpt_label( $translation, $original ) {
	if ( 'Excerpt' == $original ) {
		return esc_html__( 'Services short note', 'geobin' );
	} elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
		return esc_html__( 'Add your services short note which show in homepage', 'geobin' );
	}
	return $translation;
}

add_filter( 'gettext', 'geobin_excerpt_label', 100, 2 );

function geobin_excerpt( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo geobin_kses( $trimmed_content );
}

function geobin_content_read_more( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo geobin_kses( $trimmed_content );
	echo '</div><div class="post-footer"><a href="' . get_the_permalink() . '" class="ts-readmore">' . esc_html__( 'Continue', 'geobin' ) . '<i class="icon icon-arrow-right"></i></a>';
}

//Post excerpt without read more
function geobin_content_excerpt( $num = 20 ) {

	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $num_words		 = $num, $more			 = null );

	echo geobin_kses( $trimmed_content );
}

//Comment form textarea position change

function geobin_move_comment_field_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'geobin_move_comment_field_to_bottom' );

// Displsys search form.

function geobin_search_form( $form ) {
	$form = '
    <div class="search-widget input-group">
        <form method="get" action="' . esc_url( home_url( '/' ) ) . '" id="search">
                <input type="text" name="s" class="form-control"  placeholder="' . esc_attr__( 'Search..', 'geobin' ) . '" value="' . get_search_query() . '">
					<span class="search-icon">
                           <i class="fa fa-search"></i>
                        </span>
        </form>
    </div>';
	return $form;
}

add_filter( 'get_search_form', 'geobin_search_form' );






// Initializing online demo contents
function _filter_geobin_fw_ext_backups_demos( $demos ) {
    $demo_content_installer	 = 'http://demo.themewinter.com/wp/demo-content/geobin';
    $demos_array			 = array(
        'default'			 => array(
            'title'			 => esc_html__( 'Home 1-10', 'geobin' ),
            'screenshot'	 => $demo_content_installer . '/default/screenshot.png',
            'preview_link'	 => 'http://demo.themewinter.com/wp/geobin/landing/',
        ),'new1'			 => array(
            'title'			 => esc_html__( 'New 1', 'geobin' ),
            'screenshot'	 => $demo_content_installer . '/new1/screenshot.jpg',
            'preview_link'	 => 'http://demo.themewinter.com/wp/geobin/landing/',
        ),'new2'			 => array(
            'title'			 => esc_html__( 'New 2', 'geobin' ),
            'screenshot'	 => $demo_content_installer . '/new2/screenshot.jpg',
            'preview_link'	 => 'http://demo.themewinter.com/wp/geobin/landing/',
        ),

    );
    $download_url			 = $demo_content_installer . '/manifest.php';
    foreach ( $demos_array as $id => $data ) {
        $demo					 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
            'url'		 => $download_url,
            'file_id'	 => $id,
        ) );
        $demo->set_title( $data[ 'title' ] );
        $demo->set_screenshot( $data[ 'screenshot' ] );
        $demo->set_preview_link( $data[ 'preview_link' ] );
        $demos[ $demo->get_id() ]	 = $demo;
        unset( $demo );
    }
    return $demos;
}

add_filter( 'fw:ext:backups-demo:demos', '_filter_geobin_fw_ext_backups_demos' );

