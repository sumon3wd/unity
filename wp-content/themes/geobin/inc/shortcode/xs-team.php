<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class Xs_Team_Widget extends Widget_Base {

	public function get_name() {
		return 'xs-team';
	}

	public function get_title() {
		return esc_html__( 'Geobin Team', 'geobin' );
	}

	public function get_icon() {
		return 'fa fa-user-o';
	}

	public function get_categories() {
		return [ 'geobin-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
		'section_tab', [
			'label' => esc_html__( 'Geobin Team', 'geobin' ),
		]
		);

		$this->add_control(
		'style', [
			'type'		 => Controls_Manager::SELECT,
			'label'		 => esc_html__( 'Choose Style', 'geobin' ),
			'default'	 => 'style1',
			'options'	 => [
				'style1' => esc_html__( 'Style 1', 'geobin' ),
				'style2' => esc_html__( 'Style 2', 'geobin' ),
			],
		]
		);

		$this->add_control(
		'member_name', [
			'label'			 => esc_html__( 'Team Member', 'geobin' ),
			'type'			 => Controls_Manager::TEXT,
			'label_block'	 => true,
			'default'		 => esc_html__( 'Team Member', 'geobin' ),
		]
		);

		$this->add_control(
		'member_position', [
			'label'			 => esc_html__( 'Position', 'geobin' ),
			'type'			 => Controls_Manager::TEXT,
			'label_block'	 => true,
			'default'		 => esc_html__( 'CEO', 'geobin' ),
		]
		);



		$this->add_control(
		'image', [
			'label'		 => esc_html__( 'Thumbnail Image', 'geobin' ),
			'type'		 => Controls_Manager::MEDIA,
			'default'	 => [
				'url' => Utils::get_placeholder_image_src(),
			],
		]
		);

		$this->add_group_control(
		Group_Control_Image_Size::get_type(), [
			'name'		 => 'image',
			'label'		 => esc_html__( 'Image Size', 'geobin' ),
			'default'	 => 'full',
		]
		);

		$this->add_control(
		'member_show_social', [
			'label'		 => esc_html__( 'Show Social', 'geobin' ),
			'type'		 => Controls_Manager::SWITCHER,
			'default'	 => 'yes',
			'label_on'	 => esc_html__( 'Yes', 'geobin' ),
			'label_off'	 => esc_html__( 'No', 'geobin' ),
		]
		);

		$this->add_control(
		'facebook_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Facebook URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Facebook URL.', 'geobin' ),
			'default'		 => '#',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);

		$this->add_control(
		'twitter_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Twitter URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Twitter URL.', 'geobin' ),
			'default'		 => '#',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);

		$this->add_control(
		'instagram_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Instagram URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Instagram URL.', 'geobin' ),
			'default'		 => '#',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);

		$this->add_control(
		'linkedin_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Linkedin URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Linkedin URL.', 'geobin' ),
			'default'		 => '#',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'vk_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Vk URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Vk URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'youtube_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Youtube URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s youtube URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'pinterest_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Pinterest URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Pinterest URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'tumblr_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Tumblr URL', 'geobin' ),
			'description'	 => esc_html__( 'Team member\'s Tumblr URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'behance_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'behance URL', 'geobin' ),
			'description'	 => esc_html__( 'Behance member\'s Tumblr URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'dribble_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Dribble URL', 'geobin' ),
			'description'	 => esc_html__( 'Dribble member\'s Tumblr URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'googleplus_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Google Plus URL', 'geobin' ),
			'description'	 => esc_html__( 'Dribble member\'s Google Plus URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'xing_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Xing URL', 'geobin' ),
			'description'	 => esc_html__( 'Dribble member\'s Xing URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'yelp_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Yelp URL', 'geobin' ),
			'description'	 => esc_html__( 'Dribble member\'s Yelp URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);
		$this->add_control(
		'vine_url', [
			'type'			 => Controls_Manager::TEXT,
			'label'			 => esc_html__( 'Vine URL', 'geobin' ),
			'description'	 => esc_html__( 'Dribble member\'s Vine URL.', 'geobin' ),
			'default'		 => '',
			'condition'		 => [
				'member_show_social' => 'yes',
			],
		]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		'section_title_style', [
			'label'	 => esc_html__( 'Team Style', 'geobin' ),
			'tab'	 => Controls_Manager::TAB_STYLE,
		]
		);

		/**
		 *
		 * Normal Style
		 *
		 */
		$this->add_control(
		'member_name_color', [
			'label'		 => esc_html__( 'Name color', 'geobin' ),
			'type'		 => Controls_Manager::COLOR,
			'selectors'	 => [
				'{{WRAPPER}} .geobin-team-details p' => 'color: {{VALUE}};',
			],
		]
		);

		$this->add_control(
		'member_pos_color', [
			'label'		 => esc_html__( 'Possition color', 'geobin' ),
			'type'		 => Controls_Manager::COLOR,
			'selectors'	 => [
				'{{WRAPPER}} .geobin-team-details h5' => 'color: {{VALUE}} !important;',
			],
		]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings();

		$member_name = $settings[ 'member_name' ];

		$member_position = $settings[ 'member_position' ];

		$member_show_social = $settings[ 'member_show_social' ];

		$fb				 = $settings[ 'facebook_url' ];
		$tw				 = $settings[ 'twitter_url' ];
		$instagram		 = $settings[ 'instagram_url' ];
		$linkedin		 = $settings[ 'linkedin_url' ];
		$vk_url			 = $settings[ 'vk_url' ];
		$youtube_url	 = $settings[ 'youtube_url' ];
		$pinterest_url	 = $settings[ 'pinterest_url' ];
		$tumblr_url		 = $settings[ 'tumblr_url' ];
		$behance_url	 = $settings[ 'behance_url' ];
		$dribble_url	 = $settings[ 'dribble_url' ];
		$googleplus_url	 = $settings[ 'googleplus_url' ];
		$xing_url		 = $settings[ 'xing_url' ];
		$yelp_url		 = $settings[ 'yelp_url' ];
		$vine_url		 = $settings[ 'vine_url' ];

		$style = $settings[ 'style' ];
		?>
		<div class="tw-team-box">
			<div class="team-img <?php if ( $style == 'style2' ) echo 'expert-team'; ?>">
		<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
			</div>
			<div class="team-info">
		<?php if ( !empty( $member_name ) ) : ?>
					<h3 class="team-name"><?php echo esc_html( $member_name ); ?></h3>
		<?php endif; ?>
		<?php if ( !empty( $member_position ) ) : ?>
					<p class="team-designation"><?php echo esc_html( $member_position ); ?></p>
		<?php endif; ?>

		<?php if ( $member_show_social ): ?>
					<div class="team-social-links">
			<?php if ( !empty( $fb ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $fb ); ?>"><i class="fa fa-facebook"></i></a>
			<?php endif; ?>
			<?php if ( !empty( $tw ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $tw ); ?>"><i class="fa fa-twitter"></i></a>
			<?php endif; ?>
			<?php if ( !empty( $instagram ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram"></i></a>
			<?php endif; ?>
			<?php if ( !empty( $linkedin ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a>
			<?php endif; ?>

			<?php if ( !empty( $youtube_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $youtube_url ); ?>"><i class="fa fa-youtube"></i></a>
			<?php endif; ?>

			<?php if ( !empty( $vk_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $vk_url ); ?>"><i class="fa fa-vk"></i></a>
			<?php endif; ?>
			<?php if ( !empty( $pinterest_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $pinterest_url ); ?>"><i class="fa fa-pinterest"></i></a>
					<?php endif; ?>
			<?php if ( !empty( $tumblr_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $tumblr_url ); ?>"><i class="fa fa-tumblr"></i></a>
					<?php endif; ?>
					<?php if ( !empty( $behance_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $behance_url ); ?>"><i class="fa fa-behance"></i></a>
					<?php endif; ?>
					<?php if ( !empty( $dribble_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $dribble_url ); ?>"><i class="fa fa-dribbble"></i></a>
					<?php endif; ?>
					<?php if ( !empty( $googleplus_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $googleplus_url ); ?>"><i class="fa fa-google-plus"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $xing_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $xing_url ); ?>"><i class="fa fa-xing"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $yelp_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $yelp_url ); ?>"><i class="fa fa-linkedin"></i></a>
						<?php endif; ?>
						<?php if ( !empty( $vine_url ) ): ?>
							<a target="_blank" href="<?php echo esc_url( $vine_url ); ?>"><i class="fa fa-vine"></i></a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
			</div>

			<!-- Team Info end -->
		</div>
		<!-- Team Box End -->
					<?php
				}

				protected function _content_template() {
					
				}

			}
			