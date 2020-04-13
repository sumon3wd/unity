<?php
if(is_array($sliders) && !empty($sliders)): ?>
    <!-- Start hero slider/ Owl Carousel Slider -->
    <div class="tw-hero-slider owl-carousel" <?php echo sprintf( 'data-settings=\'%1$s\'', $slider_settings ); ?>">
    <?php foreach($sliders as $slider): ?>
        <?php
        $btn_link_one = (! empty( $slider['btn_link_one']['url'])) ? $slider['btn_link_one']['url'] : '';
        $btn_target_one = ( $slider['btn_link_one']['is_external']) ? '_blank' : '_self';

        $btn_style = '';
        $btn_style .= (!empty($slider['btn_color']) ? 'style=color:'.$slider['btn_color'] : '');
        $btn_style .= (!empty($slider['btn_bg_color']) ? 'style=background:'.$slider['btn_bg_color'] : '');

        $main_keyword_color = (!empty( esc_attr($slider['main_keyword_color']) ) ? 'color:'.esc_attr($slider['main_keyword_color']) : '');


        $image = $slider['image']['url'];
        $alignment = $slider['alignment'];
        $alt = get_post_meta($slider['image']['id'], '_wp_attachment_image_alt', true);

        $slider_title_margin = $slider['slider_title_margin'] != '' ? "style=margin-top:". $slider['slider_title_margin'] ."px" : '';
        $title_color = $slider['title_color'] != '' ? "style=color:". $slider['title_color'] ."" : '';
        $description_color = $slider['description_color'] != '' ? "style=color:". $slider['description_color'] ."" : '';
        ?>
        <?php
            if( !empty($slider['slider_bg_color'])) :
            $slide_bg_color = $slider['slider_bg_color'] != '' ? "style=background-color:". $slider['slider_bg_color'].";" : '';

        ?>
        <div class="geobin-slider" <?php echo esc_attr($slide_bg_color); ?>>
        <?php else : ?>
        <div class="geobin-slider" style="background-image: url('<?php echo esc_url($slider['slider_image']['url']); ?>')">
        <?php endif; ?>

            <div class="slider-wrapper d-table">
                <div class="slider-inner d-table-cell">
                    <div class="container">
                        <div class="row justify-content-center">
                            <?php if($alignment == 'right') : ?>
                            <div class="col-md-6">
                                <div class="slider-content" <?php echo esc_attr($slider_title_margin); ?>>

                                    <?php if(!empty($slider['title'])): ?>
                                        <h1 <?php echo esc_attr($title_color); ?>>
                                            <?php echo sprintf($slider['title'], "<span style='$main_keyword_color;'>", "</span>" ); ?>
                                        </h1>
                                    <?php endif;?>

                                    <?php if(!empty($slider['description'])): ?>
                                        <p <?php echo esc_attr($description_color); ?>>
                                            <?php echo wp_kses_post( $slider['description'] ); ?>
                                        </p>
                                    <?php endif;?>

                                    <?php if(!empty($slider['btn_label_one'])): ?>
                                        <a <?php echo esc_attr($btn_style);?> href="<?php echo esc_url( $btn_link_one ); ?>" target="<?php echo esc_html( $btn_target_one ); ?>" class="btn btn-primary"><?php echo esc_html( $slider['btn_label_one'] ); ?></a>
                                    <?php endif;?>

                                </div>
                                <!-- End Slider Content -->
                            </div>

                            <div class="col-md-6">
                                <?php if(!empty($image)): ?>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid slider-img">
                                <?php endif;?>
                            </div>
                            <!-- Col end -->
                            <?php else : ?>

                            <div class="col-md-6">
                                <?php if(!empty($image)): ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid slider-img">
                                <?php endif;?>
                            </div>

                            <div class="col-md-6">
                                <div class="slider-content" <?php echo esc_attr($slider_title_margin); ?>>
                                    <?php if(!empty($slider['title'])): ?>
                                        <h1 <?php echo esc_attr($title_color); ?>>
                                            <?php echo sprintf($slider['title'], "<span style='$main_keyword_color;'>", '</span>' ); ?>
                                        </h1>
                                    <?php endif;?>

                                    <?php if(!empty($slider['description'])): ?>
                                        <p <?php echo esc_attr($description_color); ?>>
                                            <?php echo wp_kses_post( $slider['description'] ); ?>
                                        </p>
                                    <?php endif;?>

                                    <?php if(!empty($slider['btn_label_one'])): ?>
                                        <a <?php echo esc_attr($btn_style);?> href="<?php echo esc_url( $btn_link_one ); ?>" target="<?php echo esc_html( $btn_target_one ); ?>" class="btn btn-primary"><?php echo esc_html( $slider['btn_label_one'] ); ?></a>
                                    <?php endif;?>

                                </div>
                                <!-- End Slider Content -->
                            </div>
                            <!-- Col end -->
                            <?php endif; ?>
                            <!-- col end -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- COntainer End -->
                </div>
                <!-- Slider Inner End -->
            </div>
            <!-- Slider Wrapper End -->
        </div>
    <?php  endforeach; ?>
        <!-- Slider 1 end -->
    </div>
<?php endif; ?>
</div>