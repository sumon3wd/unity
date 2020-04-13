<div class="geobin-heading-title">
    <?php if(!empty($title) || !empty($sub_title)): ?>
        <h2>
            <?php if(!empty($sub_title)): ?>
                <small><?php echo esc_html( $sub_title ); ?></small>
            <?php endif;

            echo geobin_kses(sprintf($title, '<span>', '</span>' ) );
            ?>
        </h2>
    <?php endif;
    if(!empty($geobin_border == 'animation_center')){ ?>
        <span class="animate-border mr-auto ml-auto"></span>
    <?php } elseif ($geobin_border == 'animation_left'){
        echo '<span class="animate-border pull-left"></span>';
    } elseif ($geobin_border == 'animation_right'){
        echo '<span class="animate-border pull-right"></span>';
    } elseif ($geobin_border == 'non_animated') { ?>
        <span class="bottom-border tw-mt-20 tw-mb-10"></span>
    <?php } else{} ?>
</div>