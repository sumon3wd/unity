<?php
/**
 * header.php
 *
 * The header for the theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> data-spy="scroll" data-target="#header">

		<div class="body-inner">
			<?php get_template_part( 'template-parts/navigation/content', 'nav' );
			

			



