<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Fun_Fact_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-fun-fact';
    }

    public function get_title() {
        return esc_html__( 'Geobin Fun Fact', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Fun fact', 'geobin'),
            ]
        );

        $this->add_control(

            'fun_fact_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'geobin'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'geobin'),
                    'style2' => esc_html__('Style 2', 'geobin'),
                    'style3' => esc_html__('Style 3', 'geobin'),
                    'style4' => esc_html__('Style 4', 'geobin'),
                ],
            ]
        );

        $this->add_control(

            'fact_name', [

                'label' => esc_html__('Title', 'geobin'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Add a title ', 'geobin'),
            ]
        );

        $this->add_control(

            'fact_value',
            [

                'label' => esc_html__('Value', 'geobin'),
                'type' => Controls_Manager::NUMBER,
                'default'    => esc_html__('4000', 'geobin'),
                'label_block' => true,
                'condition'     => [
                    'fun_fact_style' => ['style1', 'style3', 'style4']
                ]
            ]
        );

        $this->add_control(

            'fun_fact_attribute',
            [
                'label' => esc_html__('Attribute', 'geobin'),
                'description' => esc_html__('You can put here + or %', 'geobin'),
                'type' => Controls_Manager::TEXT,
                'default'    => esc_html__('+', 'geobin'),
            ]
        );

        $this->add_control(
            'fun_fact_image',
            [
                'label' => esc_html__('Image', 'geobin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => GEOBIN_IMAGES_DIR_URI . '/cases/service_04.png',
                ]
        ]
        );

        $this->add_control(
            'fun_fact_image_margin',
            [
                'label' => esc_html__('Image', 'geobin'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .facts-img img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'fun_fact_style' => ['style1', 'style4']
                ]
        ]
        );

        $this->add_control(
            'total_percentage',
            [
                'label' => esc_html__( 'Total Parcentage', 'geobin' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 96,
                'condition' => [
                    'fun_fact_style'   =>  ['style2'],
                ],

            ]
        );

        $this->add_control(
            'total_amount',
            [
                'label' => esc_html__( 'Total Amount', 'geobin' ),
                'type' => Controls_Manager::TEXT,
                'default' => '899 of 1203',
                'condition' => [
                    'fun_fact_style'   =>  ['style2'],
                ],

            ]
        );
        $this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'geobin' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'left'		 => [
                  
                  'title'	 => esc_html__( 'Left', 'geobin' ),
				  'icon'	 => 'fa fa-align-left',
               
               ],
				'center'	     => [
                  
                  'title'	 => esc_html__( 'Center', 'geobin' ),
				  'icon'	 => 'fa fa-align-center',
               
               ],
				'right'		 => [

				  'title'	 => esc_html__( 'Right', 'geobin' ),
                  'icon'	 => 'fa fa-align-right',
                  
					],
				'justify'	 => [

				  'title'	 => esc_html__( 'Justified', 'geobin' ),
                  'icon'	 => 'fa fa-align-justify',
                  
					],
				],
            'default'		 => 'center',
            
            'selectors' => [
                     '{{WRAPPER}} .tw-facts-box' => 'text-align: {{VALUE}};',

				],
			]
        );//Responsive control end

        $this->end_controls_section();


        $this->start_controls_section(
            'chart_title_color',
            [
                'label' => esc_html__('Title Styles', 'geobin'),
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
                    '{{WRAPPER}} .percent-area > p ' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tw-traffic-counter h3 ' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'fun_fact_style'   =>  ['style2'],
                ],
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__( 'Number Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .facts-content .counter' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'fun_fact_style'   =>  ['style1', 'style3', 'style4'],
                ],
            ]
        );
        $this->add_control(
            'fun_title_color',
            [
                'label' => esc_html__( 'Title Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .facts-content .facts-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'fun_fact_style'   =>  ['style1', 'style3', 'style4'],
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'funfact_content_typography',
				'label' => __( 'Number', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .facts-content .counter',
                'condition' => [
                    'fun_fact_style'   =>  ['style1', 'style3', 'style4'],
                ],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'funfact_sub_content_typography',
				'label' => __( 'Title', 'geobin' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .facts-content .facts-title',
                'condition' => [
                    'fun_fact_style'   =>  ['style1', 'style3', 'style4'],
                ],
			]
		);


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'chart_title_typography',
                'label' => esc_html__( 'Typography', 'geobin' ),
                'selectors' => [
                    '{{WRAPPER}} .percent-area > p',
                    '{{WRAPPER}} .tw-traffic-counter h3'
                ],
                'condition' => [
                    'fun_fact_style'   =>  ['style2'],
                ],
            ]
        );
        $this->add_control(
			'funfact_title_margin',
			[
				'label' => __( 'Title margin', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'condition' => [
                    'fun_fact_style'   =>  ['style1', 'style3', 'style4'],
                ],
				'selectors' => [
					'{{WRAPPER}} .facts-content .facts-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();
        $fun_fact_style = $settings['fun_fact_style'];

        $fact_name = $settings['fact_name'];
        $fact_value = $settings['fact_value'];
        $fun_fact_attribute = $settings['fun_fact_attribute'];
        $fun_fact_image = $settings['fun_fact_image'];

        /*Style 2*/
        $total_percentage = $settings['total_percentage'];
        $total_amount = $settings['total_amount'];

        switch ($fun_fact_style){
            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/fun-facts/style1.php';
                break;

            case 'style2':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/fun-facts/style2.php';
                break;

            case 'style3':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/fun-facts/style3.php';
                break;
            case 'style4':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/fun-facts/style4.php';
                break;
        }
    }

    protected function _content_template() { }
}