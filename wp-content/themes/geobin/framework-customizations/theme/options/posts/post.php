<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'side' => array(
		'title'		 => esc_html__( 'Page Settings', 'geobin' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'geobin' ),
				'desc'	 => esc_html__( 'Add your Custom hero title', 'geobin' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'geobin' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'geobin' ),
				'help'	 => esc_html__( "This default header image will be used for all your Service.", 'geobin' ),
				'type'	 => 'upload'
			),
		),
	),
);
