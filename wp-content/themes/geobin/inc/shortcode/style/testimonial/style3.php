<div class="testimonial-box-carousel owl-carousel">
    <?php if(!empty($testimonials)):

        foreach($testimonials as $testimonial):

            if($testimonial['image'] != ''){
                $img = xs_resize($testimonial['image']['id'] , 45,44,true);
            }
            $alt = get_post_meta($testimonial['image']['id'], '_wp_attachment_image_alt', true);
            ?>
    <div class="tw-testimonial-box">
        <div class="testimonial-bg testimonial-bg-yellow">
            <div class="testimonial-icon">
                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
            </div>
        </div>

        <!-- End Testimonial bg -->
        <div class="testimonial-meta">
            <?php if( !empty($testimonial['client_name']) ) : ?>
                <h4>
                    <?php echo esc_html( $testimonial['client_name'] );
                    if( !empty($testimonial['designation']) ) : ?>
                        <small><?php echo esc_html( $testimonial['designation'] ); ?></small>
                    <?php endif; ?>
                </h4>
            <?php endif; ?>
        </div>
        <!-- End Testimonial Meta -->
        <div class="testimonial-text">
            <?php if( !empty($testimonial['review']) ) : ?>
                <p><?php echo esc_html( $testimonial['review'] ); ?></p>
            <?php endif; ?>
            <i class="icon icon-quote2"></i>
        </div>
        <!-- End testimonial text -->
    </div>
    <!-- End Tw testimonial wrapper -->
    <?php endforeach;
    endif; ?>
</div>