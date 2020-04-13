<?php
/**
 * Page Header
 *
 */
$bg_image	 = $heading	 = $overlay	 = '';
$banner_height = '';
$title_color  = '';
$banner_cls ='';
if ( defined( 'FW' ) ) {

	///Global optipn
	$page_global_image			 = geobin_get_option( 'global_header_image' );

		
	$page_title	 = get_the_title();


	//Page settings
	$page_heading	     = fw_get_db_post_option( $post->ID, 'header_title' );
	$header_image	     = fw_get_db_post_option( $post->ID, 'header_image' );
    $header_image_height = fw_get_db_post_option( $post->ID, 'header_image_height' );
    $banner_title = fw_get_db_post_option( $post->ID, 'header_title_color' );

    $banner_height = $header_image_height != '' ? "style=min-height:". $header_image_height ."px" : '';
    $title_color = $banner_title != '' ? "style=color:". $banner_title : '';


	$heading = $page_heading != '' ? $page_heading : $page_title;

	if ( $header_image == '' ) {
		$bg_image = $page_global_image != '' ? 'style="background: url(' . $page_global_image[ 'url' ] . ')"' : '';
	} else {
		$bg_image = $header_image != '' ? 'style="background: url(' . $header_image[ 'url' ] . ')"' : '';
	}

	//Overlay option 
	$header_overlay = fw_get_db_post_option( $post->ID, 'overlay' );
	if ( $header_overlay != '' ) {
		$overlay = '<div class="header-overlay" style="background-color:' . $header_overlay . '"></div>';
	}

	$header_style		 = fw_get_db_customizer_option( 'geobin_header' );
	$header_styles	 = fw_akg( 'menu_style', $header_style );
	if($header_styles== 'menu-9'){
		$banner_cls = "pt-90";
	}

}


?>

<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
	<?php
	echo esc_attr($overlay);
	?>
	<div class="container">
		<div class="row">
			<div class="<?php if(is_singular('projects')) {echo 'col-sm-9';} else { echo 'col-sm-12';} ?>">
				<div class="banner-heading <?php echo esc_attr($banner_cls); ?>" <?php echo esc_html($banner_height); ?>>
					<h1 class="banner-title" <?php echo esc_attr($title_color); ?>>
                        <?php
                        echo geobin_kses(sprintf($heading, '<span>', '</span>' ) );
                        ?>
                    </h1>
					<?php
						if( defined('FW')) {
							$global_page_breadcrumb	 = fw_get_db_customizer_option( 'global_page_breadcrumb' );

							$breadcrumbs = fw_get_db_post_option( $post->ID, 'breadcrumbs' );

							if ( $global_page_breadcrumb == 'yes' && $breadcrumbs == 'yes' ):
								echo geobin_get_breadcrumbs();
							endif;
						}
					?>
					
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end -->