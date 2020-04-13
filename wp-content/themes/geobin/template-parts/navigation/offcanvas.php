<?php



if( defined('FW') ) :
    $menu			 = fw_get_db_customizer_option( 'geobin_header' );
    $menu_style = fw_akg( 'menu_style', $menu );

if( defined('FW')) :
    $show_offcanvas = fw_get_db_customizer_option('header_right_offcanvas');
endif;

if ( function_exists( '_dev_site_style_control' ) && 'post' != get_post_type() ) {
    $page_top_bar = fw_get_db_post_option( $post->ID, 'custom_menu_style' );

    if ( $page_top_bar[ 'page_menu' ] == 'yes' ) {
        if ( isset( $page_top_bar['yes']['geobin_header']['menu_style'] ) && $page_top_bar['yes']['geobin_header']['menu_style'] != '' ) {
            $menu_style = $page_top_bar['yes']['geobin_header']['menu_style'];
        }
    }
}

if( $show_offcanvas['hr_offcanvas'] == 'yes' ) {
    if ( $menu_style == 'menu-2' || $menu_style == 'menu-6' ) {
        ?>

        <div class="tw-offcanvas-menu d-none d-md-block">
            <i class="fa fa-search"></i>
            <div class="tw-menu-bar inline-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    <?php } elseif ( $menu_style == 'menu-3' ) { ?>

        <div class="tw-offcanvas-menu offcanvas-dark-menu d-none d-md-inline-block">
            <i class="fa fa-search"></i>
            <div class="tw-menu-bar inline-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    <?php } elseif ( $menu_style == 'menu-4' ) { ?>

        <div class="tw-offcanvas-menu offcanvas-menu-lite">
            <i class="fa fa-search"></i>
            <div class="tw-menu-bar inline-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    <?php } elseif ( $menu_style == 'menu-7' ) { ?>

        <div class="tw-offcanvas-menu full-width-offcanvas-menu">
            <i class="fa fa-search d-none d-md-inline-block"></i>
            <div class="tw-menu-bar inline-menu d-none d-md-inline-block">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- End of offcanvas -->

    <?php } elseif ( $menu_style == 'menu-8' ) { ?>
        <div class="tw-offcanvas-menu offcanvas-menu-lite bg-orange ">
            <i class="fa fa-search d-none d-lg-inline-block"></i>
            <div class="tw-menu-bar inline-menu d-none d-lg-inline-block">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    <?php } else { ?>
        <div class="tw-off-search d-none d-lg-inline-block">
            <div class="tw-search">
                <i class="fa fa-search"></i>
            </div>
            <div class="tw-menu-bar-default tw-menu-bar" id="open-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    <?php } } else {}?>
    <!-- End off canvas menu -->

    <div class="search-bar">
        <i class="icon icon-cross"></i>
        <?php $unique_id = uniqid( 'search-form-' ); ?>
        <form role="search" method="get" class="search-bar-fixed" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" id="<?php echo esc_attr($unique_id); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'geobin' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!--End Search bar -->

    <div class="offcanvas-menu">
        <div class="offcanvas-menu-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="offcanvas-wrapper">
                        <div class="offcanvas-inner">

                            <?php if(defined('FW')) :
                                $offcanvas_settings = fw_get_db_customizer_option('header_right_offcanvas');

                                if(isset($offcanvas_settings['yes']['offcanvas_logo']) && !empty($offcanvas_settings['yes']['offcanvas_logo'])) :
                                    ?>
                                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="logo">
                                        <img src="<?php echo esc_url($offcanvas_settings['yes']['offcanvas_logo']['url'] ); ?>" alt="<?php bloginfo('name'); ?>">
                                    </a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( home_url('/') ); ?>">
                                        <h2><?php bloginfo('name'); ?></h2>
                                    </a>
                                <?php endif; ?>
                                <p><?php echo esc_html($offcanvas_settings['yes']['offcanvas_content']); ?></p>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-us">
                                            <div class="contact-icon">
                                                <i class="icon icon-map2"></i>
                                            </div>
                                            <!-- End contact Icon -->
                                            <div class="contact-info">
                                                <h3><?php echo esc_html($offcanvas_settings['yes']['offcanvas_city_name']); ?></h3>
                                                <p><?php echo esc_html($offcanvas_settings['yes']['offcanvas_address']); ?></p>
                                            </div>
                                            <!-- End Contact Info -->
                                        </div>
                                        <!-- End Contact Us -->
                                    </div>
                                    <!-- End Col -->
                                    <div class="col-md-12">
                                        <div class="contact-us">
                                            <div class="contact-icon">
                                                <i class="icon icon-phone3"></i>
                                            </div>
                                            <!-- End contact Icon -->
                                            <div class="contact-info">
                                                <h3><?php echo esc_html($offcanvas_settings['yes']['offcanvas_contact_no']); ?></h3>
                                                <p><?php echo esc_html($offcanvas_settings['yes']['offcanvas_contact_slogan']); ?></p>
                                            </div>
                                            <!-- End Contact Info -->
                                        </div>
                                        <!-- End Contact Us -->
                                    </div>
                                    <!-- End Col -->
                                    <div class="col-md-12">
                                        <div class="contact-us">
                                            <div class="contact-icon">
                                                <i class="icon icon-envelope2"></i>
                                            </div>
                                            <!-- End contact Icon -->
                                            <div class="contact-info">
                                                <h3><?php echo esc_html($offcanvas_settings['yes']['offcanvas_contact_email']); ?></h3>
                                                <p><?php echo esc_html($offcanvas_settings['yes']['offcanvas_contact_email_slogan']); ?></p>
                                            </div>
                                            <!-- End Contact Info -->
                                        </div>
                                        <!-- End Contact Us -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Contact Row -->

                                <div class="footer-social-link">
                                    <ul>
                                        <?php
                                        if($offcanvas_settings['yes']['offcanvas_social_share']['social_shares_switcher'] == 'yes'){
                                            foreach($offcanvas_settings['yes']['offcanvas_social_share']['yes']['social_url'] as $value){ ?>
                                                <li><a href="<?php echo esc_url($value['link']); ?>"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a></li>
                                            <?php }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <?php

                                if( $offcanvas_settings['yes']['offcanvas_subscribe_box'] ){
                                    echo '<div class="menu-subscribe">';
                                    echo '<h3>' . esc_html__('Subscribe', 'geobin') .'<span class="noanimate-border"></span></h3>';
                                    echo do_shortcode($offcanvas_settings['yes']['offcanvas_subscribe_box']);
                                    echo '</div>';
                                }

                                ?>



                            <?php endif; ?>
                        </div>
                        <!-- Offcanvas inner end -->
                        <button class="menu-close-btn"><i class="icon icon-cross"></i></button>
                    </div>
                    <!-- Offcanvas wrapper end -->
                </div>
                <!-- Col End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Off canvas menu End -->
<?php

endif;

?>