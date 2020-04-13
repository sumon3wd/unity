<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-geobin-image-box';
    }

    public function get_title() {
        return esc_html__( 'Geobin Image Box', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-insert-image';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Image Box', 'geobin'),
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
                    'style3' => esc_html__('Style 3', 'geobin'),
                    'style4' => esc_html__('Style 4', 'geobin'),
                    'style5' => esc_html__('Style 5', 'geobin'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Front Image', 'geobin' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
                'condition' => [
                    'style'   =>  ['style1', 'style2' ,'style3', 'style5'],
                ],
            ]
        );
        $this->add_control(
			'feature_icon',
			[
				'label' => __( 'Feature Icons', 'geobin' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-wpforms',

                'condition' => [
                    'style'   =>  ['style4'],
                ],
			]
        );
  

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'geobin' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'   => esc_html__( 'Add title', 'geobin' ),
                'default'       => esc_html__( 'Add Title', 'geobin' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'geobin' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'geobin' ),
                'condition' => [
                    'style'   =>  ['style1', 'style2', 'style4', 'style5'],
                ],
            ]
        );

        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Label', 'geobin' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'geobin' ),
				'placeholder' => esc_html__( 'Read More', 'geobin' ),
                'condition' => [
                    'style'   =>  ['style1', 'style2', 'style4', 'style5'],
                ],
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Link', 'geobin' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__('http://your-link.com','geobin' ),
				'default' => [
					'url' => '#',
				],
                'condition' => [
                    'style'   =>  ['style1', 'style2', 'style4' ,'style5'],
                ],
			]
		);
		
        $this->add_control(
            'shap_image',
            [
                'label' => esc_html__( 'Shap Image', 'geobin' ),
                'type' => Controls_Manager::MEDIA,
                
                'label_block' => true,
				'condition' => [
                    'style'   =>  ['style4'],
                ],
            ]
        );

        $this->end_controls_section();

        /**
		 *
		 *Title Style
		 *
		*/

        $this->start_controls_section(
			'section_title_tab',
			[
				'label' => esc_html__( 'Title', 'geobin' ),
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
					'{{WRAPPER}} .features-box h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tw-service-features-box h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tw-award-box h3' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .tw-award-box:hover h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .features-box:hover h3' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_title_typographys',
				'label' => esc_html__( 'Title Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,

				'selector' => '{{WRAPPER}} .features-box h3, .tw-service-features-box h3',
			]
        );
        $this->add_control(
			'title_margin',
			[
				'label' => __( 'Title margin', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-box h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		/**
		 *
		 *Sub Title Style
		 *
        */
        $this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon style', 'geobin' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style'   =>  ['style4'],
                ],
			]
        );
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .features-box .features-icon-inner i' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#9235f0',
				'selectors' => [
					'{{WRAPPER}} .features-box .features-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'icon_bg_hover_color',
			[
				'label' => esc_html__( 'Icon hover background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-box:hover .features-icon' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .features-box .features-icon-inner i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => __( 'Border', 'geobin' ),
				'selector' => '{{WRAPPER}} .features-box .features-icon',
			]
        );
        $this->add_control(
			'icon_border_radius',
			[
				'label' => __( 'Border Radius', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default' => [
					'top' => '50',
					'right' => '50',
					'bottom' => '50',
					'left' => '50',
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .features-box .features-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'default' => [
				'unit' => 'px',
				'size' => 100,
			],
            'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .features-box .features-icon' => 'width: {{SIZE}}{{UNIT}};',
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
			'default' => [
				'unit' => 'px',
				'size' => 100,
			],

			'selectors' => [
				'{{WRAPPER}} .features-box .features-icon' => 'height: {{SIZE}}{{UNIT}};',
			],
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


        $this->start_controls_section(
			'section_sub_title_tab',
			[
				'label' => esc_html__( 'Sub Title', 'geobin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-box p ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subs_title_typography',
				'label' => esc_html__( 'Sub Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .features-box p',
			]
		);

        $this->add_control(
			'sub_content_margin',
			[
				'label' => __( 'Content margin', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Read more', 'geobin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'readmore_color',
			[
				'label' => esc_html__( 'Read More Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-box a.tw-readmore' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmores_typography',
				'label' => __( 'Typography', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a.tw-readmore',
			]
		);
        $this->end_controls_section();



        $this->start_controls_section(
			'section_box_padding',
			[
				'label' => esc_html__( 'Box padding', 'geobin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'box_padding',
			[
				'label' => __( 'Box Padding', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_border_color',
			[
				'label' => esc_html__( 'border hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
                    'style'   =>  ['style5'],
                ],
				'selectors' => [
					'{{WRAPPER}} .features-box' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .feature-box-style5 .tw-readmore' => 'border-color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
			'box_border_hover_color',
			[
				'label' => esc_html__( 'border hover Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
                    'style'   =>  ['style5'],
                ],
				'selectors' => [
					'{{WRAPPER}} .features-box:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .feature-box-style5:hover .tw-readmore' => 'border-color: {{VALUE}};',
				],
			]
		);
        

        $this->end_controls_section();


    }

    protected function render( ) {
    	
        $settings = $this->get_settings();
        $image = $settings['image'];
        $shap_image = $settings['shap_image'];
        $title = $settings['title'];
        $sub_title = $settings['sub_title'];
        $btn_text = $settings['btn_text'];
        $feature_icon = $settings['feature_icon'];
        $icon_align = $settings['icon_align'];
		$btn_link = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';
		$btn_target = ( $settings['btn_link']['is_external']) ? '_blank' : '_self';

        $style = $settings['style'];

        switch ($style) {
            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/box-style/style1.php';
                break;

            case 'style2':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/box-style/style2.php';
                break;

            case 'style3':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/box-style/style3.php';
                break;
            case 'style4':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/box-style/style4.php';
                break;
            case 'style5':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/box-style/style5.php';
                break;
        }

    }



    protected function _content_template() { }
}