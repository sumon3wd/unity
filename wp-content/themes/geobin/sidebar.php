<?php
/**
 * sidebar.php
 *
 * The primary sidebar.
 */
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

   <aside id="sidebar" class="sidebar sidebar-right col-md-4">
	<?php
	dynamic_sidebar( 'sidebar-1' );
	?>
</aside> <!-- end sidebar -->

<?php } ?>



