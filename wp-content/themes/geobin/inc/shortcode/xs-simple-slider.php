<?php 
namespace Elementor;

if( !defined('ABSPATH') ) exit;

class Xs_Simple_Slider extends Widget_Base{

	// Widget name / ID
	public function get_name(){
		return 'simple-slider';
	}

	// Widget Title
	public function get_title(){
		return esc_html__('Geobin Simple Slider', 'geobin');
	}

	//Widget Icon
	public function get_icon(){
		return 'eicon-slider-push';
	}

	//Widget Category
	public function get_categories(){
		return [ 'geobin-elements' ];
	}


	/*Register Widget Controls*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_tab', ['label' => esc_html__('Simple Slider', 'geobin')]
		);

		$this->add_control(
			'simple_slide', [
				'label'		=> esc_html__('Slide', 'geobin'),
				'type'		=> Controls_Manager::REPEATER,
				'default'	=> [
					[
						'title'			=> esc_html__('Add a title here', 'geobin'),
						'description'	=> esc_html__('Start working with an company that can provide everything you need to generate awareness, drive traffic, connect with customers, and increase sales nascetur ridiculus mus. massa quis enim. Donec pede justo.', 'geobin'),
					],
                    [
                        'title'			=> esc_html__('Add a title here', 'geobin'),
                        'description'	=> esc_html__('Start working with an company that can provide everything you need to generate awareness, drive traffic, connect with customers, and increase sales nascetur ridiculus mus. massa quis enim. Donec pede justo.', 'geobin'),
                    ],
                    [
                        'title'			=> esc_html__('Add a title here', 'geobin'),
                        'description'	=> esc_html__('Start working with an company that can provide everything you need to generate awareness, drive traffic, connect with customers, and increase sales nascetur ridiculus mus. massa quis enim. Donec pede justo.', 'geobin'),
                    ]
				],
				'fields'	=> [
					[
						'name'		=> 'simple_slide_image',
						'label'		=> esc_html__('Simple Slide Image', 'geobin'),
						'type'		=> Controls_Manager::MEDIA,
						'default'	=> ['url' => Utils::get_placeholder_image_src()],
					],

					[
						'name'			=> 'title',
						'label'			=> esc_html__('Title', 'geobin'),
						'label_block'	=> true,
						'type'			=> Controls_Manager::TEXT,
					],

					[
						'name'			=> 'description',
						'label'			=> esc_html__('Description', 'geobin'),
						'type'			=> Controls_Manager::TEXTAREA,
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tab_styles', [
				'label'		=> esc_html__('Title', 'geobin'),
				'tab'		=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'title_color', [
                'label'			=> esc_html__('Title Color', 'geobin'),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .mission-title h2.column-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color', [
                'label'			=> esc_html__('Description Color', 'geobin'),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .mission-body p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_bg_color', [
                'label'			=> esc_html__('Border Background Color', 'geobin'),
                'type'		 => Controls_Manager::COLOR,
                'default'       => '#FFFFFF',
                'selectors'	 => [
                    '{{WRAPPER}} .mission-title .bg-color' => 'background: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'border_color', [
                'label'			=> esc_html__('Border Color', 'geobin'),
                'type'		 => Controls_Manager::COLOR,
                'default'       => '#FFFFFF',
                'selectors'	 => [
                    '{{WRAPPER}} .mission-title .border-color:after' => 'background: {{VALUE}} !important;',
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


		$this->end_controls_section();

	}



	// Render widget output on the frontend.
	protected function render(){
		$settings = $this->get_settings();

		$simple_slide = $settings['simple_slide'];
        //fw_print($simple_slide);
		?>

        <div class="col-md-12 tw-mission">
            <div class="mission-carousel owl-carousel">

        <?php
            if(is_array($simple_slide) && !empty($simple_slide)):

            foreach($simple_slide as $single_slide):
                $slide_img = (! empty( $single_slide['simple_slide_image']['url'])) ? $single_slide['simple_slide_image']['url'] : '';

                $slide_title = ( !empty($single_slide['title'])) ? $single_slide['title'] : '';
                $slide_desc = ( !empty($single_slide['description']) ) ? $single_slide['description'] : '';
                $alt = get_post_meta($single_slide['simple_slide_image']['id'], '_wp_attachment_image_alt', true);
            ?>
                <div class="row">
                    <div class="col-md-6 mr-auto align-self-md-center">
                        <img src="<?php echo esc_url($slide_img); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
                    </div>
                    <!-- Col End -->
                    <div class="col-md-6">
                        <div class="mission-body">
                            <div class="mission-title tw-mb-40">
                                <h2 class="column-title"><?php echo esc_html($slide_title); ?></h2>
                                <span class="animate-border bg-color border-color tw-mt-30"></span>
                            </div>
                            <p><?php echo esc_html($slide_desc); ?></p>
                        </div>
                    </div>
                    <!-- Col End -->
                </div>
            <?php endforeach; endif; ?>
                <!-- Content Row End -->

            </div>
            <!-- Mission Carousel End -->
        </div>

    <?php
	}

	protected function _content_template(){
		
	}

}