<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Project_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-projects';
    }

    public function get_title() {
        return esc_html__( 'Geobin Projects', 'geobin' );
    }

    public function get_icon() {
        return 'fa fa-folder-open';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Projects', 'geobin'),
            ]
        );

        $this->add_control(

            'style', [
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
	        'default'       => 12,
	      ]
	    );

		$this->add_control(
	      'view_all_btn',
	      [
	          'label'         => esc_html__( 'Button Text', 'geobin' ),
	          'label_block'   => true,
	          'type'          => Controls_Manager::TEXT,
              'default'       => 'View All',
              'placeholder'   => 'View All',
	      ]
	    );

		$this->add_control(
	      'view_all_btn_url',
	      [
	          'label'         => esc_html__( 'Button URL', 'geobin' ),
	          'label_block'   => true,
	          'type'          => Controls_Manager::TEXT,
              'placeholder'   => 'View All Button URL',
	      ]
	    );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Styles', 'geobin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );



        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .casestudy-content .case-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .tw-case-study-box:hover .casestudy-content .case-title' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .casestudy-content .case-title',
			]
		);
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'geobin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '' ,
                    'left' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-content .case-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_box_padding',
            [
                'label' => esc_html__( 'Content Box padding', 'geobin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '' ,
                    'left' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .casestudy-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_box_margin',
            [
                'label' => esc_html__( 'Content Box Margin', 'geobin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '' ,
                    'left' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tw-case-study-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Button Margin', 'geobin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '' ,
                    'left' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .xs_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
				],
                'selectors' => [
					'{{WRAPPER}} .project-style2 .tw-case-study-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

	}
    protected function render( ) {

        $settings = $this->get_settings();

        $post_count = $settings['post_count'];
        $view_all_btn = $settings['view_all_btn'];
        $view_all_btn_url = $settings['view_all_btn_url'];

		$project_cat = array(
            'orderby'       => 'ID',
            'order'         => 'DESC', 
            'hide_empty'    => 1,
            'hierarchical'  => 1,
            'taxonomy'      => 'portfolio_cat'
        );

        $categories = get_categories( $project_cat );

    	$query = array(
            'post_type'      => 'projects',
            'post_status'    => 'publish',
            'posts_per_page' => $post_count,
    	);

    	$xs_query = new \WP_Query($query);

        ?>
        <div class="row">
            <div class="tw-cases project-style2">
                <?php if($xs_query->have_posts()):
                    while ($xs_query->have_posts()) :
                        $xs_query->the_post();

                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src( $img_id, 'full', true);


                        $style = $settings['style'];
                        switch ($style) {

                            case 'style1':
                                require GEOBIN_SHORTCODE_DIR_STYLE .'/project/style1.php';
                                break;

                            case 'style2':
                                require GEOBIN_SHORTCODE_DIR_STYLE .'/project/style2.php';
                                break;
                        }
                    endwhile;
                ?>
            </div>
            <!-- Cases End -->
			<?php endif;
            if( !empty($view_all_btn) ) : ?>
            <div class="col-md-12 text-center">
                <a href="<?php echo esc_url($view_all_btn_url); ?>" class="btn btn-primary btn-lg xs_btn"><?php echo esc_html($view_all_btn); ?></a>
            </div>
            <?php endif; ?>
        </div>
        <!-- Row End -->

    <?php wp_reset_postdata();
    }

    protected function _content_template() { }
}
?>