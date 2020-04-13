<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content post-single' ); ?>>

	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="entry-thumbnail post-media post-image">
			<?php the_post_thumbnail( 'post-thumbnails' ); ?>
		</div>
	<?php endif; ?>
	<div class="post-body clearfix">

		<!-- Article header -->
		<header class="entry-header clearfix">
			<?php geobin_post_meta(); ?>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		</header><!-- header end -->

		<!-- Article content -->
		<div class="entry-content">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading &rarr;', 'geobin' ) );

				geobin_link_pages();
			}
			?>
		</div> <!-- end entry-content -->
		<?php //geobin_single_post_footer
		geobin_single_post_footer();
		?>
    </div> <!-- end post-body -->

</article>