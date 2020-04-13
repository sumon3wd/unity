<div class="testimonial-wrapper justify-content-center">
    <div class="col-md-8 text-center">
        <div class="testimonial-slider owl-carousel">
            <?php if(!empty($testimonials)):

            foreach($testimonials as $testimonial):

            if($testimonial['image'] != ''){
                $img = $testimonial['image']['url'];
            }
                $alt = get_post_meta($testimonial['image']['id'], '_wp_attachment_image_alt', true);
            ?>

            <div class="testimonial-content">
                <div class="testimonial-image">
                    <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
                </div>
                <div class="testimonial-meta">
                    <?php if( !empty($testimonial['client_name']) ) : ?>
                    <h4>
                        <?php echo esc_html( $testimonial['client_name'] );
                        if( !empty($testimonial['designation']) ) : ?>
                            <small><?php echo esc_html( $testimonial['designation'] ); ?></small>
                        <?php endif; ?>
                    </h4>
                    <?php endif; ?>
                    <i class="icon icon-quote2"></i>
                </div>
                <!-- Testimonial Meta end -->
                <div class="testimonial-text">
                    <?php if( !empty($testimonial['review']) ) : ?>
                        <p><?php echo esc_html( $testimonial['review'] ); ?></p>
                    <?php endif; ?>
                </div>
                <!-- TEstimonial text end -->
            </div>
            <!-- Testimonial Content End -->
            <?php endforeach;
            endif; ?>

        </div>
    </div>
</div>