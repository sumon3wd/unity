<?php
/*
 * This is for nav style
 *  */

/* SEO bin */

$main_logo		 = '';
$logo			 = geobin_get_image( 'menu_logo', GEOBIN_IMAGES . '/logo.png' );
$menu_class		 = $menu_style		 = $header_wrapper	 = $pull_right		 = '';

//Default style
if ( defined( 'FW' ) ) {
	$logo = geobin_get_image( 'menu_logo', GEOBIN_IMAGES . '/logo.png' );

	$header_top_details	 = fw_get_db_customizer_option( 'header_top_contact_details' );
	$top_social_details	 = fw_get_db_customizer_option( 'header_top_social_details' );
	$geobin_main_logo	 = fw_get_db_customizer_option( 'geobin_main_logo' );
	$main_logo			 = (isset( $geobin_main_logo[ 'url' ] ) && $geobin_main_logo[ 'url' ] != '' ? $geobin_main_logo[ 'url' ] : '');

	$menu		 = fw_get_db_customizer_option( 'geobin_header' );
	$menu_style	 = fw_akg( 'menu_style', $menu );
	$menu_class	 = 'tw-header';

	if ( function_exists( '_dev_site_style_control' ) && 'post' != get_post_type() ) {
		$page_menu = fw_get_db_post_option( $post->ID, 'custom_menu_style' );
		if ( $page_menu[ 'page_menu' ] == 'yes' ) {

			/* For Logo */
			if ( isset( $page_menu[ 'yes' ][ 'geobin_main_logo' ] ) && $page_menu[ 'yes' ][ 'geobin_main_logo' ] != '' ) {
				$main_logo = $page_menu[ 'yes' ][ 'geobin_main_logo' ][ 'url' ];
			}

			/* For Menu */
			if ( isset( $page_menu[ 'yes' ][ 'geobin_header' ][ 'menu_style' ] ) && $page_menu[ 'yes' ][ 'geobin_header' ][ 'menu_style' ] != '' ) {
				$menu_style = $page_menu[ 'yes' ][ 'geobin_header' ][ 'menu_style' ];
			}

			/* Font Header Topbar */
			if ( isset( $page_menu[ 'yes' ][ 'header_top_contact_details' ] ) && $page_menu[ 'yes' ][ 'header_top_contact_details' ] != '' ) {
				$header_top_details = $page_menu[ 'yes' ][ 'header_top_contact_details' ];
			}

			/* Header top social */
			if ( isset( $page_menu[ 'yes' ][ 'header_top_social_details' ] ) && $page_menu[ 'yes' ][ 'header_top_social_details' ] != '' ) {
				$top_social_details = $page_menu[ 'yes' ][ 'header_top_social_details' ];
			}
			if ( isset( $page_menu[ 'yes' ][ 'box_shadow' ] ) && $page_menu[ 'yes' ][ 'header_top_social_details' ] != 'yes' ) {
				echo "<style>.tw-header, .navbar-light.bg-white{box-shadow: none;background:#ebf0ff !important}</style>";
			}
			
		}
	}

	if ( $menu_style == 'menu-1' ) {
		$menu_class = 'tw-head';
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	} elseif ( $menu_style == 'menu-2' ) {
		$menu_class;
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	} elseif ( $menu_style == 'menu-3' ) {
		$menu_header_class = 'header-absolute';
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	} elseif ( $menu_style == 'menu-4' ) {
		
	} elseif ( $menu_style == 'menu-5' ) {
		$menu_header_class	 = 'header-transparent header-absolute';
		$menu_class			 = 'tw-header header-dark';
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	} elseif ( $menu_style == 'menu-6' ) {
		$menu_class	 = 'tw-header menu-bg';
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	} elseif ( $menu_style == 'menu-7' ) {
		$menu_header_class	 = 'header-transparent header-absolute';
		$menu_class			 = 'tw-header header-dark';
	} elseif ( $menu_style == 'menu-8' ) {
		$menu_class = 'header-absolute header-lite';
	}elseif ($menu_style == 'menu-9') {
		$menu_class = 'tw-head tw-solid-header';
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	}
} else {
	$menu_class = 'tw-head';
}

