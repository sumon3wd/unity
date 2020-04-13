<?php

$options = array(
	'geobin_options' => array(
		'title'				 => esc_html__( 'Geobin Theme Options', 'geobin' ),
		'options'			 => array(
			'header_top_settings'	 => array(
				'title'		 => esc_html__( 'Header Settings', 'geobin' ),
				'options'	 => array(
					'geobin_header'				 => array(
						'type'			 => 'multi-picker',
						'label'			 => esc_html__( 'Geobin Header', 'geobin' ),
						'picker'		 => array(
							'menu_style' => array(
								'label'		 => esc_html__( 'Menu Style', 'geobin' ),
								'type'		 => 'image-picker',
								'value'		 => 'menu-1',
								'desc'		 => esc_html__( 'Select Menu style.', 'geobin' ),
								'choices'	 => array(
									'menu-1' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header1.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header1.png'
										),
									),
									'menu-2' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header2.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header2.png'
										),
									),
									'menu-3' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header3.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header3.png'
										),
									),
									'menu-4' => array(
										'small'	 => array(
											'width'	 => 260,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header4.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header4.png'
										),
									),
									'menu-5' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header5.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header5.png'
										),
									),
									'menu-6' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header6.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header6.png'
										),
									),
									'menu-7' => array(
										'small'	 => array(
											'width'	 => 260,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header7.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header7.png'
										),
									),
									'menu-8' => array(
										'small'	 => array(
											'width'	 => 260,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header8.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header8.png'
										),
									),
									'menu-9' => array(
										'small'	 => array(
											'width'	 => 260,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header9.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/header/header9.png'
										),
									),
								),
							),
						),
						'no-validate'	 => false,
					),
					'top_menu'					 => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => __( 'Show Top menu?', 'geobin' ),
						'desc'			 => __( 'If you would like to disable top menu set NO.', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => __( 'Yes', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'no',
							'label'	 => __( 'No', 'geobin' ),
						),
					),
					'header_top_contact_details' => array(
						'type'				 => 'addable-popup',
						'add-button-text'	 => esc_html__( 'Header Top Details', 'geobin' ),
						'label'				 => esc_html__( 'Header Top Contact Details', 'geobin' ),
						'desc'				 => esc_html__( 'Add contact information details items', 'geobin' ),
						'limit'				 => 3,
						'template'			 => '{{=title}}',
						'popup-options'		 => array(
							'title'	 => array(
								'label'	 => esc_html__( 'Title', 'geobin' ),
								'value'	 => esc_html__( 'Address', 'geobin' ),
								'desc'	 => esc_html__( 'Enter the contact information title', 'geobin' ),
								'type'	 => 'text',
							),
							'info'	 => array(
								'label'	 => esc_html__( 'Information', 'geobin' ),
								'value'	 => esc_html__( '1877 Perry Street Swartz Creekson, MI 48473', 'geobin' ),
								'desc'	 => esc_html__( 'Enter the main contact information', 'geobin' ),
								'type'	 => 'text',
							),
							'icon'	 => array(
								'type'	 => 'new-icon',
								'label'	 => 'Icon',
							),
						),
						'value'				 => array(
							0	 => array(
								'title'	 => 'Call us now',
								'icon'	 => 'icon icon-phone3',
								'info'	 => '1+(91) 458 654 528'
							),
							1	 => array(
								'title'	 => 'Drop us line',
								'icon'	 => 'icon icon-envelope',
								'info'	 => 'mail@example.com'
							),
							2	 => array(
								'title'	 => 'Visit Our Office',
								'icon'	 => 'icon icon-map-marker2',
								'info'	 => '1010 Avenue, NY, USA'
							),
						),
					),
					'header_top_social_details'	 => array(
						'type'				 => 'addable-popup',
						'add-button-text'	 => esc_html__( 'Add Social Icon', 'geobin' ),
						'label'				 => esc_html__( 'Social Details', 'geobin' ),
						'desc'				 => esc_html__( 'Add Social information in the header top right corner.', 'geobin' ),
						'template'			 => '{{=title}}',
						'popup-options'		 => array(
							'title'	 => array(
								'label'	 => esc_html__( 'Title', 'geobin' ),
								'value'	 => esc_html__( 'Facebook', 'geobin' ),
								'desc'	 => esc_html__( 'Enter the title', 'geobin' ),
								'type'	 => 'text',
							),
							'link'	 => array(
								'label'	 => esc_html__( 'Link', 'geobin' ),
								'value'	 => esc_html__( '#', 'geobin' ),
								'desc'	 => esc_html__( 'Add your social link', 'geobin' ),
								'type'	 => 'text',
							),
							'icon'	 => array(
								'type'	 => 'new-icon',
								'value'	 => esc_html__( 'icon icon-social-2', 'geobin' ),
								'label'	 => 'Icon',
							),
						),
						'value'				 => array(
							0	 => array(
								'title'	 => 'Twitter',
								'icon'	 => 'fa fa-twitter',
								'link'	 => '#'
							),
							1	 => array(
								'title'	 => 'Facebook',
								'icon'	 => 'fa fa-facebook',
								'link'	 => '#'
							),
							2	 => array(
								'title'	 => 'instagram',
								'icon'	 => 'fa fa-instagram',
								'link'	 => '#'
							),
							3	 => array(
								'title'	 => 'g+',
								'icon'	 => 'fa fa-google-plus',
								'link'	 => '#'
							),
							4	 => array(
								'title'	 => 'linkedin',
								'icon'	 => 'fa fa-linkedin',
								'link'	 => '#'
							),
						)
					),
					'geobin_main_logo'			 => array(
						'label'			 => esc_html__( 'Menu Logo', 'geobin' ),
						'type'			 => 'upload',
						'desc'			 => esc_html__( 'Upload the a logo with the dimention of 168 x 61', 'geobin' ),
						'images_only'	 => true,
						'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
					),
					'header_right_offcanvas'	 => array(
						'type'			 => 'multi-picker',
						'label'			 => false,
						'desc'			 => false,
						'picker'		 => array(
							'hr_offcanvas' => array(
								'label'			 => esc_html__( 'Offcanvas', 'geobin' ),
								'desc'			 => esc_html__( 'Do you want to show offcanvas?', 'geobin' ),
								'type'			 => 'switch',
								'right-choice'	 => array(
									'value'	 => 'yes',
									'label'	 => esc_html__( 'Yes', 'geobin' )
								),
								'left-choice'	 => array(
									'value'	 => 'no',
									'label'	 => esc_html__( 'No', 'geobin' )
								),
								'value'			 => 'no',
							)
						),
						'choices'		 => array(
							'yes'	 => array(
								'offcanvas_logo'				 => array(
									'label'			 => esc_html__( 'Offcanvas Logo', 'geobin' ),
									'type'			 => 'upload',
									'desc'			 => esc_html__( 'Upload the a logo with the dimention of 168 x 61', 'geobin' ),
									'images_only'	 => true,
									'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
								),
								'offcanvas_content'				 => array(
									'type'	 => 'textarea',
									'value'	 => '',
									'label'	 => esc_html__( 'Content', 'geobin' ),
									'desc'	 => esc_html__( 'Insert texts here', 'geobin' ),
								),
								'offcanvas_city_name'			 => array(
									'type'	 => 'text',
									'value'	 => 'New York, USA',
									'label'	 => esc_html__( 'City Name', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here your city name.', 'geobin' ),
								),
								'offcanvas_address'				 => array(
									'type'	 => 'text',
									'value'	 => '1010 Grand Avenue',
									'label'	 => esc_html__( 'Address', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here your address details.', 'geobin' ),
								),
								'offcanvas_contact_no'			 => array(
									'type'	 => 'text',
									'value'	 => '009-215-5596',
									'label'	 => esc_html__( 'Phone Number', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here your phone number.', 'geobin' ),
								),
								'offcanvas_contact_slogan'		 => array(
									'type'	 => 'text',
									'value'	 => 'Give us a call',
									'label'	 => esc_html__( 'Subtitle/Slogan', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here a subtitle.', 'geobin' ),
								),
								'offcanvas_contact_email'		 => array(
									'type'	 => 'text',
									'value'	 => 'mail@example.com',
									'label'	 => esc_html__( 'Email', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here your email address.', 'geobin' ),
								),
								'offcanvas_contact_email_slogan' => array(
									'type'	 => 'text',
									'value'	 => '24/7 online support',
									'label'	 => esc_html__( 'Subtitle/Slogan', 'geobin' ),
									'desc'	 => esc_html__( 'Insert here a subtitle.', 'geobin' ),
								),
								'offcanvas_social_share'		 => array(
									'type'			 => 'multi-picker',
									'label'			 => false,
									'desc'			 => false,
									'picker'		 => array(
										'social_shares_switcher' => array(
											'label'			 => esc_html__( 'Social Share for offcanvas menu', 'geobin' ),
											'desc'			 => esc_html__( 'Do you want to show social icons?', 'geobin' ),
											'type'			 => 'switch',
											'right-choice'	 => array(
												'value'	 => 'yes',
												'label'	 => esc_html__( 'Yes', 'geobin' )
											),
											'left-choice'	 => array(
												'value'	 => 'no',
												'label'	 => esc_html__( 'No', 'geobin' )
											),
											'value'			 => 'yes',
										)
									),
									'choices'		 => array(
										//'type'  => 'addable-option',
										'yes'	 => array(
											'social_url' => array(
												'label'			 => esc_html__( 'Social Details', 'geobin' ),
												'template'		 => '{{=title}}',
												'type'			 => 'addable-popup',
												'popup-options'	 => array(
													'title'	 => array(
														'label'	 => esc_html__( 'Title', 'geobin' ),
														'value'	 => esc_html__( 'Facebook', 'geobin' ),
														'desc'	 => esc_html__( 'Enter the title', 'geobin' ),
														'type'	 => 'text',
													),
													'link'	 => array(
														'label'	 => esc_html__( 'Link', 'geobin' ),
														'value'	 => esc_html__( '#', 'geobin' ),
														'desc'	 => esc_html__( 'Add your social link', 'geobin' ),
														'type'	 => 'text',
													),
													'icon'	 => array(
														'type'	 => 'new-icon',
														'value'	 => esc_html__( 'icon icon-social-2', 'geobin' ),
														'label'	 => 'Icon',
													),
												),
												'value'			 => array(
													0	 => array(
														'title'	 => 'Twitter',
														'icon'	 => 'fa fa-twitter',
														'link'	 => '#'
													),
													1	 => array(
														'title'	 => 'Facebook',
														'icon'	 => 'fa fa-facebook',
														'link'	 => '#'
													),
													2	 => array(
														'title'	 => 'instagram',
														'icon'	 => 'fa fa-instagram',
														'link'	 => '#'
													),
													3	 => array(
														'title'	 => 'g+',
														'icon'	 => 'fa fa-google-plus',
														'link'	 => '#'
													),
													4	 => array(
														'title'	 => 'linkedin',
														'icon'	 => 'fa fa-linkedin',
														'link'	 => '#'
													),
												),
												'sortable'		 => true,
											),
										),
										'no'	 => array(),
									),
									'show_borders'	 => false,
								),
								'offcanvas_subscribe_box'		 => array(
									'type'	 => 'textarea',
									'label'	 => esc_html__( 'Subscribe box', 'geobin' ),
								),
							),
							'no'	 => array(),
						),
						'show_borders'	 => false,
					),
				),
			),
			'menu_styles'			 => array(
				'title'		 => esc_html__( 'Menu Settings', 'geobin' ),
				'options'	 => array(
					'menu_bg_color'				 => array(
						'label'	 => esc_html__( 'Menu Background Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'menu_text_color'			 => array(
						'label'	 => esc_html__( 'Menu Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'menu_hover_color'			 => array(
						'label'	 => esc_html__( 'Menu Hover Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'menu_dropdown_bg_color'	 => array(
						'label'	 => esc_html__( 'Menu Dropdown Background Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'menu_dropdown_text_color'	 => array(
						'label'	 => esc_html__( 'Menu Dropdown Text Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'menu_dropdown_hover_color'	 => array(
						'label'	 => esc_html__( 'Menu Dropdown Text Hover Color', 'geobin' ),
						'type'	 => 'color-picker',
					),

					'search_bg_color'	 => array(
						'label'	 => esc_html__( 'Search box Background Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'search_border_color'	 => array(
						'label'	 => esc_html__( 'Search border Color', 'geobin' ),
						'type'	 => 'color-picker',
					),

					'box_shadow'					 => array(
						'type'			 => 'switch',
						'value'			 => 'no',
						'label'			 => __( 'Remove bottom menu box shadow?', 'geobin' ),
						'desc'			 => __( 'Would you like to remove menu bottom box shadow ?', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => __( 'Yes', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'no',
							'label'	 => __( 'No', 'geobin' ),
						),
					),
				),
			),
			'topbar_color_style'			 => array(
				'title'		 => esc_html__( 'Top Style Settings', 'geobin' ),
				'options'	 => array(
					'top_bg_color'				 => array(
						'label'	 => esc_html__( 'Top Background Color', 'geobin' ),
						'type'	 => 'color-picker',

					),
					'top_text_color'			 => array(
						'label'	 => esc_html__( 'Text Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
			
				),
			),
			/* Theme Styling Panel */
			'styling_panel'			 => array(
				'title'		 => esc_html__( 'Theme Styling', 'geobin' ),
				'options'	 => array(
					'geobin_body_bg_color'	 => array(
						'label'	 => esc_html__( 'Body BG Color ', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color in your theme', 'geobin' ),
					),
					'geobin_theme_color'	 => array(
						'label'	 => esc_html__( 'Theme Color', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color in your theme', 'geobin' ),
					),
					'theme_secondary_color'	 => array(
						'label'	 => esc_html__( 'Secondary Color', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color in your theme', 'geobin' ),
						'value'	 => '#FA6742',
					),
					'geobin_body_font'		 => array(
						'type'		 => 'typography-v2',
						'value'		 => array(
							'family'		 => 'Nunito',
							'size'			 => 16,
							'line-height'	 => 28,
						),
						'components' => array(
							'family'		 => true,
							// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
							'size'			 => true,
							'style'			 => false,
							'subset'		 => false,
							'variation'		 => false,
							'line-height'	 => true,
							'letter-spacing' => false,
							'color'			 => false
						),
						'label'		 => esc_html__( 'Body Font', 'geobin' ),
						'desc'		 => esc_html__( 'This is default body font for your site', 'geobin' ),
					),
					'geobin_heading_title'	 => array(
						'type'		 => 'typography-v2',
						'value'		 => array(
							'family'		 => 'Nunito',
							'variation'		 => '800',
							'line-height'	 => 15,
							'letter-spacing' => 0,
							'weight'		 => 400,

						),
						'components' => array(
							'family'		 => true,
							'style'			 => false,
							'weight'		 => true,
							'size'			 => false,
							'line-height'	 => false,
							'letter-spacing' => false,
							'color'			 => true
						),
						'label'		 => esc_html__( 'Heading Fonts', 'geobin' ),
						'desc'		 => esc_html__( 'This is for heading google fonts', 'geobin' ),
					),
					'primary_heading_font'	 => array(
						'label'	 => esc_html__( 'Heading Font Weight h1, h2', 'geobin' ),
						'type'	 => 'text',
					),
					'secondary_heading_font' => array(
						'label'	 => esc_html__( 'Heading Font Weight h3, h4, h5, h6', 'geobin' ),
						'type'	 => 'text',
					),
				),
			),
			/* Footer Bottom Section */
			'page_settings'			 => array(
				'title'		 => esc_html__( 'Page Settings', 'geobin' ),
				'options'	 => array(
					'global_page_breadcrumb' => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Page Breadcrumb', 'geobin' ),
						'desc'			 => esc_html__( 'Do you want to show Breadcrumb in all pages ?', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'geobin' ),
						),
					),
					'geobin_banner_title_color'	 => array(
						'label'	 => esc_html__( 'Banner Title Color ', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color banner title  in your theme', 'geobin' ),
					),
				),
			),
			
			/* Blog Settings */
			'news_setting_panel'	 => array(
				'title'		 => esc_html__( 'Blog Settings', 'geobin' ),
				'options'	 => array(
					'news_settings'			 => array(
						'label'		 => esc_html__( 'Blog Settings', 'geobin' ),
						'type'		 => 'select',
						'desc'		 => esc_html__( 'Choose your blog style', 'geobin' ),
						'choices'	 => array(
							'rightsidebar'	 => esc_html__( 'Right Sidebar', 'geobin' ),
							'fullwidth'		 => esc_html__( 'Full Width', 'geobin' ),
							'leftsidebar'	 => esc_html__( 'Left Sidebar', 'geobin' ),
						),
					),
					'global_blog_title'		 => array(
						'label'	 => esc_html__( 'Global Blog Title', 'geobin' ),
						'type'	 => 'text',
					),
					'global_header_image'	 => array(
						'label'	 => esc_html__( 'Global Header Background Image', 'geobin' ),
						'type'	 => 'upload',
					),
					'global_blog_breadcrumb' => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Breadcrumb', 'geobin' ),
						'desc'			 => esc_html__( 'Do you want to show Breadcrumb?', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'geobin' ),
						),
					),
					'blog_author_settings'	 => array(
						'type'			 => 'switch',
						'label'			 => esc_html__( 'Blog Author', 'geobin' ),
						'desc'			 => esc_html__( 'Do you want to show blog author?', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'geobin' ),
						),
					),
				),
			),
			/* Footer Bottom Section */
			'footer_panel'			 => array(
				'title'		 => esc_html__( 'Footer Settings', 'geobin' ),
				'options'	 => array(
					'geobin_footer'				 => array(
						'type'			 => 'multi-picker',
						'label'			 => esc_html__( 'Geobin Footer', 'geobin' ),
						'picker'		 => array(
							'footer_style' => array(
								'label'		 => esc_html__( 'Footer Style', 'geobin' ),
								'type'		 => 'image-picker',
								'value'		 => 'footer-1',
								'desc'		 => esc_html__( 'Select Footer style.', 'geobin' ),
								'choices'	 => array(
									'footer-1' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/footer/footer1.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/footer/footer1.png'
										),
									),
									'footer-2' => array(
										'small'	 => array(
											'height' => 30,
											'src'	 => GEOBIN_IMAGES . '/image-picker/footer/footer2.png'
										),
										'large'	 => array(
											'width'	 => 370,
											'src'	 => GEOBIN_IMAGES . '/image-picker/footer/footer2.png'
										),
									),
									
								),
							),
						),
						'no-validate'	 => false,
					),

					'show_footer_widget'		 => array(
						'type'			 => 'switch',
						'value'			 => 'yes',
						'label'			 => esc_html__( 'Show Footer Widget', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'geobin' ),
						),
					),
					'footer_bg_color'			 => array(
						'label'	 => esc_html__( 'Footer Background Color', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'geobin' ),
					),
					'footer_top_bg_color'		 => array(
						'label'	 => esc_html__( 'Footer Top Background Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'widget_title_color'		 => array(
						'label'	 => esc_html__( 'Widget Title Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'widget_text_color'			 => array(
						'label'	 => esc_html__( 'Widget Text Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'widget_link_color'			 => array(
						'label'	 => esc_html__( 'Widget URL Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'widget_link_hover_color'	 => array(
						'label'	 => esc_html__( 'Widget URL Hover Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'copyright_info'			 => array(
						'label'	 => esc_html__( 'Copyright Info', 'geobin' ),
						'type'	 => 'textarea',
						'value'	 => 'Copyright 2018, All Right Reserved Geobin',
						'desc'	 => false,
					),
					'copyright_bg_color'		 => array(
						'label'	 => esc_html__( 'Copyright background Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'copyright_text_color'		 => array(
						'label'	 => esc_html__( 'Copyright Text Color', 'geobin' ),
						'type'	 => 'color-picker',
					),
					'footer_border_color'		 => array(
						'label'	 => esc_html__( 'border Color', 'geobin' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__('footer border color for footer style 2', 'geobin'),

					),
					'footer_award_info'			 => array(
						'label'	 => esc_html__( 'Award Texts', 'geobin' ),
						'type'	 => 'text',
						'desc'	 => false,
						'value'	 => '',
					),
					'footer_award_logo'			 => array(
						'label'	 => esc_html__( 'Award Logo', 'geobin' ),
						'type'	 => 'upload',
						'desc'	 => false,
					),
					'back_to_top'				 => array(
						'type'			 => 'switch',
						'value'			 => 'hello',
						'label'			 => esc_html__( 'Back to top icon', 'geobin' ),
						'desc'			 => esc_html__( 'Do you want to show back to top icon?', 'geobin' ),
						'left-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => esc_html__( 'Yes', 'geobin' ),
						),
						'right-choice'	 => array(
							'value'	 => 'no',
							'label'	 => esc_html__( 'No', 'geobin' ),
						),
					),
				),
			),
			
		),
		'wp-customizer-args' => array(
			'priority' => 3,
		),
	),
);
