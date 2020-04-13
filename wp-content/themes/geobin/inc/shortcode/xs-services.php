<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Services_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-services';
    }

    public function get_title() {
        return esc_html__( 'Geobin Services', 'geobin' );
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
                'label' => esc_html__('Geobin Service', 'geobin'),
            ]
        );

        $this->add_control(

            'service_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'geobin'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'geobin'),
                    'style2' => esc_html__('Service Carousel', 'geobin'),
                    'style3' => esc_html__(' style 3', 'geobin'),
                ],
            ]
        );
     
    
		$this->add_control(
	      'post_count',
	      [
	        'label'         => esc_html__( 'Post count', 'geobin' ),
	        'type'          => Controls_Manager::NUMBER,
	        'default'       => 6,
            'condition'     => ['service_style' => ['style1']]
	      ]
        );
        $this->add_control(
		'service_category',
			[
				'label'     => esc_html__( 'Category', 'geobin' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => $this->getCategories(),
                'condition'     => ['service_style' => 'style3'],
			]
        );

        $this->add_control(
            'title_text', [
                'label'			 => esc_html__( 'Heading Title', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Add title here', 'geobin' ),
                'default'        => esc_html__( 'Add a title here', 'geobin'),
                'condition'     => ['service_style' => 'style2']
            ]
        );

        $this->add_control(
            'title_text_desc', [
                'label'			 => esc_html__( 'Heading Description', 'geobin' ),
                'type'			 => Controls_Manager::TEXTAREA,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Add some text here', 'geobin' ),
                'default'        => esc_html__( 'Start working with an company that can provide everything you need to generate awareness, drive traffic, connect with customers, and increase sales montes, 
nascetur ridiculus mus.', 'geobin'),
                'condition'      => [
                    'service_style'     => 'style2'
                ]
            ]
        );
		$this->add_control(
			'border_color', [
				'label'		 => esc_html__( 'Border Color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-heading span.animate-border' => 'background: {{VALUE}};',
				],
				'condition'      => [
                    'service_style'     => 'style2'
                ]
			]
		);

		$this->add_control(
			'animate_border_color', [
				'label'		 => esc_html__( 'Animated Border Color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .animate-border:after' => 'border-right-color: {{VALUE}}; border-left-color: {{VALUE}};',
				],
				'condition'      => [
                    'service_style'     => 'style2'
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
            'section_genarel_styling',
            [
                'label' => esc_html__('General Setting', 'geobin'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
            'gutter',
            [
                'label' => esc_html__('Gutter', 'geobin'),
                'description' => esc_html__('Space between columns in the grid.', 'geobin'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .geobin-photo-gallery-grid-v3-item' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .geobin-photo-gallery-grid-item' => 'padding: {{SIZE}}{{UNIT}};',
                ],
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
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} service-content h3, .service-icon-style .service-content h3 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .service-wrapper:hover .service-content h3 a' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_title_typographys',
				'label' => esc_html__( 'Title Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .service-content h3',
			]
        );
        $this->add_control(
			'title_margin',
			[
				'label' => __( 'Title margin', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .service-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        $this->end_controls_section();

        // icon

        $this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon style', 'geobin' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'service_style'   =>  ['style3'],
                ],
			]
        );
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon i' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style:hover .service-icon i' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon bg Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_bg_hover_color',
			[
				'label' => esc_html__( 'Icon bg hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style:hover .service-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
        
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Typography', 'geobin' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => __( 'Border', 'geobin' ),
				'selector' => '{{WRAPPER}} .service-icon-style .service-icon',
			]
        );
        $this->add_control(
			'icon_border_hover_color',
			[
				'label' => esc_html__( 'border hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style:hover .service-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .service-icon-style .service-icon:after' => 'border-color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'icon_width',
			[
				'label' =>esc_html__( 'Icon Width', 'geobin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
            ],
            'size_units' => [ 'px', '%', 'em' ],
            'size' => '',
				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
      $this->add_responsive_control(
			'icon_height',
			[
				'label' =>esc_html__( 'Icon Height', 'geobin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
            'size_units' => [ 'px', '%', 'em' ],
            'size' => '',

				'selectors' => [
					'{{WRAPPER}} .service-icon-style .service-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'show_icon_animation',
			[
				'label' => __( 'Show icon border animation ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_icon_dot_animation',
			[
				'label' => __( 'Show icon dotted animation ', 'geobin' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'geobin' ),
				'label_off' => __( 'Hide', 'geobin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        
        $this->add_responsive_control(
			'icon_align', [
				'label'			 => esc_html__( 'Alignment', 'geobin' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'mr-auto'		 => [
                  
                  'title'	 => esc_html__( 'Left', 'geobin' ),
				  'icon'	 => 'fa fa-align-left',
               
               ],
				'mx-auto'	     => [
                  
                  'title'	 => esc_html__( 'Center', 'geobin' ),
				  'icon'	 => 'fa fa-align-center',
               
               ],
				'ml-auto'		 => [

				  'title'	 => esc_html__( 'Right', 'geobin' ),
                  'icon'	 => 'fa fa-align-right',
                  
					],
			
				],
            'default'		 => 'mx-auto',
            
         
			]
        );//Responsive control end


        
        $this->end_controls_section();


	}
    protected function render( ) {

        $settings = $this->get_settings();

        $post_count = $settings['post_count'];
        $service_style = $settings['service_style'];
        $title = $settings[ 'title_text' ];
        $title_desc = $settings[ 'title_text_desc' ];
        $service_category = $settings[ 'service_category' ];
        $show_icon_animation = $settings[ 'show_icon_animation' ];
        $show_icon_dot_animation = $settings[ 'show_icon_dot_animation' ];
       


        switch ($service_style) {

            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/service/style1.php';
                break;

            case 'style2':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/service/style2.php';
                break;
            case 'style3':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/service/style3.php';
                break;
        }

    }

    protected function _content_template() { }
    public function getCategories(){
        $terms = get_posts( array(
            'post_type'    => 'service',
            'hide_empty'  => false,
            'posts_per_page'      => '150', 
        ) );
       
       
        $cat_list = [];
        foreach($terms as $post) {
          setup_postdata($post);
         $cat_list[$post->ID]  = [$post->post_title];
        }
          
       return $cat_list;
    }
}
?>