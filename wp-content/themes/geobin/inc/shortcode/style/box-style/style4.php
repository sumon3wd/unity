
<?php $alt = get_post_meta($shap_image['id'], '_wp_attachment_image_alt', true); ?>
<div class="features-box tw-icon-box">
        <div class="tw-feature-content-box">
            <div class="features-icon d-table <?php echo esc_attr( $icon_align); ?>">
                    <div class="features-icon-inner d-table-cell">
                        <i class="<?php echo esc_attr($feature_icon); ?>"></i>
                    </div>
                <!-- End Features icon inner -->
            </div>
            <!-- End Features Icon -->
            <?php if( !empty($title) ) : ?>
                <h3><?php echo esc_html( $title ); ?></h3>
            <?php endif;
            if( !empty($sub_title) ) : ?>
                <p><?php echo esc_html( $sub_title ); ?></p>
            <?php endif;

            if( !empty($btn_text) ) : ?>
                <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" class="tw-readmore"><?php echo esc_html( $btn_text ); ?>
                    <i class="fa fa-angle-right"></i>
                </a>
            <?php endif; ?>
        </div>
        <div class="shap-img">
            <?php if( ! empty($shap_image['url']) && isset($shap_image['url'])) : ?>
                <img src="<?php echo esc_url($shap_image['url']); ?>" alt="<?php echo esc_attr($alt); ?>">
            <?php endif; ?>
        </div>
    </div>
    <!-- End Single Features -->