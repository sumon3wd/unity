<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');

function geobin_action_theme_include_custom_option_types() {
    if (is_admin()) {
        $dir = GEOBIN_INC . '/includes';
        require_once $dir . '/option-types/new-icon/class-fw-option-type-new-icon.php';
        require_once $dir . '/option-types/fw-multi-inline/class-fw-option-type-fw-multi-inline.php';
        // and all other option types
    }
}

add_action('fw_option_types_init', 'geobin_action_theme_include_custom_option_types');



