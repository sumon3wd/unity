<?php if ( !defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
	'normal' => array(
		'title'		 => esc_html__( 'Case Study Settings', 'geobin' ),
		'type'		 => 'box',
		'priority'	 => 'default',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'geobin' ),
				'desc'	 => esc_html__( 'Add your Service hero title', 'geobin' ),
			),
			'header_title_color'	 => array(
				'type'	 => 'color',
				'label'	 => esc_html__( 'Title Color', 'geobin' ),
				'desc'	 => esc_html__( 'You can change title color', 'geobin' ),
			),

			'header_title_color'	 => array(
				'type'	 => 'color-picker',
				'label'	 => esc_html__( 'Banner Title Color', 'geobin' ),
				'desc'	 => esc_html__( 'Custom Banner Title Color', 'geobin' ),
			),

			'header_image'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'geobin' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'geobin' ),
				'help'	 => esc_html__( "This default header image will be used for all your Service.", 'geobin' ),
				'type'	 => 'upload'
			),

			'header_image_height'	 => array(
				'label'	 => esc_html__( 'Banner Height', 'geobin' ),
				'desc'	 => esc_html__( 'Give a minimum banner height value.', 'geobin' ),
				'type'	 => 'text',
			),

            'overlay'		 => array(
                'type'  => 'rgba-color-picker',
                'value'		 => '',
                // palette colors array
                'label'		 => esc_html__( 'Overlay', 'geobin' ),
                'desc'		 => esc_html__( 'This is optional Overlay', 'geobin' ),
            ),

            'breadcrumbs'		 => array(
                'type'  => 'switch',
                'value'		 => 'yes',
                'label'		 => esc_html__( 'Breadcrumb', 'geobin' ),
                'left-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'geobin'),
                ),
                'right-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('No', 'geobin'),
                ),
                'desc'		 => esc_html__( 'Show or hide breadcrumb', 'geobin' ),
            ),
		
		),
	),
);
