<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
$footer_class = '';

$widget		 = geobin_get_option( 'footer_widget' );
$scrollup	 = geobin_get_option( 'scrollup' );
$footer_style= 'footer-1';

if ( defined( 'FW' ) ) { 
	$footer_class = 'footer-top-space';
	$footer		 = fw_get_db_customizer_option( 'geobin_footer' );
	$footer_style	 = fw_akg( 'footer_style', $footer );

}


?>

<?php if($footer_style == 'footer-1'): ?>
<footer id="tw-footer" class="tw-footer <?php echo esc_attr($footer_class); ?>">
	<?php
	if ( defined( 'FW' ) ) {
		$footer_award_info = fw_get_db_customizer_option( 'footer_award_info' );
		$show_footer_widget = fw_get_db_customizer_option( 'show_footer_widget' );
		if( $show_footer_widget == 'yes' ) {
		?>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-4">
						

							<?php if ( is_active_sidebar( 'footer-widget-top' ) ) : ?>
								<div class="tw-footer-info-box"><?php
									dynamic_sidebar( 'footer-widget-top' );
								?></div>
							<?php endif; ?>
							<!-- End Social link -->
						

						<!-- End Footer info -->
						
							<?php
							if ( defined( 'FW' ) ) :
								$footer_award_logo = fw_get_db_customizer_option( 'footer_award_logo' );
								$footer_award_info = fw_get_db_customizer_option( 'footer_award_info' );
								if ( $footer_award_logo != '' || $footer_award_info != '' ) :
									?><div class="footer-awarad"><?php
										if ( $footer_award_logo != '' ) :
											$alt = get_post_meta( $footer_award_logo[ 'attachment_id' ], '_wp_attachment_image_alt', true );
											?>
											<img src="<?php echo esc_url( $footer_award_logo[ 'url' ] ); ?>" title="<?php echo esc_attr( get_the_title( $footer_award_logo[ 'attachment_id' ] ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
										<?php endif;
									
										if ( $footer_award_info != '' ) :
											?>
											<p><?php echo esc_html( $footer_award_info ); ?></p>
											<?php
										endif;
									?></div><?php
								endif;
							endif;
							?>
						</div>
					
					<!-- End Col -->
					<div class="col-md-12 col-lg-8">
						<div class="row">
							<?php
							if ( is_active_sidebar( 'footer-2' ) ) : dynamic_sidebar( 'footer-2' );
							endif;
							?>
						</div>
						<!-- End Contact Row -->
						<div class="row">
							<div class="col-md-12 col-lg-6">
								<div class="footer-widget footer-left-widget">
									<?php
									if ( is_active_sidebar( 'footer-3' ) ) : dynamic_sidebar( 'footer-3' );
									endif;
									?>
								</div>
								<!-- End Footer Widget -->
							</div>
							<!-- End col -->
							<div class="col-md-12 col-lg-6">
								<div class="footer-widget">
									<?php
									if ( is_active_sidebar( 'footer-4' ) ) : dynamic_sidebar( 'footer-4' );
									endif;
									?>
								</div>
								<!-- End footer widget -->
							</div>
							<!-- End Col -->
						</div>
						<!-- End Row -->
					</div>
					<!-- End Col -->
				</div>
				<!-- End Widget Row -->
			</div>
		</div>
		<!-- End Contact Container -->
	<?php } } ?>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
					<?php
					if ( defined( 'FW' ) ) {
						$copyright_info = fw_get_db_customizer_option( 'copyright_info' );
						echo '<span>' . wp_kses_post( $copyright_info ) . '</span>';
					}
					?>

                </div>
                <!-- End Col -->
                <div class="col-md-6">
					<?php
					if ( defined( 'FW' ) ) {
						wp_nav_menu( array(
							'theme_location'	 => 'footer',
							'container_class'	 => 'copyright-menu',
							'menu_class'		 => 'footer-menu',
							'fallback_cb'		 => false
						) );
					}
					?>

                </div>
                <!-- End col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Copyright Container -->
    </div>
    <!-- End Copyright -->

    <!-- Back to top -->
	<?php
	if ( defined( 'FW' ) ) :
		$backto_top = fw_get_db_customizer_option( 'back_to_top' );
		if ( $backto_top == 'yes' ) :
			?>
			<div id="back-to-top" class="back-to-top">
				<button class="btn btn-dark" title="<?php esc_attr_e( 'Back to Top', 'geobin' ) ?>">
					<i class="fa fa-angle-up"></i>
				</button>
			</div>
			<?php
		endif;
	endif;
	?>
    <!-- End Back to top -->