if ( $menu_style == 'menu-1' ) {
	?>

	<!-- Header start -->
	<header id="header">
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-white">

					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo != '' ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>

				</nav><!--/ Nav end -->
			</div><!--/ Container end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->

<?php } elseif ( $menu_style == 'menu-2' || $menu_style == 'menu-6' ) { ?>

	<!-- header======================-->
	<header>
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-white">
					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>
					<!-- End of Navbar Brand -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>


					<!-- End of offcanvas -->
				</nav>
				<!-- End of Nav -->
			</div>
			<!-- End of Container -->
		</div>
		<!-- End tw head -->
	</header>
	<!-- End of Header area=-->

<?php } elseif ( $menu_style == 'menu-3' ) { ?>

	<!-- header======================-->
	<header class="<?php echo esc_attr( $menu_header_class ) ?>">
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light dark-nav">
					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/footer_logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>
					<!-- End of Navbar Brand -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>

				</nav>
				<!-- End of Nav -->
			</div>
			<!-- End of Container -->
		</div>
		<!-- End tw head -->
	</header>
	<!-- End of Header area=-->

<?php } elseif ( $menu_style == 'menu-4' ) { ?>

	<!-- header======================-->
	<header class="header-absolute header-lite">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						if ( $main_logo ) :
							?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>
					<!-- End of Navbar Brand -->
				</div>
				<div class="col-lg-8">
					<div class="top-contact-info top-contact">
						<ul class="top-info">
							<?php
							foreach ( $header_top_details as $details ):
								?>

								<li>
									<span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span>
									<div class="info-wrapper">
										<p class="info-subtitle"><?php echo esc_html( $details[ 'title' ] ) ?>:</p>
										<p class="info-title"><?php echo esc_html( $details[ 'info' ] ) ?></p>
									</div>
								</li>
							<?php endforeach; ?>
							<!-- li end -->
						</ul>
						<!-- Top Info End -->
					</div>
					<!-- Contact Info End -->
				</div>
				<!-- Col end -->
				<div class="col-lg-2">
					<div class="top-social-links top-links">
						<?php
						foreach ( $top_social_details as $social_details ):
							?>
							<a title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>">
								<i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- Col End -->
			</div>
			<!-- Row End -->
		</div>
		<!-- End Container -->
		<div class="tw-header">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light dark-nav nav-lite">
					<button class="navbar-toggler toogle-lite" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>
					<!-- End of navbar collapse -->
				</nav>
				<!-- End of Nav -->
			</div>
		</div>
		<!-- End tw head -->
	</header>
	<!-- End of Header area=-->

<?php } elseif ( $menu_style == 'menu-5' ) { ?>

	<!-- header======================-->
	<header class="<?php echo esc_attr( $menu_header_class ) ?>">
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light dark-nav nav-transparent">
					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php
						else :
							if ( $menu_style == 'menu-5' ) {
								?>
								<img src="<?php echo GEOBIN_IMAGES; ?>/footer_logo.png" alt="<?php bloginfo( 'name' ); ?>">

							<?php } endif; ?>
					</a>
					<!-- End of Navbar Brand -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>

				</nav>
				<!-- End of Nav -->
			</div>
			<!-- End of Container -->
		</div>
		<!-- End tw head -->
	</header>
	<!-- End of Header area=-->

<?php } elseif ( $menu_style == 'menu-7' ) { ?>

	<div class="tw-top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-8 text-left">
					<?php
					wp_nav_menu(
					array(
						'theme_location'	 => 'top_menu',
						'container_class'	 => 'top-menu',
						'container_id'		 => 'top-menu',
						'menu_class'		 => 'top-menu',
						'menu_id'			 => 'top-menu',
						'fallback_cb'		 => false
					)
					);
					?>
				</div>
				<!-- Col end -->
				<div class="col-md-4 text-right">
					<div class="top-social-links">
						<?php
						foreach ( $top_social_details as $social_details ):
							?>
							<a title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>">
								<span class="social-icon"><i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i></span>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- Col End -->
			</div>
		</div>
	</div>

	<header>

		<div class="container">
			<div class="logo-area">
				<div class="row">
					<div class="col-lg-2">
						<a class="navbar-brand tw-nav-brand text-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if ( $main_logo ) :
								?>
								<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
							<?php else : ?>
								<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
							<?php endif; ?>
						</a>
						<!-- End of Navbar Brand -->
					</div>
					<div class="col-lg-10">
						<div class="top-contact-info top-contact">
							<ul class="top-info">
								<?php
								foreach ( $header_top_details as $details ):
									?>

									<li>
										<span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span>
										<div class="info-wrapper">
											<p class="info-subtitle"><?php echo esc_html( $details[ 'title' ] ) ?>:</p>
											<p class="info-title"><?php echo esc_html( $details[ 'info' ] ) ?></p>
										</div>
									</li>
								<?php endforeach; ?>
								<!-- li end -->
							</ul>
							<!-- Top Info End -->
						</div>
						<!-- Contact Info End -->
					</div>
					<!-- Col end -->
				</div>
			</div>
		</div>

		<div class="tw-head full-width-nav">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light nav-lite dark-nav-full nav-transparent nav-full-width">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>
					<!-- End of navbar collapse -->

				</nav>
				<!-- End of Nav -->
			</div>
		</div>
		<!-- End tw head -->
	</header>
	<!-- End of Header area=-->
<?php } elseif ( $menu_style == 'menu-8' ) { ?>

	<header class="<?php echo esc_attr( $menu_class ) ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>
					<!-- End of Navbar Brand -->
				</div>
				<div class="col-lg-8">
					<div class="top-contact-info top-contact">
						<ul class="top-info">
							<?php
							foreach ( $header_top_details as $details ):
								?>
								<li>
									<span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span>
									<div class="info-wrapper">
										<p class="info-subtitle"><?php echo esc_html( $details[ 'title' ] ) ?>:</p>
										<p class="info-title"><?php echo esc_html( $details[ 'info' ] ) ?></p>
									</div>
								</li>
							<?php endforeach; ?>
							<!-- li end -->
						</ul>
						<!-- Top Info End -->
					</div>
					<!-- Contact Info End -->
				</div>
				<!-- Col end -->
				<div class="col-lg-2">
					<div class="top-social-links top-links">
						<?php
						foreach ( $top_social_details as $social_details ):
							?>
							<a title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>">
								<i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i>
							</a>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- Col End -->
			</div>
			<!-- Row End -->
		</div>
		<!-- Container End -->


		<div class="tw-header">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light dark-nav nav-lite">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- End of Navbar toggler -->
					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>
					<!-- End of navbar collapse -->

				</nav>
				<!-- End of Nav -->
			</div>
		</div>
		<!-- End tw head -->

	</header>
	<!-- End of Header area=-->

	<?php } elseif ( $menu_style == 'menu-9' ) { ?>
	<!-- Header start -->
	<header id="header">
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-white">

					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo != '' ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>

				</nav><!--/ Nav end -->
			</div><!--/ Container end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->
		
<?php } else { ?>

	<!-- Header start -->
	<header id="header">
		<div class="<?php echo esc_attr( $menu_class ) ?>">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-white">

					<a class="navbar-brand tw-nav-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $main_logo ) : ?>
							<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
						<?php else : ?>
							<img src="<?php echo GEOBIN_IMAGES; ?>/logo.png" alt="<?php bloginfo( 'name' ); ?>">
						<?php endif; ?>
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>

				</nav><!--/ Nav end -->
			</div><!--/ Container end -->
		</div><!--/ Container end -->
	</header><!--/ Header end -->

<?php } ?>