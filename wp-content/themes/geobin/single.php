<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */
$display_settings = array();
$blog_setting = '';
if ( defined( 'FW' ) ) {
	$display_settings = fw_get_db_settings_option( 'blog_display_settings' );
   $blog_setting = fw_get_db_customizer_option('news_settings');

}

$column = ($blog_setting == 'fullwidth' || !is_active_sidebar('sidebar-1')) ? 'col-md-12' : 'col-lg-8 col-md-12';

if ( is_active_sidebar( 'sidebar-1' ) || ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) || class_exists( 'Woocommerce' ) && is_woocommerce() && is_active_sidebar( 'shop-sidebar' ) ) {
	$column= 'col-lg-8 col-md-12';
}else{
	$column= 'col-md-12';
}

get_header();

get_template_part( 'template-parts/header/content', 'blog-header' )
?>


<div id="main-container" class="main-container blog" role="main">

    <div class="sections">
        <div class="container">
			<div class="row">
				<div class="<?php echo esc_attr($column);?>">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'single' );

						geobin_post_nav();

						if ( defined( 'FW' ) ) {
							if ( $display_settings[ 'post_comment' ] != 'no' ) :
								comments_template();
							endif;
						}else {
							comments_template();
						}

					endwhile;
					?>
				</div> <!-- end main-content -->

				<?php get_sidebar(); ?>
			</div>
        </div>
    </div>
</div> <!-- end main-content -->
<?php get_footer(); ?>