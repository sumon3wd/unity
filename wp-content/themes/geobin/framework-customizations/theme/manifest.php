<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'Geobin', 'geobin' );
$manifest[ 'uri' ]			 = esc_url( 'http://themeforest.com/user/Themewinter' );
$manifest[ 'description' ]	 = esc_html__( 'Geobin WordPress theme', 'geobin' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'Themewinter';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themeforest.com/user/themewinter' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => '4.1',
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
	'megamenu'		 => array(),
);