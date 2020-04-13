<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Button_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-button';
    }

    public function get_title() {
        return esc_html__( 'Geobin Button', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Button', 'geobin'),
            ]
        );

        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Primary Button', 'geobin' ),
				'label_block'   => true,
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn more ', 'geobin' ),
				'placeholder' => esc_html__( 'Learn more ', 'geobin' ),
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
			]
		);

        $this->add_control(
            'btn_text_two',
            [
                'label' => esc_html__( 'Secondary Button', 'geobin' ),
                'label_block'   => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Learn more ', 'geobin' ),
                'placeholder' => esc_html__( 'Learn more ', 'geobin' ),
            ]
        );

        $this->add_control(
            'btn_link_two',
            [
                'label' => esc_html__( 'Button Link Two', 'geobin' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('http://your-link.com','geobin' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

		$this->add_responsive_control(
			'btn_align',
			[
				'label' => esc_html__( 'Alignment', 'geobin' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'geobin' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'geobin' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'geobin' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Button Style', 'geobin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'default' => [
					'top' => 50,
					'right' => 50,
					'bottom' => 50 ,
					'left' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child' =>  'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__( 'Padding', 'geobin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Margin', 'geobin' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default' => [
                    'top' => 36,
                    'right' => 20,
                    'bottom' => 0 ,
                    'left' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn:first-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .xs-btn-group a.btn:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => esc_html__( 'Typography', 'geobin' ),
				'selector' => '{{WRAPPER}} .xs-btn-group a.btn:first-child',
			]
		);

		$this->start_controls_tabs( 'xs_tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'geobin' ),
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();


		$this->start_controls_tab(
			'btn_tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'geobin' ),
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .xs-btn-group a.btn:first-child:before' => 'border-bottom: 100px solid {{VALUE}};',
					'{{WRAPPER}} .xs-btn-group a.btn:first-child:after' => 'border-top: 100px solid {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();


        $this->start_controls_section(
            'button_style_two',
            [
                'label' => esc_html__( 'Button Style Two', 'geobin' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_two_text_color',
            [
                'label' => esc_html__( 'Text Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_two_hover_color',
            [
                'label' => esc_html__( 'Text Hover Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_two_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_two_hover_bg_color',
            [
                'label' => esc_html__( 'Background Hover Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_two_border_color',
            [
                'label' => esc_html__( 'Border Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_two_hover_border_color',
            [
                'label' => esc_html__( 'Border Hover Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xs-btn-group a.btn-secondary:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render( ) {
        $settings = $this->get_settings();

        $btn_text = $settings['btn_text'];

		$btn_link = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';

        $btn_text_two = (!empty($settings['btn_text_two'])) ? $settings['btn_text_two'] : '';
        $btn_link_two = (!empty($settings['btn_link_two']['url'])) ? $settings['btn_link_two']['url'] : '';
		
		$btn_target = ( $settings['btn_link']['is_external']) ? '_blank' : '_self';

        ?>
        <div class="xs-btn-group">
        <?php if( !empty($btn_text)) : ?>
            <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" class="btn btn-primary">
                <?php echo esc_html( $btn_text ); ?>
            </a>
            <?php
            endif;
            if( !empty($btn_text_two)) : ?>
            <a href="<?php echo esc_url( $btn_link_two ); ?>" target="<?php echo esc_html( $btn_target ); ?>" class="btn btn-secondary">
                <?php echo esc_html( $btn_text_two ); ?>
            </a>
            <?php endif; ?>
        </div>
        <?php
    }

    protected function _content_template() { }
}