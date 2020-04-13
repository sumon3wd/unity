<?php
/**
 * Blog Header
 *
 */
$bg_image				 = $heading				 = $global_blog_breadcrumb	 = '';
$banner_cls ='';
if ( defined( 'FW' ) ) {

	///Global optipn
	$page_global_image		 = fw_get_db_customizer_option( 'global_header_image' );
	$global_heading_title	 = fw_get_db_customizer_option( 'global_blog_title' );

	$global_blog_breadcrumb = fw_get_db_customizer_option( 'global_blog_breadcrumb' );


	$id				 = (is_single()) ? $post->ID : get_option( 'page_for_posts' );
	//blog signgle  settings 
	$heading_title	 = fw_get_db_post_option( $id, 'header_title' );

	$header_image = fw_get_db_post_option( $id, 'header_image' );

	$heading = $heading_title != '' ? $heading_title : $global_heading_title;

	if ( $header_image == '' ) {
		$bg_image = $page_global_image != '' ? 'style="background: url(' . $page_global_image[ 'url' ] . ')"' : '';
	} else {
		$bg_image = $header_image != '' ? 'style="background: url(' . $header_image[ 'url' ] . ')"' : '';
	}

	$header_style		 = fw_get_db_customizer_option( 'geobin_header' );
	$header_styles	 = fw_akg( 'menu_style', $header_style );
	if($header_styles== 'menu-9'){
		$banner_cls = "pt-90";
	}
}
?>

<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="banner-heading <?php echo esc_attr($banner_cls); ?>">
					<h1 class="banner-title"><?php echo esc_html( $heading ); ?></h1>
					<?php
					if ( $global_blog_breadcrumb == 'yes' ):
						?>
						<?php echo geobin_get_breadcrumbs();
						?>
					<?php endif; ?>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 

