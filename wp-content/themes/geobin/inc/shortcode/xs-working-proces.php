<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Working_Proces_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-process';
    }

    public function get_title() {
        return esc_html__( 'Working Process', 'geobin' );
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
                'label' => esc_html__('Working Process', 'geobin'),
            ]
        );

        $this->add_control(
            'working_process_style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose a Style', 'geobin'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'geobin'),
                    'style2' => esc_html__('Style 2', 'geobin'),
                ],
            ]
        );

        $this->add_control(
            'working_process',
            [
                'label' => esc_html__('Working Process Section', 'geobin'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'title' => esc_html__('Add Title', 'geobin'),
                    ],
                ],
                'fields' => [

                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'geobin'),
                        'label_block'   => true,
                        'default' => esc_html__( 'Add Title' , 'geobin' ),
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name'          => 'working_process_number',
                        'label'         => esc_html__('Number', 'geobin'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name'          => 'working_process_section_image',
                        'label'         => esc_html__( 'Image or Icon?', 'geobin' ),
                        'type'          => Controls_Manager::SWITCHER,
                        'default'       => 'yes',
                        'label_on'      => esc_html__( 'Image', 'geobin' ),
                        'label_off'     => esc_html__( 'Icon', 'geobin' ),
                    ],

                    [
                        'name' => 'working_process_icon',
                        'label' => esc_html__('Icon', 'geobin'),
                        'type' => Controls_Manager::ICON,
                        'condition' =>  [
                            'working_process_section_image' => ''
                        ]
                    ],

                    [
                        'name' => 'working_process_image',
                        'label' => esc_html__('Image', 'geobin'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'condition' =>  [
                            'working_process_section_image' => 'yes'
                        ]
                    ],

                    [
                        'name' => 'bg_color',
                        'label' => esc_html__( 'Background Color', 'geobin' ),
                        'label_block'   => true,
                        'type'  => Controls_Manager::COLOR,
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        /*Working Process style 2*/


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
                'selector' => '{{WRAPPER}} .tw-work-process h3, {{WRAPPER}} .tw-case-working-box h3',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'title_color_section', [
                'label'	 => esc_html__( 'Title Color', 'geobin' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label'		 => esc_html__( 'Color', 'geobin' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .tw-case-working-box h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tw-work-process h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'border_color_section', [
                'label'	 => esc_html__( 'Border Style', 'geobin' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_color', [
                'label'		 => esc_html__( 'Border Color', 'geobin' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .working-icon-wrapper' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .working-icon-wrapper' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $working_process_style = $settings['working_process_style'];

        $working_process = $settings['working_process'];

        switch ($working_process_style){
            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/working-process/style1.php';
                break;

                case 'style2':
                    require GEOBIN_SHORTCODE_DIR_STYLE .'/working-process/style2.php';
                break;

        }

    }

    protected function _content_template() { }
}
?>