<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Xs_Heading_Widget extends Widget_Base {

	public function get_name() {
		return 'xs-heading';
	}

	public function get_title() {
		return esc_html__( 'Geobin Heading', 'geobin' );
	}

	public function get_icon() {
		return 'eicon-type-tool';
	}

	public function get_categories() {
		return [ 'geobin-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Geobin Heading', 'geobin' ),
			]
		);

        $this->add_control(
            'short_title', [
                'label'			 => esc_html__( 'Short Title', 'geobin' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Put here short title', 'geobin' ),
                'default'        => esc_html__('Add a short title here', 'geobin'),
            ]
        );

		$this->add_control(
			'title_text', [
				'label'			 => esc_html__( 'Heading Title', 'geobin' ),
				'type'			 => Controls_Manager::TEXT,
				'label_block'	 => true,
				'placeholder'	 => esc_html__( 'Add title here', 'geobin' ),
                'default'        => esc_html__( 'Add a title here', 'geobin'),
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
					'center'	 => [
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
				'prefix_class'   => 'xs-heading-text elementor%s-align-',
			]
		);
        $this->add_control(
            'geobin_border',
            [
                'label'       => esc_html__( 'Heading Bottom Border', 'geobin' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'animation_center',
                'options' => [
                    'animation_left'  => esc_html__( 'Animation Left', 'geobin' ),
                    'animation_center'  => esc_html__( 'Animation Center', 'geobin' ),
                    'animation_right'  => esc_html__( 'Animation Right', 'geobin' ),
                    'non_animated' => esc_html__( 'Non Animated', 'geobin' ),
                    'no' => esc_html__( 'No Border', 'geobin' ),
                ],
            ]
        );
		$this->end_controls_section();

		//Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'geobin' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .geobin-heading-title h2' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			'title_heightlight_color', [
				'label'		 => esc_html__( 'Title highlight color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .geobin-heading-title h2 span' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'title_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'geobin' ),
				'type'			 => Controls_Manager::SLIDER,
				'default'		 => [
					'size' => '',
				],
				'range'			 => [
					'px' => [
						'min'	 => 0,
						'step'	 => 5,
					],
				],
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .geobin-heading-title h2'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .heading-area'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,

			'selector'	 => '{{WRAPPER}} .geobin-heading-title h2',
			]
		);

		$this->end_controls_section();

		//Subtitle Style Section
		$this->start_controls_section(
			'section_subtitle_style', [
				'label'	 => esc_html__( 'Sub Title', 'geobin' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color', [
				'label'		 => esc_html__( 'color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .geobin-heading-title h2 small' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subtitle_typography',
			'selector'	 => '{{WRAPPER}} .geobin-heading-title h2 small',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_border_style', [
				'label'	 => esc_html__( 'Border', 'geobin' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'geobin' ),
				'type'			 => Controls_Manager::SLIDER,
				'default'		 => [
					'size' => '',
				],
				'range'			 => [
					'px' => [
						'min'	 => 0,
						'step'	 => 5,
					],
				],
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .geobin-heading-title span'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color', [
				'label'		 => esc_html__( 'Color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .geobin-heading-title span.animate-border' => 'background: {{VALUE}};',
					'{{WRAPPER}} .features-text:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'animate_border_color', [
				'label'		 => esc_html__( 'Animated Border Color', 'geobin' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .animate-border:after' => 'border-right-color: {{VALUE}}; border-left-color: {{VALUE}};',
				],
			]
		);
	   $this->add_responsive_control(
			'border_width',
			[
				'label' =>esc_html__( 'Border Width', 'geobin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
			],
		
         'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .geobin-heading-title .animate-border' => 'width: {{SIZE}}{{UNIT}};',
			],
			]
		);
		$this->add_control(
			'border_height',
			[
				'label' =>esc_html__( 'Border Height', 'geobin' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .geobin-heading-title .animate-border' => 'height: {{SIZE}}{{UNIT}};',
			],
			]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$title = $settings[ 'title_text' ];
		$sub_title = $settings[ 'short_title' ];
		$geobin_border = $settings['geobin_border'];

		require GEOBIN_SHORTCODE_DIR_STYLE .'/heading/style1.php';

	}

	protected function _content_template() {

	}
}
