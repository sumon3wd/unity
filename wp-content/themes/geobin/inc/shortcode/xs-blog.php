<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Post_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'xs-blog';
    }

    public function get_title() {
        return esc_html__( 'Geobin Post', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Post', 'geobin'),
            ]
        );

        $this->add_control(
            'blog_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'geobin'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'geobin'),
                    'style2' => esc_html__('Style 2', 'geobin'),
                    
                ],
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label'         => esc_html__( 'Post count', 'geobin' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '3', 'geobin' ),

            ]
        );

        $this->add_control(
            'xs_post_cat',
            [
                'label'    => esc_html__( 'Select category', 'geobin' ),
                'type'     => Controls_Manager::SELECT,
                'options'  => xs_category_list( 'category' ),
                'default'  => '0'
            ]
        );

        $this->end_controls_section();

         // title
         $this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title style', 'geobin' ),
                'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'meta_color',
			[
				'label' => esc_html__( 'Meta Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-meta span, .post-meta span a' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-info .post-title a' => 'color: {{VALUE}};',
				],
			]
        );
       
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tw-latest-post:hover .post-info .post-title a' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'readmore_color',
			[
				'label' => esc_html__( 'Readmore Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition'      => [
                    'blog_style'     => 'style2'
                ],
				'selectors' => [
					'{{WRAPPER}} .latest-blog-wrapper .blog-btn' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_title_typographys',
				'label' => esc_html__( 'Title Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .post-info .post-title',
			]
        );
        $this->add_control(
			'title_margin',
			[
				'label' => __( 'Title margin', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-info .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        $this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show excerpt ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_readmore',
			[
				'label' => __( 'Show Read More ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
                'default' => 'yes',
                'condition'      => [
                    'blog_style'     => 'style2'
                ]
			]
		);
        $this->add_control(
			'show_date',
			[
				'label' => __( 'Show date ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
			'show_author',
			[
				'label' => __( 'Show Author ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->end_controls_section();
        
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $xs_post_cat = $settings['xs_post_cat'];
        $post_count = $settings['post_count'];
        $blog_style = $settings['blog_style'];
        $show_excerpt = $settings['show_excerpt'];
        $show_readmore = $settings['show_readmore'];
        $show_date = $settings['show_date'];
        $show_author = $settings['show_author'];

        $paged = 1;
        if ( get_query_var('paged') ) $paged = get_query_var('paged');
        if ( get_query_var('page') ) $paged = get_query_var('page');
        $query = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $post_count,
            'cat' => $xs_post_cat,
            'paged' => $paged,
        );

        $query = new \WP_Query( $query );
        switch($blog_style){
            case 'style1':

            if($query->have_posts()):
                ?>
    
                <div class="row">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        $terms  = get_the_terms( get_the_ID(), 'category' );
                        if ( $terms && ! is_wp_error( $terms ) ) :
                            $cat_temp = '';
                            foreach ( $terms as $term ) {
                                $cat_temp .= '<a href="'.get_category_link($term->term_id).'">'.$term->name.'</a>';
                            }
                        endif;
                        ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="tw-latest-post">
                                <div class="latest-post-media text-center">
                                    <?php
                                    if(has_post_thumbnail()):
                                        $img = \xs_resize( get_post_thumbnail_id( $query->ID ), 350, 220 );
                                        ?>
                                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title($query->ID); ?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <!-- End Latest Post Media -->
                                <div class="post-body">
                                    <?php if($show_date == 'yes'): ?>
                                    <div class="post-item-date">
                                        <div class="post-date">
                                            <span class="date"><?php echo get_the_date('d'); ?></span>
                                            <span class="month"><?php echo get_the_date('M'); ?></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <!-- End Post Item Date -->
                                    <div class="post-info">
                                        <?php if($show_author == 'yes'): ?>
                                        <div class="post-meta">
                                        <span class="post-author">
                                            <?php echo esc_html__('Posted by','geobin') ?> <?php the_author_posts_link(); ?>
                                        </span>
                                        </div>
                                        <?php endif; ?>
                                        <!-- End Post Meta -->
                                        <h3 class="post-title"><a href="<?php echo esc_url(get_the_permalink() );  ?>"><?php the_title(); ?></a></h3>
                                        <?php if($show_excerpt == 'yes'): ?>
                                        <div class="entry-content">
                                            <p><?php geobin_excerpt(10); ?></p>
                                        </div>
                                         <?php endif; ?>
                                        <!-- End Entry Content -->
                                    </div>
                                    <!-- End Post info -->
                                </div>
                                <!-- End Post Body -->
                            </div>
                            <!-- End Tw Latest Post -->
                        </div>
                    <?php endwhile; ?>
                    <!-- End Col -->
                </div>
    
            <?php
            endif;
            wp_reset_postdata();
            break;

            case 'style2':
            if($query->have_posts()):
                ?>
    
                <div class="row">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        $terms  = get_the_terms( get_the_ID(), 'category' );
                        if ( $terms && ! is_wp_error( $terms ) ) :
                            $cat_temp = '';
                            foreach ( $terms as $term ) {
                                $cat_temp .= '<a href="'.get_category_link($term->term_id).'">'.$term->name.'</a>';
                            }
                        endif;
                        ?>
                        <div class="col-lg-4 col-md-12">
                            <div class="tw-latest-post latest-blog-wrapper">
                                <div class="latest-post-media text-center">
                                    <?php
                                    if(has_post_thumbnail()):
                                        $img = \xs_resize( get_post_thumbnail_id( $query->ID ), 350, 220 );
                                        ?>
                                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo get_the_title($query->ID); ?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <!-- End Latest Post Media -->
                                <div class="post-body">
                                    
                                    <!-- End Post Item Date -->
                                    <div class="post-info">
                                        <div class="post-meta">
                                        <?php if($show_author=='yes'): ?>
                                        <span class="post-author">
                                            <?php echo esc_html__('Posted by','geobin') ?> <?php the_author_posts_link(); ?>
                                        </span>
                                        <?php endif; ?>
                                        <?php if($show_date=='yes'): ?>
                                        <span class="post-date-info">
                                        <i class="fa fa-calendar-o"></i>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                         <?php endif; ?>
                                        </div>
                                        <!-- End Post Meta -->
                                        <h3 class="post-title"><a href="<?php echo esc_url(get_the_permalink() );  ?>"><?php the_title(); ?></a></h3>
                                        <?php if($show_excerpt== 'yes'): ?>
                                        <div class="entry-content">
                                            <p><?php geobin_excerpt(10); ?></p>
                                        </div>
                                      <?php endif; ?>
                                      <?php if($show_readmore=='yes'): ?>
                                        <a class="blog-btn" href="<?php echo esc_url(get_the_permalink() );  ?>"> <i class="fa fa-plus"></i> <?php echo esc_html('Read More', 'geobin'); ?></a>
                                        <?php endif; ?>
                                        <!-- End Entry Content -->
                                    </div>
                                    <!-- End Post info -->
                                </div>
                                <!-- End Post Body -->
                            </div>
                            <!-- End Tw Latest Post -->
                        </div>
                    <?php endwhile; ?>
                    <!-- End Col -->
                </div>
    
            <?php
            endif;
            wp_reset_postdata();

            break;
        }

    }
    protected function _content_template() { }
}