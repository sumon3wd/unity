<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */


get_header(); 

get_template_part( 'template-parts/header/content', 'page-header' ) ?>

<?php
while (have_posts()) :
    the_post();
    //the_content();
endwhile;
?>
<?php get_footer(); ?>