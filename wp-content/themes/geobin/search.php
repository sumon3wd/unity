<?php
/**
 * search.php
 *
 * The template for displaying search results.
 */
get_header();

get_template_part( 'template-parts/header/content', 'search-header' ) ?>


	
<section id="main-container" class="blog main-container" role="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile;
					geobin_paging_nav();
				else :
					get_template_part( 'template-parts/post/content', 'none' );
				endif;
				?>
            </div> <!-- end main-content -->

			<?php get_sidebar(); ?>
        </div>
    </div> 
</section>


<?php get_footer(); ?>