</footer>
<?php elseif ($footer_style == 'footer-2'):?>
<footer id="tw-footer" class="tw-footer footer-classic">
	<?php
	if ( defined( 'FW' ) ) {
		$footer_award_info = fw_get_db_customizer_option( 'footer_award_info' );
		$show_footer_widget = fw_get_db_customizer_option( 'show_footer_widget' );
		if( $show_footer_widget == 'yes' ) {
		?>
		<div class="footer-top">
			<div class="container">
				<div class="row footer-top-info">
						<?php
						if ( is_active_sidebar( 'footer-2' ) ) : dynamic_sidebar( 'footer-2' );
						endif;
						?>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-3">
						

							<?php if ( is_active_sidebar( 'footer-widget-top' ) ) : ?>
								<div class="tw-footer-info-box"><?php
									dynamic_sidebar( 'footer-widget-top' );
								?></div>
							<?php endif; ?>
							<!-- End Social link -->
						

						<!-- End Footer info -->
						
							<?php
							if ( defined( 'FW' ) ) :
								$footer_award_logo = fw_get_db_customizer_option( 'footer_award_logo' );
								$footer_award_info = fw_get_db_customizer_option( 'footer_award_info' );
								if ( $footer_award_logo != '' || $footer_award_info != '' ) :
									?><div class="footer-awarad"><?php
										if ( $footer_award_logo != '' ) :
											$alt = get_post_meta( $footer_award_logo[ 'attachment_id' ], '_wp_attachment_image_alt', true );
											?>
											<img src="<?php echo esc_url( $footer_award_logo[ 'url' ] ); ?>" title="<?php echo esc_attr( get_the_title( $footer_award_logo[ 'attachment_id' ] ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
										<?php endif;
									
										if ( $footer_award_info != '' ) :
											?>
											<p><?php echo esc_html( $footer_award_info ); ?></p>
											<?php
										endif;
									?></div><?php
								endif;
							endif;
							?>
						</div>
					
					<!-- End Col -->
						<div class="col-md-12 col-lg-6">
							<div class="footer-widget footer-left-widget">
								<?php
								if ( is_active_sidebar( 'footer-3' ) ) : dynamic_sidebar( 'footer-3' );
								endif;
								?>
							</div>
							<!-- End Footer Widget -->
						</div>
					
						<!-- End col -->
						<div class="col-md-12 col-lg-3">
							<div class="footer-widget">
								<?php
								if ( is_active_sidebar( 'footer-4' ) ) : dynamic_sidebar( 'footer-4' );
								endif;
								?>
							</div>
							<!-- End footer widget -->
						</div>
						<!-- End Col -->
				</div>
				<!-- End Widget Row -->
			</div>
		</div>
		<!-- End Contact Container -->
	<?php } } ?>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
					<?php
					if ( defined( 'FW' ) ) {
						$copyright_info = fw_get_db_customizer_option( 'copyright_info' );
						echo '<span>' . wp_kses_post( $copyright_info ) . '</span>';
					}
					?>

                </div>
                <!-- End Col -->
                <div class="col-md-6">
					<?php
					if ( defined( 'FW' ) ) {
						wp_nav_menu( array(
							'theme_location'	 => 'footer',
							'container_class'	 => 'copyright-menu',
							'menu_class'		 => 'footer-menu',
							'fallback_cb'		 => false
						) );
					}
					?>

                </div>
                <!-- End col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Copyright Container -->
    </div>
    <!-- End Copyright -->

    <!-- Back to top -->
	<?php
	if ( defined( 'FW' ) ) :
		$backto_top = fw_get_db_customizer_option( 'back_to_top' );
		if ( $backto_top == 'yes' ) :
			?>
			<div id="back-to-top" class="back-to-top">
				<button class="btn btn-dark" title="<?php esc_attr_e( 'Back to Top', 'geobin' ) ?>">
					<i class="fa fa-angle-up"></i>
				</button>
			</div>
			<?php
		endif;
	endif;
	?>
    <!-- End Back to top -->
</footer>
<?php endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>