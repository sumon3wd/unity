<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-testimonial';
    }

    public function get_title() {
        return esc_html__( 'Geobin Testimonial', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('Geobin Testimonial', 'geobin'),
            ]
        );

        /**
         *
         * Testimonial Style selection
         *
         */
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
            'testimonial',
            [
                'label' => esc_html__('Testimonial', 'geobin'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'client_name' => esc_html__('Testimonial #1', 'geobin'),
                        'review' => esc_html__('Start working with an company that can do provide every thing at you need to generate awareness, drive traffic, connect with', 'geobin'),
                        'designation' => 'CEO, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #1', 'geobin'),
                        'review' => esc_html__('Start working with an company that can do provide every thing at you need to generate awareness, drive traffic, connect with', 'geobin'),
                        'designation' => 'CEO, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],

                    [
                        'client_name' => esc_html__('Testimonial #1', 'geobin'),
                        'review' => esc_html__('Start working with an company that can do provide every thing at you need to generate awareness, drive traffic, connect with', 'geobin'),
                        'designation' => 'CEO, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'client_name',
                        'label' => esc_html__('Client Name', 'geobin'),
                        'default'  => esc_html__( 'Add client name here', 'geobin'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'review',
                        'label' => esc_html__('Testimonial', 'geobin'),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'designation',
                        'label' => esc_html__('Designation', 'geobin'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
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
                    
                ],
                
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();
        /**
         *
         * Client Name
         *
         */
        

        $this->start_controls_section(
            'section_name_style',
            [
                'label' => esc_html__('Name', 'geobin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-meta h4 ' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .geobin-best-reviewr-content h3 ' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .geobin-single-testimonial h2 ' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} .tw-testimonial-box .testimonial-text i ' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'names_typography',
                'label' => esc_html__( 'Typography', 'geobin' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,

                'selector' => '{{WRAPPER}} .testimonial-meta h4',

            ]
        );

        $this->end_controls_section();

        /**
         *
         * Testimonial
         *
         */
        

        $this->start_controls_section(
            'section_testimonial_style',
            [
                'label' => esc_html__('Testimonial', 'geobin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'tetimonial_color',
            [
                'label' => esc_html__( 'Color', 'geobin' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .geobin-best-reviewr-content p' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .geobin-single-testimonial p ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-text p' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'label' => esc_html__( 'Typography', 'geobin' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,

                'selector' => '{{WRAPPER}} .testimonial-text p',

            ]
        );

        $this->end_controls_section();

        /**
         *
         * Rating
         *
         */
        

        $this->start_controls_section(
            'section_rating_style',
            [
                'label' => esc_html__('Rating', 'geobin'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();


        $testimonials = $settings['testimonial'];

        $styles = $settings['style'];

        switch ($styles){
            case 'style1':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/testimonial/style1.php';
                break;
            case 'style2':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/testimonial/style2.php';
                break;
            case 'style3':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/testimonial/style3.php';
                break;
            case 'style4':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/testimonial/style4.php';
                break;
            case 'style5':
                require GEOBIN_SHORTCODE_DIR_STYLE .'/testimonial/style5.php';
                break;
        }

    }

    protected function _content_template() { }
}