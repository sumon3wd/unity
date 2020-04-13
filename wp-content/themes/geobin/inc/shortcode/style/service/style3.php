<?php
        $service_category = $settings[ 'service_category' ];
        $icon_align = $settings[ 'icon_align' ];
        $show_icon_animation = $settings[ 'show_icon_animation' ];
        $show_icon_dot_animation = $settings[ 'show_icon_dot_animation' ];


$query = array(
'post_type'      => 'service',
'post_status'    => 'publish',
'posts_per_page' => $post_count,
'post__in' =>   array($service_category),   

);

$xs_query = new \WP_Query($query); 



?>

<div class=" service-wrapper service-icon-style">

    <?php
    if($xs_query->have_posts()):
        while ($xs_query->have_posts()) :
            $xs_query->the_post();
            ?>
            <div class=" text-center">
                <div class="tw-service-box <?php echo esc_attr( ($show_icon_animation=='yes')? '': 'no-service-icon-animation'); ?>">
                   <div class="icon-circle-box <?php echo esc_attr( ($show_icon_dot_animation=='no')? 'no-service-dot-animation': ''); ?>">
                <div class="service-icon service-icon-bg d-table <?php echo esc_attr($icon_align); ?>">
                    <div class="service-icon-inner d-table-cell">
                        <?php
                        $service_icon = '';
                        if(defined("FW")){
                            $service_icon = fw_get_db_post_option(get_the_ID(), 'service_icon' );
                        }
                            ?>
                             <i class="<?php echo esc_attr($service_icon); ?>"></i>
                        </div>
                    </div>
                    </div>
                    <!-- Service icon end -->
                    <div class="service-content">
                        <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>
                        <p><?php geobin_excerpt(16); ?></p>
                      
                    </div>
                    <!-- Service Content end -->
                </div>
                <!-- Service box end -->
            </div>
        <?php endwhile; endif; ?>
    <!-- Col End -->
</div>

<?php wp_reset_postdata();