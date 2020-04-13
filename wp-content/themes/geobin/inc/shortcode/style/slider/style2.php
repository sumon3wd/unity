<?php
if (is_array($sliders) && !empty($sliders)): ?>
    <!-- Start hero slider/ Owl Carousel Slider -->
    <div class="tw-hero-slider owl-carousel slider-dark">
        <?php foreach ($sliders as $slider): ?>
            <?php
            $btn_link_one = (!empty($slider['btn_link_one']['url'])) ? $slider['btn_link_one']['url'] : '';

            $btn_target_one = ($slider['btn_link_one']['is_external']) ? '_blank' : '_self';

            $image = $slider['image']['url'];
            $alt = get_post_meta($slider['image']['id'], '_wp_attachment_image_alt', true);
            $alignment = $slider['alignment'];

            $title_color = $slider['title_color'] != '' ? "style=color:" . $slider['title_color'] . "" : '';
            $description_color = $slider['description_color'] != '' ? "style=color:" . $slider['description_color'] . "" : '';
            ?>

            <div class="slider-2 tw-slider-bg-dark">
                <div class="slider-wrapper d-table">
                    <div class="slider-inner d-table-cell">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="slider-content slider-content-dark">
                                    <?php if (!empty($slider['title'])): ?>
                                        <h1 <?php echo esc_attr($title_color); ?>>
                                            <?php
                                            $main_keyword_color = $slider['title_keyword_color'] != '' ? "<span style=color:" . $slider['title_keyword_color'] . "" : '';
                                            echo sprintf($slider['title'], esc_attr($main_keyword_color), '</span>'); ?>
                                        </h1>
                                    <?php endif; ?>
                                    <?php if (!empty($slider['description'])): ?>
                                        <p <?php echo esc_attr($description_color); ?>>
                                            <?php echo wp_kses_post($slider['description']); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($slider['btn_label_one'])): ?>
                                        <a href="<?php echo esc_url($btn_link_one); ?>"
                                           target="<?php echo esc_html($btn_target_one); ?>"
                                           class="btn btn-primary"><?php echo esc_html($slider['btn_label_one']); ?></a>
                                    <?php endif; ?>

                                </div>

                                <div class="col-md-5 mr-auto ml-auto align-self-center">
                                    <?php if (!empty($image)): ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php esc_attr($alt); ?>"
                                             class="img-fluid slider-img">
                                    <?php endif; ?>
                                </div>
                                <!-- col end -->
                            </div>
                            <!-- Row End -->
                        </div>
                        <!-- Container End -->
                    </div>
                    <!-- Slider Inner End -->
                </div>
                <!-- Slider Wrapper End -->
            </div>
        <?php endforeach; ?>
        <!-- Slider end -->

    </div>
<?php endif; ?>