<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-slider';
    }

    public function get_title() {
        return esc_html__( 'Geobin Slider', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Slider', 'geobin'),
            ]
        );

        $this->add_control(
            'sliders',
            [
                'label' => esc_html__('Slider', 'geobin'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'title' => esc_html__('Add Title', 'geobin'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'geobin'),
                        'btn_label_one' => esc_html__('Learn More', 'geobin'),
                    ],

                    [
                        'title' => esc_html__('Add Title', 'geobin'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'geobin'),
                        'btn_label_one' => esc_html__('Learn More', 'geobin'),
                    ],

                    [
                        'title' => esc_html__('Add Title', 'geobin'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'geobin'),
                        'btn_label_one' => esc_html__('Learn More', 'geobin'),
                    ],
                ],
                'fields' => [

                        [

                        'name'          => 'slider_bg_img_color',
                        'label'         => esc_html__( 'Background Image or Color?', 'geobin' ),
                        'type'          => Controls_Manager::SWITCHER,
                        'default'       => 'yes',
                        'label_on'      => esc_html__( 'Color', 'geobin' ),
                        'label_off'     => esc_html__( 'Image', 'geobin' ),
                    ],

                    [
                        'name' => 'slider_bg_color',
                        'label' => esc_html__('Background Color', 'geobin'),
                        'type' => Controls_Manager::COLOR,
                        'condition' =>  [
                            'slider_bg_img_color' => 'yes'
                        ]
                    ],

                    [
                        'name' => 'slider_image',
                        'label' => esc_html__('Background Image', 'geobin'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' =>  [
                            'slider_bg_img_color' => ''
                        ]
                    ],

                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'geobin'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name'  =>  'alignment',
                        'label'     => esc_html__( 'Image Alignment', 'geobin' ),
                        'type'      => Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'      => [
                                'title' => esc_html__( 'Left', 'geobin' ),
                                'icon'  => 'fa fa-align-left',
                            ],
                            'right'     => [
                                'title' => esc_html__( 'Right', 'geobin' ),
                                'icon'  => 'fa fa-align-right',
                            ],
                        ],
                    ],

                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'geobin'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name'   => 'slider_title_margin',
                        'label' => esc_html__( 'Title Margin Top', 'geobin' ),
                        'type' => Controls_Manager::NUMBER,
                    ],

                    [
                        'name' => 'title_color',
                        'label' => esc_html__( 'Title Color', 'geobin' ),
                        'type'  => Controls_Manager::COLOR,
                    ],

                    [
                        'name' => 'main_keyword_color',
                        'label' => esc_html__( 'Main Keyword Color', 'geobin' ),
                        'type'  => Controls_Manager::COLOR,
                    ],

                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'geobin'),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'description_color',
                        'label' => esc_html__( 'Description Color', 'geobin' ),
                        'type'  => Controls_Manager::COLOR,
                    ],

                    [
                        'name' => 'btn_label_one',
                        'label' => esc_html__('Button Label', 'geobin'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => esc_html__('LEARN MORE', 'geobin'),
                    ],

                    [
                        'name'  =>  'btn_link_one',
                        'label' => esc_html__( 'Link', 'geobin' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => esc_html__('http://your-link.com','geobin' ),
                        'default' => [
                            'url' => '',
                        ],
                    ],

                    [
                        'name' => 'btn_color',
                        'label' => esc_html__('Button Color', 'geobin'),
                        'type' => Controls_Manager::COLOR,
                    ],

                    [
                        'name' => 'btn_hover_color',
                        'label' => esc_html__('Button Hover Color', 'geobin'),
                        'type' => Controls_Manager::COLOR,
                    ],

                    [
                        'name' => 'btn_bg_color',
                        'label' => esc_html__('Button Background Color', 'geobin'),
                        'type' => Controls_Manager::COLOR,
                    ],
                    [
                        'name' => 'btn_bg_hover_color',
                        'label' => esc_html__('Button Background Hover Color', 'geobin'),
                        'type' => Controls_Manager::COLOR,
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
		$this->add_control(
		'slider_speed', [
			'label'		 => esc_html__( 'Slider speed', 'geobin' ),
			'type'		 => Controls_Manager::TEXT,
			'default'	 => 1100,
		]
		);

        $this->end_controls_section();

        //Title Style

        $this->start_controls_section(
            'section_title_style',
            [
                'label'     => esc_html__( 'Title', 'geobin' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'geobin' ),
                'selector' => '{{WRAPPER}} .slider-content h1',
            ]
        );

        $this->add_control(
            'margin_bottom',
            [
                'label' => esc_html__( 'Margin Bottom', 'geobin' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slider-content h1' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );
        $this->end_controls_section();

        //Decription Style
        $this->start_controls_section(
            'section_desc_style',
            [
                'label'     => esc_html__( 'Description', 'geobin' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'geobin' ),
                'selector' => '{{WRAPPER}} .slider-content p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $sliders = $settings['sliders'];
        $slider_setting = array(
            'slider_speed' => $settings['slider_speed'],
        );
        $slider_settings = json_encode( $slider_setting );
        require GEOBIN_SHORTCODE_DIR_STYLE . '/slider/style1.php';
    }

    protected function _content_template() { }
}
?>