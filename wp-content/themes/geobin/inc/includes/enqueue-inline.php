<?php

function geobin_action_xs_hook_css() {
	if ( defined( 'FW' ) ) {
		$main_color		 = fw_get_db_customizer_option( 'geobin_theme_color' );
		$secondary_color = fw_get_db_customizer_option( 'theme_secondary_color' );
		$geobin_body_bg_color = fw_get_db_customizer_option( 'geobin_body_bg_color' );
      $xs_secondary_color = $secondary_color != '' ? ".entry-header .entry-title a:hover{color: $secondary_color;}" : '';
      $xs_geobin_body_bg_color = $geobin_body_bg_color != '' ? "body{background-color: $geobin_body_bg_color;}" : '';

		$color_hex = geobin_color_rgb( $main_color );

		//global font
		$global_body_font = fw_get_db_customizer_option( 'geobin_body_font' );
		if ( $global_body_font[ 'family' ] != 'gilroylight' || $global_body_font[ 'family' ] != 'gilroyextrabold' ) {
			Unyson_Google_Fonts::add_typography_v2( fw_get_db_customizer_option( 'geobin_body_font' ) );
		}
		$body_font = geobin_advanced_xs_font_styles( fw_get_db_customizer_option( 'geobin_body_font' ) );




		$heading_title = fw_get_db_customizer_option( 'geobin_heading_title' );
		if ( $heading_title[ 'family' ] != 'gilroylight' && $heading_title[ 'family' ] != 'gilroyextrabold' ) {
			Unyson_Google_Fonts::add_typography_v2( fw_get_db_customizer_option( 'geobin_heading_title' ) );
		}
        $global_title = geobin_advanced_xs_font_styles( fw_get_db_customizer_option( 'geobin_heading_title' ) );

		Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'extra_fonts' ) );
		Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'extra_fonts_2' ) );
		$global_subtitle = geobin_advanced_xs_font_styles( fw_get_db_settings_option( 'extra_fonts' ) );

		//Heading font color
        $primary_heading_font		        = fw_get_db_customizer_option( 'primary_heading_font' );
        $xs_primary_heading_font = $primary_heading_font != '' ? " h1, h2{font-weight:" . $primary_heading_font . ";}" : '';

        $secondary_heading_font		        = fw_get_db_customizer_option( 'secondary_heading_font' );
        $xs_secondary_heading_font = $secondary_heading_font != '' ? "h3, h4, h5{font-weight:" . $secondary_heading_font . ";}" : '';
		// banner title color
		$banner_title_color = fw_get_db_customizer_option('geobin_banner_title_color');
		

		//   top bar settings
		$top_bg_color = fw_get_db_customizer_option('top_bg_color');
		$top_text_color = fw_get_db_customizer_option('top_text_color');

	

		$xs_top_bg_color = $top_bg_color != '' ? ".tw-top-bar{background-color:".$top_bg_color.";}" : '';
		$xs_top_text_color = $top_text_color != '' ? ".top-contact-info span,.top-social-links a, .top-social-links > span{color:".$top_text_color.";}" : '';


        //  Menu Settings
        $menu_bg_color		        = fw_get_db_customizer_option( 'menu_bg_color' );
        $menu_bg_shadow		        = fw_get_db_customizer_option( 'box_shadow' );
		$xs_menu_bg_shdow	 = $menu_bg_shadow === 'yes' ? '    box-shadow: none;' : '';

        $xs_menu_bg_color = $menu_bg_color != '' ? ".full-width-nav, .dark-nav, .tw-head, .navbar-light.bg-white, .menu-bg{background:" . $menu_bg_color . " !important;$xs_menu_bg_shdow }" : '';
        $menu_text_color		    = fw_get_db_customizer_option( 'menu_text_color' );
        $xs_menu_text_color = $menu_text_color != '' ? ".navbar-nav.main-menu>li>a, .navbar-nav.main-menu>li>a:not([href]):not([tabindex]){color:".$menu_text_color.";}" : '';

        $menu_hover_color		    = fw_get_db_customizer_option( 'menu_hover_color' );
        $xs_menu_hover_color = $menu_hover_color != '' ? ".navbar-light .navbar-nav a:focus, .navbar-light .navbar-nav a:hover, .main-menu>li>a:not([href]):not([tabindex]):hover{color:".$menu_hover_color.";} ul.main-menu>li>a:before{background:".$menu_hover_color.";}" : '';

        $menu_dropdown_bg_color		= fw_get_db_customizer_option( 'menu_dropdown_bg_color' );
        $xs_menu_dropdown_bg_color = $menu_dropdown_bg_color != '' ? "ul.main-menu li > ul.sub-menu{background-color:". $menu_dropdown_bg_color .";}" : '';

        $menu_dropdown_text_color	= fw_get_db_customizer_option( 'menu_dropdown_text_color' );
        $xs_menu_dropdown_text_color = $menu_dropdown_text_color != '' ? "ul.main-menu li > ul.sub-menu li a{color: ". $menu_dropdown_text_color .";}" : '';

        $menu_dropdown_hover_color	= fw_get_db_customizer_option( 'menu_dropdown_hover_color' );
        $xs_menu_dropdown_hover_color = $menu_dropdown_hover_color != '' ? "ul.main-menu li > ul.sub-menu > li >a:hover, ul.main-menu li ul li.current-menu-item a, 
		.menu-item-has-mega-menu .mega-menu .mega-menu-row .mega-menu-col ul.sub-menu li a:hover{color: $menu_dropdown_hover_color }" : '';
		
		$search_bg_color = fw_get_db_customizer_option('search_bg_color');
		$xs_search_bg_color = $search_bg_color != '' ? ".tw-off-search{background-color:".$search_bg_color.";}" : '';

		$search_border_color = fw_get_db_customizer_option('search_border_color');
		$xs_search_border_color = $search_border_color != '' ? ".tw-search:after{background-color:".$search_border_color.";}" : '';



		//	Footer
        $footer_bg_color		 = fw_get_db_customizer_option( 'footer_bg_color' );
        $xs_footer_bg = $footer_bg_color != '' ? ".tw-footer{background-color:".$footer_bg_color.";}" : '';

		  $footer_top_bg_color		 = fw_get_db_customizer_option( 'footer_top_bg_color' );
		  
        $xs_footer_top_bg_color = $footer_top_bg_color != '' ? ".tw-footer-info-box, .footer-top-info{background: $footer_top_bg_color;}" : '';

        $widget_title_color		 = fw_get_db_customizer_option( 'widget_title_color' );
        $xs_widget_title_color = $widget_title_color != '' ? ".contact-info h3, .footer-widget h3, .tw-footer-info-box .geobin_widget h3, .footer-awarad p, .contact-info
        {color: $widget_title_color;}" : '';

        $widget_text_color		 = fw_get_db_customizer_option( 'widget_text_color' );
        $xs_widget_text_color = $widget_text_color != '' ? ".tw-footer-info-box .textwidget p, .footer-widget p{color: $widget_text_color;}" : '';

        $copyright_bg_color		 = fw_get_db_customizer_option( 'copyright_bg_color' );
        $xs_copyright_bg_color = $copyright_bg_color != '' ? ".copyright {background-color: $copyright_bg_color;}" : '';
		 
		  $copyright_text_color		 = fw_get_db_customizer_option( 'copyright_text_color' );
        $xs_copyright_text_color = $copyright_text_color != '' ? ".copyright span{color: $copyright_text_color;}" : '';

        $widget_link_color		 = fw_get_db_customizer_option( 'widget_link_color' );
        $xs_widget_link_color = $widget_link_color != '' ? ".footer-menu li a, .footer-widget a{color: $widget_link_color;}" : '';

        $widget_link_hover_color		 = fw_get_db_customizer_option( 'widget_link_hover_color' );
        $xs_widget_link_hover_color = $widget_link_hover_color != '' ? ".footer-menu li a:hover, .footer-widget a:hover{color: $widget_link_hover_color;}" : '';

        $footer_border_color		 = fw_get_db_customizer_option( 'footer_border_color' );
		$xs_footer_border_color = $footer_border_color != '' ? ".footer-classic .tw-footer-info-box .footer-social-link a i, 
		.footer-classic .mc4wp-form-fields input[type=email]{border-color: $footer_border_color;}" : '';
		
		$xs_footer_border_bg_color = $footer_border_color != '' ? ".footer-classic .animate-border.border-black:after,
		.footer-classic .mc4wp-form-fields button[type=submit]{background: $footer_border_color;}" : '';

        //custom css
		$custom_css				 = geobin_get_option( 'custom_css' );
		$output					 = "h1, h2, h3, h4, .fw-special-title{ $global_title }"
        .$xs_menu_bg_color
        .$xs_footer_bg
        .$xs_menu_text_color
        .$xs_menu_hover_color
        .$xs_menu_dropdown_bg_color
        .$xs_menu_dropdown_text_color
        .$xs_menu_dropdown_hover_color
		  .$xs_secondary_color
		  .$xs_top_bg_color
		  .$xs_top_text_color
		  .$xs_search_bg_color
		  .$xs_copyright_bg_color
		  .$xs_geobin_body_bg_color
		  .$xs_search_border_color
	

		. "body{ $body_font }.colorsbg, .separator, .separator-left, .separator, .preloader, ul.main-menu>li>a:before, .animate-border,
		.tw-pricing ul.nav .nav-item a.active, .post-date, .post-item-date:after, .tw-pricing-box:hover .btn, .navbar-light .navbar-toggler,
		.service-list-carousel .owl-nav button:hover{background: $main_color;}"
		. "a:hover, .tw-latest-post:hover .post-info .post-title a, .download-btn i,.top-bar.solid-bg ul.top-menu li a:hover,
		.top-bar.solid-bg .top-social a:hover, ul.top-menu li a:hover,  
		.team-social-icons a:hover,.top-social-links a:hover,
		.ts-testimonial-static .ts-testimonial-text:before,
		.latest-post .post-title a:hover, .team-social a:hover, 
		.plan.featured .btn, .footer-social ul li a:hover, .fw-accordion 
		.fw-accordion-title.accordion-head.ui-state-active, ul.list-dash li:before, 
		.ts-feature-info.icon-left .feature-icon, .section-title.border-left:before, 
		.job-box .job-info .desc strong, .post-meta a:hover, .post-meta-left a:hover, 
		.sidebar .widget ul li a:hover, .post-navigation span:hover, .post-navigation h3:hover,
		.post-navigation i, .post-navigation span:hover, .post-navigation h3:hover, 
		.sidebar ul li.active a, .sidebar ul li:hover a, .banner-title, .testimonial-slider .testimonial-meta h4,
		.testimonial-slider .testimonial-meta i, .nav>li>a:hover, .nav>li>a:focus, .nav>li.current-menu-item>a,
		.testimonial-slider-classic .testimonial-image i,
		.testimonial-slider-classic .owl-nav button.owl-prev, .testimonial-slider-classic .owl-nav button.owl-next,
		.tw-footer .contact-icon i, .tw-case-study-box:hover .casestudy-content .case-title,
		.main-menu li > ul.sub-menu > li >a:hover, .main-menu li ul li.current-menu-item a,
		.timeline-date.active .title, .timeline-date.active .tagline,
		.tw-testimonial-box .testimonial-text i,
		.testimonial-gray .testimonial-meta h4, .testimonial-gray .testimonial-meta i,
		.card-header h4 a i,
		.banner-title span,
		.contact-icon i,
		.ts-contact-info .ts-contact-icon, .tw-readmore, .service-list-carousel .owl-nav button.owl-next, .service-list-carousel .owl-nav button.owl-prev, .facts-content, .geobin-heading-title h2 span
		.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .woocommerce-loop-product__title:hover, .geobin-heading-title h2 span
		{color: $main_color;}"
		.".section-title.border-left:before, .section-title:after,
		.sidebar .widget-title,
		
		.timeline-badge.active{border-color:$main_color;}"
		. ".btn-primary, .xs-custom-menu > li.current-menu-item > a,
		.xs-custom-menu > li:hover > a,#main-slide .carousel-indicators li.active,
		.owl-carousel.owl-theme .owl-nav [class*=owl-],
		.owl-theme .owl-dots .owl-dot.active span,
		#main-slide .carousel-indicators li:hover, 
		#main-slide .carousel-control i:hover,
		.box-primary, .plan.featured, .quote-item .quote-text:before, 
		.quote-item-area .quote-thumb,#back-to-top .btn.btn-primary,  
		.fw-accordion .fw-accordion-title.accordion-head 
		.ui-icon:before,.finances-newsletter input[type=submit], .post-meta-date, 
		.bottom-border:after,
		.bottom-border:before,
		.case-process-number,
		.testimonial-bg-orange,
		.tw-testimonial-carousel:before,
		.footer-classic .tw-footer-info-box .footer-social-link a i:hover,
		.pagination>.active>a, .pagination>.active>a:hover, .pagination>li>a:hover, .offcanvas-menu-lite.bg-orange, .tw-form-round-shape:after,
		.woocommerce ul.products li.product .button,.woocommerce ul.products li.product .added_to_cart,
			.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
			.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.sponsor-web-link a:hover i
		{background-color: $main_color;}"
			.".features-text:after, .mc4wp-form-fields button[type=submit], 
			.back-to-top .btn-dark:hover,
         .seo-check-form input[type=submit] {background: $main_color;}"
		.".tw-off-search, .tw-top-bar-angle:before{background: $secondary_color;}"
		.".tw-top-bar-angle:after{border-top: 38px solid $secondary_color;}"
		.".menu-indicator{border: 1px solid $main_color;}"
		.".banner-title{color:  $banner_title_color;}"
		.".navbar-toggle, .woocommerce ul.products li.product .button:hover,
			.woocommerce ul.products li.product .added_to_cart:hover,
			.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{background-color: $secondary_color;}"
		. ".owl-carousel.featured-projects-slide.owl-theme .owl-nav>.disabled
		{background: rgba($color_hex, 0.48)}
		.section-title-vertical .section-title{color:rgba($color_hex, 0.20)}
		.section-title-vertical 
		.section-title:after{border-bottom: 2px solid rgba($color_hex, 0.20)}"

        .$xs_footer_top_bg_color
        .$xs_widget_title_color
        .$xs_widget_text_color
        .$xs_copyright_text_color
        .$xs_widget_link_color
		.$xs_widget_link_hover_color
		.$xs_footer_border_color
		.$xs_footer_border_bg_color
		. "$custom_css";


		wp_add_inline_style( 'geobin-style', $output );
	}
	wp_add_inline_script( 'geobin-form-helpers', 'var adminAjax = "' . admin_url( 'admin-ajax.php' ) . '"' );
}

add_action( 'wp_enqueue_scripts', 'geobin_action_xs_hook_css', 90 );


