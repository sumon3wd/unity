<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Faq_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-faq';
    }

    public function get_title() {
        return esc_html__( 'Geobin Faq', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Accordion', 'geobin'),
            ]
        );

        $this->add_control(
			'xs_faq',
			[
				'label' => esc_html__( 'Accordion Items', 'geobin' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => esc_html__( 'Accordion #1', 'geobin' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'geobin' ),
					],
					[
						'tab_title' => esc_html__( 'Accordion #2', 'geobin' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'geobin' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => esc_html__( 'Title', 'geobin' ),
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__( 'Accordion Title' , 'geobin' ),
						'label_block' => true,
					],
					[
						'name' => 'tab_content',
						'label' => esc_html__( 'Content', 'geobin' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Accordion Content', 'geobin' ),
						'label_block' => true,
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Accordion', 'geobin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'geobin' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel.active:before' => 'border-width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel.active:before' => 'border-color: {{VALUE}} !important;'
				],
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion.geobin-version-2 .panel-heading a:before' => 'background-color: {{VALUE}} !important;',
				],
				'condition' =>  [
                	'style' => ['style2']
            	],
			]
		);

		$this->add_control(
			'icon_active_background_color',
			[
				'label' => esc_html__( 'Icon Active Background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion.geobin-version-2 .panel-heading a[aria-expanded="true"]:before' => 'background-color: {{VALUE}} !important;',
				],
				'condition' =>  [
                	'style' => ['style2']
            	],
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__( 'Title', 'geobin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_background',
			[
				'label' => esc_html__( 'Background', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-heading a' => 'background-color: {{VALUE}} !important;',
				],
			]
		);
		$this->add_control(
			'title_active_background',
			[
				'label' => esc_html__( 'Active Background Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-heading a[aria-expanded="true"]' => 'background-color: {{VALUE}} !important;;',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-heading a' => 'color: {{VALUE}} !important;;',
					'{{WRAPPER}} .geobin-accordion .panel-heading a:before' => 'color: {{VALUE}} !important;;',
				],
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label' => esc_html__( 'Active Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-heading a[aria-expanded="true"]' => 'color: {{VALUE}} !important;;',
					'{{WRAPPER}} .geobin-accordion .panel-heading a[aria-expanded="true"]:before' => 'color: {{VALUE}} !important;;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .geobin-accordion .panel-heading a',
			]
		);

		$this->add_control(
			'heading_content',
			[
				'label' => esc_html__( 'Content', 'geobin' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_background_color',
			[
				'label' => esc_html__( 'Background', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-body' => 'background-color: {{VALUE}} !important;',
				],
				'condition' =>  [
                    	'style' => ['style1']
                ],
			]
		);


		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'geobin' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .geobin-accordion .panel-body' => 'color: {{VALUE}} !important;;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .geobin-accordion .panel-body',
			]
		);

		$this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $xs_faq = $settings['xs_faq'];


        ?>

<div id="accordion" role="tablist">

    <?php if(is_array($xs_faq) && !empty($xs_faq)): ?>
        <?php $xs_count = 1; ?>
        <?php
        foreach($xs_faq as $key => $faq):
            $tabs_id = uniqid('xs-faq-').mt_rand(1000,9999);
            ?>

            <div class="card ">
                <div class="card-header" role="tab" data-toggle="collapse" data-parent="#accordion" href="#<?php echo esc_attr($tabs_id);?>" aria-expanded="true"
                     aria-controls="collapseOne">
                    <h4>
                        <a >
                            <?php echo esc_html( $faq['tab_title'] ); ?>
                            <i class="faq-indicator fa <?php echo esc_attr( ($xs_count == 1) ? 'fa-minus' : 'fa-plus'); ?>"></i>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo esc_attr($tabs_id);?>" class="panel-collapse collapse <?php echo esc_attr( ($xs_count == 1) ? 'show' : ''); ?>" role="tabpanel">
                    <div class="card-block">
                        <?php echo wp_kses_post( $faq['tab_content'] ); ?>
                    </div>
                </div>
            </div>
            <!-- panel-group -->
            <?php $xs_count++; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
<?php
        }

    protected function _content_template() { }
}
?>