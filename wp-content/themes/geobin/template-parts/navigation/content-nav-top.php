<?php
$top_class		 = $menu_bg_color	 = '';

if( defined('FW')) {
	$top_menu			 = fw_get_db_customizer_option( 'top_menu' );
	if($top_menu === 'no'){
		return ;
	}
	
    $menu			 = fw_get_db_customizer_option( 'geobin_header' );
    $top_menu = fw_akg( 'menu_style', $menu );
    $header_top_details = fw_get_db_customizer_option( 'header_top_contact_details' );
    $top_social_details = fw_get_db_customizer_option( 'header_top_social_details' );
}

if ( function_exists( '_dev_site_style_control' ) && 'post' != get_post_type() ) {
    $page_top_bar = fw_get_db_post_option( $post->ID, 'custom_menu_style' );

    if ( $page_top_bar[ 'page_menu' ] == 'yes' ) {
        $header_top_details = $page_top_bar['yes']['header_top_contact_details'];
        $top_social_details = $page_top_bar['yes']['header_top_social_details'];
		if($page_top_bar['yes']['top_menu'] == 'no'){
			return;
		}
        /*For Menu*/
        if ( isset( $page_top_bar['yes']['geobin_header']['menu_style'] ) && $page_top_bar['yes']['geobin_header']['menu_style'] != '' ) {
            $top_menu = $page_top_bar['yes']['geobin_header']['menu_style'];
        }
    }
}


if ( $top_menu == 'menu-1' ) {
    $top_class = 'tw-top-bar';
} elseif ( $top_menu == 'menu-2' ) {
    $top_class = 'tw-top-bar tw-top-bar-angle bg-offwhite';
} elseif ( $top_menu == 'menu-3' ) {
    $top_class = 'tw-top-bar no-border';
} elseif ( $top_menu == 'menu-4' ) {
    $top_class = 'tw-top-bar';
} elseif ( $top_menu == 'menu-5' ) {
    $top_class = 'tw-top-bar bg-white top-bar-lite';
} elseif ( $top_menu == 'menu-6' ) {
    $top_class = 'tw-top-bar no-border top-bar-dark';
}elseif( $top_menu == 'menu-9'){
    $top_class = 'tw-top-bar topbar-light';
}
$container_class = "container";
if( $top_menu == 'menu-9'){
    $container_class ="container";
}
?>


<div id="top-bar" class="<?php echo esc_attr( $top_class ); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="row">
            <?php if ( $top_menu == 'menu-5' || $top_menu == 'menu-6' ) { ?>

                <div class="col-lg-4 <?php if($top_menu == 'menu-5') echo 'text-md-center'; ?>">
                    <div class="top-social-links">
                        <span><?php echo esc_html__('Follow us:', 'geobin'); ?>  </span>
                        <?php
                        foreach ( $top_social_details as $social_details ):
                            ?>
                            <a target="_blank" title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>">
                                <span class="social-icon"><i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div><!--/ Top social end -->

                <div class="col-lg-8 text-md-center">

                    <div class="top-contact-info">
                        <?php
                        foreach ( $header_top_details as $details ):
                            ?>
                            <span><i class="<?php echo geobin_kses( $details[ 'icon' ] ) ?>"></i><?php echo geobin_kses( $details[ 'info' ] ) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div><!--/ Top info end -->

            <?php } else { ?>
                <div class="col-md-8 text-left">

                    <div class="top-contact-info">
                        <?php
                        foreach ( $header_top_details as $details ):
                            ?>
                            <span><i class="<?php echo geobin_kses( $details[ 'icon' ] ) ?>"></i><?php echo geobin_kses( $details[ 'info' ] ) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div><!--/ Top info end -->

                <div class="col-md-4 col-xs-12 text-right">
                    <div class="top-social-links">
                        <span><?php echo esc_html__('Follow us:', 'geobin'); ?> </span>
                        <?php
                        foreach ( $top_social_details as $social_details ):
                            ?>
                            <a target="_blank" title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>">
                                <span class="social-icon"><i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div><!--/ Top social end -->
            <?php } ?>

        </div>

    </div><!--/ Container end -->
</div><!--/ Topbar end -->