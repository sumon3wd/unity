<?php

namespace Elementor;

use function Couchbase\defaultDecoder;

if ( ! defined( 'ABSPATH' ) ) exit;

class XS_Price_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-price'; 
    }

    public function get_title() {
        return esc_html__( 'Geobin Price Table', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'pricing_plan',
            [
                'label' => esc_html__('Pricing Plans', 'geobin'),
            ]
        );

        $this->add_control(

            'pricing_table_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'geobin'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'geobin'),
                    'style2' => esc_html__('Style 2', 'geobin'),
                    'style3' => esc_html__('Style 3', 'geobin'),
                ],
            ]
        );

        $this->add_control(
            'monthly_pricing_table',
            [
                'label' => esc_html__( 'Monthly Package', 'geobin' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Monthly',
                'condition'     => ['pricing_table_style' => 'style1']
            ]
        );

        $this->add_control(
            'yearly_pricing_table',
            [
                'label' => esc_html__( 'Yearly Package', 'geobin' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Yearly',
                'condition'     => ['pricing_table_style' => 'style1']
            ]
        );

        /*Pricing Table Style 1*/
        $this->add_control(
            'monthly_table_name',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'pricing_title' => esc_html__("Monthly Package", 'geobin'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'xs_featured_table',
                        'type' => Controls_Manager::SWITCHER,
                        'label' => esc_html__('Do you want to feature it?', 'geobin'),
                        'label_block'       => true,
                        'default' => 'label_off',
                        'label_on' => esc_html__( 'Yes', 'geobin' ),
                        'label_off' => esc_html__( 'No', 'geobin' ),
                    ],

                    [
                        'name' => 'table_title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Table Title', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_image',
                        'type' => Controls_Manager::MEDIA,
                        'label' => esc_html__('Table Image', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_content',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Table Content', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'currency_icon',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Currency', 'geobin'),
                        'default'   => '$',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_price',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Price', 'geobin'),
                        'default'   => '29.99',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_duration',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Duration', 'geobin'),
                        'default'   => esc_html__('Month', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'button_text',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Button Text', 'geobin'),
                        'default'   => 'Buy Now',
                        'label_block' => true,
                    ],

                    [
                        'name'          => 'button_url',
                        'type'          => Controls_Manager::URL,
                        'label'         => esc_html__('Button URL', 'geobin'),
                        'placeholder'   => 'http://example.com',
                        'label_block'   => true,
                    ],

                ],
                //'title_field' => '{{{ pricing_title }}}',
                'condition'     => ['pricing_table_style' => 'style1']
            ]
        );

        /*Yearly Package Repeater*/
        $this->add_control(
            'yearly_table_name',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'pricing_title' => esc_html__("Yearly Table", 'geobin'),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'xs_featured_table',
                        'type' => Controls_Manager::SWITCHER,
                        'label' => esc_html__('Do you want to feature it?', 'geobin'),
                        'label_block'       => true,
                        'default' => 'label_off',
                        'label_on' => esc_html__( 'Yes', 'geobin' ),
                        'label_off' => esc_html__( 'No', 'geobin' ),
                    ],

                    [
                        'name' => 'table_top_image',
                        'type' => Controls_Manager::MEDIA,
                        'label' => esc_html__('Table Top Image', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Table Title', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_content',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Table Content', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'currency_icon',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Currency', 'geobin'),
                        'default'   => '$',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_price',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Price', 'geobin'),
                        'default'   => '29.99',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_duration',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Duration', 'geobin'),
                        'default'   => esc_html__('Month', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'button_text',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Button Text', 'geobin'),
                        'default'   => 'Buy Now',
                        'label_block' => true,
                    ],

                    [
                        'name'          => 'button_url',
                        'type'          => Controls_Manager::URL,
                        'label'         => esc_html__('Button URL', 'geobin'),
                        'placeholder'   => 'http://example.com',
                        'label_block'   => true,
                    ],

                ],
                //'title_field' => '{{{ pricing_title }}}',
                'condition'     => ['pricing_table_style' => 'style1']
            ]
        );

        $this->add_control(
            'table_top_image', [
                'label'			 => esc_html__( 'Table Top Image', 'geobin' ),
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Do you want to insert image?', 'geobin'),
                'label_block'       => true,
                'default' => 'label_off',
                'label_on' => esc_html__( 'Yes', 'geobin' ),
                'label_off' => esc_html__( 'No', 'geobin' ),
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );
        $this->add_control(
            'pricing_image',
            [
                'label' => esc_html__('Price Image', 'geobin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'      => [
                    'table_top_image'     => 'yes',
                ]
            ]
        );
        $this->add_control(
            'package_title', [
                'label'			 => esc_html__( 'Table Title', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Put here a title', 'geobin' ),
                'default'        => esc_html__('Starter Plan', 'geobin'),
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'currency_icon', [
                'label'			 => esc_html__( 'Currency Icon', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Currency Icon', 'geobin' ),
                'default'        => '$',
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'price_amount', [
                'label'			 => esc_html__( 'Price Amount', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Amount', 'geobin' ),
                'default'        => '49.99',
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'general_table_duration', [
                'label'			 => esc_html__( 'Duration', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'default'   => esc_html__('/Mo', 'geobin'),
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'general_table_content', [
                'label'			 => esc_html__( 'Table Content...', 'geobin' ),
                'type'			 => Controls_Manager::TEXTAREA,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Price Amount', 'geobin' ),
                'default'        => false,
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'general_buy_btn', [
                'label'			 => esc_html__( 'Button Text', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Button Text', 'geobin' ),
                'default'        => 'Buy Now',
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        $this->add_control(
            'general_buy_btn_url', [
                'label'			 => esc_html__( 'Button URL', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Button URL', 'geobin' ),
                'default'        => 'http://example.com',
                'condition'      => [
                    'pricing_table_style'     => 'style2',
                ]
            ]
        );

        /*Pricing Tab style 3*/
        $this->add_control(
            'monthly_table_name_style3',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'pricing_title' => esc_html__("Monthly Package", 'geobin'),
                    ],
                ],
                'fields' => [

                    [
                        'name' => 'table_background_color',
                        'type' => Controls_Manager::COLOR,
                        'label' => esc_html__('Table Background Color', 'geobin'),
                        'label_block' => true,
                        'default'       => '#2BC2A7',
                    ],

                    [
                        'name' => 'table_btn_color',
                        'type' => Controls_Manager::COLOR,
                        'label' => esc_html__('Table Button Color', 'geobin'),
                        'label_block' => true,
                        'default'       => '#2BC2A7',
                    ],

                    [
                        'name' => 'table_image',
                        'type' => Controls_Manager::MEDIA,
                        'label' => esc_html__('Table Image', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Table Title', 'geobin'),
                        'default' => esc_html__('Starter Plan', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'currency_icon',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Currency', 'geobin'),
                        'default'   => '$',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_price',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Price', 'geobin'),
                        'default'   => '29.99',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_duration',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Duration', 'geobin'),
                        'default'   => esc_html__('/yr', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_content',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Table Content', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'button_text',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Button Text', 'geobin'),
                        'default'   => 'Buy Now',
                        'label_block' => true,
                    ],

                    [
                        'name'          => 'button_url',
                        'type'          => Controls_Manager::URL,
                        'label'         => esc_html__('Button URL', 'geobin'),
                        'placeholder'   => 'http://example.com',
                        'label_block'   => true,
                    ],

                ],
                //'title_field' => '{{{ pricing_title }}}',
                'condition'     => ['pricing_table_style' => 'style3']
            ]
        );

        /*Yearly Package Repeater*/
        $this->add_control(
            'yearly_table_name_style3',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'pricing_title' => esc_html__("Yearly Table", 'geobin'),
                    ],
                ],
                'fields' => [

                    [
                        'name' => 'table_background_color',
                        'type' => Controls_Manager::COLOR,
                        'label' => esc_html__('Table Background Color', 'geobin'),
                        'label_block' => true,
                        'default'       => '#2BC2A7',
                    ],

                    [
                        'name' => 'table_btn_color',
                        'type' => Controls_Manager::COLOR,
                        'label' => esc_html__('Table Button Color', 'geobin'),
                        'label_block' => true,
                        'default'       => '#2BC2A7',
                    ],

                    [
                        'name' => 'table_top_image',
                        'type' => Controls_Manager::MEDIA,
                        'label' => esc_html__('Table Top Image', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_title',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Table Title', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_content',
                        'type' => Controls_Manager::TEXTAREA,
                        'label' => esc_html__('Table Content', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'currency_icon',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Currency', 'geobin'),
                        'default'   => '$',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_price',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Price', 'geobin'),
                        'default'   => '29.99',
                        'label_block' => true,
                    ],

                    [
                        'name' => 'table_duration',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Duration', 'geobin'),
                        'default'   => esc_html__('/yr', 'geobin'),
                        'label_block' => true,
                    ],

                    [
                        'name' => 'button_text',
                        'type' => Controls_Manager::TEXT,
                        'label' => esc_html__('Button Text', 'geobin'),
                        'default'   => 'Buy Now',
                        'label_block' => true,
                    ],

                    [
                        'name'          => 'button_url',
                        'type'          => Controls_Manager::URL,
                        'label'         => esc_html__('Button URL', 'geobin'),
                        'placeholder'   => 'http://example.com',
                        'label_block'   => true,
                    ],

                ],
                //'title_field' => '{{{ pricing_title }}}',
                'condition'     => ['pricing_table_style' => 'style3']
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'section_title_style',
			[
				'label' 	=> esc_html__( 'Tab Styles', 'geobin' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_responsive_control(
			'image_margin',
			[
				'label' =>esc_html__( 'Image margin bottom', 'geobin' ),
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
				'size' => 40,
            ],
            'condition'     => ['pricing_table_style' => 'style2'],


			'selectors' => [
				'{{WRAPPER}} .tw-price-box .pricing-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			]
        );

		$this->add_control(
			'table_title_color',
			[
				'label'		=> esc_html__( 'Table Title Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-feaures h3' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'package_title_hover_color',
			[
				'label'		=> esc_html__( 'Table Title Hover Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tw-pricing-box:hover .pricing-feaures h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_price_color',
			[
				'label'		=> esc_html__( 'Price Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-price sup' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pricing-price strong' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pricing-price small' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_price_content_color',
			[
				'label'		=> esc_html__( 'Table Content Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pricing-feaures ul li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_price_btn_color',
			[
				'label'		=> esc_html__( 'Button Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tw-pricing-box .btn' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'tab_btn_hover_color',
			[
				'label'		=> esc_html__( 'Button Hover Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tw-pricing-box:hover .btn' => 'color: {{VALUE}} !important;'
				],
			]
		);

		$this->add_control(
			'tab_price_btn_bg',
			[
				'label'		=> esc_html__( 'Button BG Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tw-pricing-box a.btn-dark' => 'background-color: {{VALUE}} !important;'
				],
			]
		);

		$this->add_control(
			'tab_btn_hover_bg',
			[
				'label'		=> esc_html__( 'Button Hover BG Color', 'geobin' ),
				'type'		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tw-pricing-box:hover .btn' => 'background-color: {{VALUE}} !important;;'
				],
			]
		);

		$this->end_controls_section();


		/*General Package Table (style2)*/
        $this->start_controls_section(
            'general_table_style',
            [
                'label' 	=> esc_html__( 'General Table Style', 'geobin' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'general_table_bg_color',
            [
                'label'		=> esc_html__( 'Background Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'default'	=> '#2BC2A7',
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box' => '    background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_price_color',
            [
                'label'		=> esc_html__( 'Price, Currency Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box .pricing-price strong' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .tw-price-box .pricing-price sup' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .tw-price-box .pricing-price small' => ' color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_title_color',
            [
                'label'		=> esc_html__( 'Background Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-feaures h3' => ' color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_content_color',
            [
                'label'		=> esc_html__( 'Table Content Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-feaures ul li' => ' color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_btn_bg_color',
            [
                'label'		=> esc_html__( 'Button Background', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box .btn-dark' => ' background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_btn_hover',
            [
                'label'		=> esc_html__( 'Button Background Hover Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box:hover .btn-dark' => ' background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_btn_color',
            [
                'label'		=> esc_html__( 'Button Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box a.btn' => ' color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_btn_hover_color',
            [
                'label'		=> esc_html__( 'Button Hover Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box:hover .btn-dark' => ' color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'general_table_btn_border_color',
            [
                'label'		=> esc_html__( 'Button Border Color', 'geobin' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tw-price-box a.btn' => ' border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();

        $pricing_table_style = $settings['pricing_table_style'];

        $monthly = $settings['monthly_pricing_table'];
        $yearly = $settings['yearly_pricing_table'];

        $monthly_table = $settings['monthly_table_name'];
        $yearly_table = $settings['yearly_table_name'];

        $monthly_table_style3 = $settings['monthly_table_name_style3'];
        $yearly_table_style3 = $settings['yearly_table_name_style3'];
        $pricing_image = $settings['pricing_image'];
        $table_top_image = $settings['table_top_image'];
        /*General Package Contents*/
        $package_title = $settings['package_title'];
        $currency_icon = $settings['currency_icon'];
        $price_amount = $settings['price_amount'];
        $general_package_content = $settings['general_table_content'];
        $general_buy_btn = $settings['general_buy_btn'];
        $general_buy_btn_url = $settings['general_buy_btn_url'];

        switch ($pricing_table_style) {
            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/price-table/style1.php';
                break;

            case 'style2':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/price-table/style2.php';
                break;

            case 'style3':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/price-table/style3.php';
                break;
        }

    }


    protected function _content_template() { }
}