<?php
/**
 * page.php
 *
 * The template for displaying all pages.
 */

get_header(); 

get_template_part( 'template-parts/header/content', 'page-header' );

$column = ($blog_setting == 1 || !is_active_sidebar('sidebar-1')) ? 'col-md-12' : 'col-lg-8 col-md-12';

if ( is_active_sidebar( 'sidebar-1' ) || ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) || class_exists( 'Woocommerce' ) && is_woocommerce() && is_active_sidebar( 'shop-sidebar' ) ) {
	$column= 'col-lg-8 col-md-12';
}else{
	$column= 'col-md-12';
}
?>

<section id="main-container" class="main-container" role="main">
    <div class="container">
        <div class="row">

            <div class="<?php echo esc_attr($column);?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Article header -->
						<header class="entry-header"> <?php
							if ( has_post_thumbnail() && !post_password_required() ) :
								?>
								<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<h2><?php the_title(); ?></h2>
						</header> <!-- end entry-header -->

						<!-- Article content -->
						<div class="entry-content">
							<?php the_content(); ?>
							<?php geobin_link_pages(); ?>
						</div> <!-- end entry-content -->

						<!-- Article footer -->
						<footer class="entry-footer">
							<?php
							if ( is_user_logged_in() ) {
								echo '<p>';
								edit_post_link( esc_html__( 'Edit', 'geobin' ), '<span class="meta-edit">', '</span>' );
								echo '</p>';
							}
							?>
						</footer> <!-- end entry-footer -->
					</article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
            </div> <!-- end main-content -->

			<?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>