<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0
     */
    public function xs_icon_pack( $controls_manager ) {

        require_once GEOBIN_SHORTCODE_DIR. '/controls/xs-icon.php';

        $controls = array(
            $controls_manager::ICON => 'Xs_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }


	public function __construct(){

        add_action('elementor/init', array($this, 'xs_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'xs_icon_pack' ), 11 );

        add_action('elementor/widgets/widgets_registered', array($this, 'xs_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */
    
     public function enqueue_scripts() {
        wp_enqueue_script( 'xs-main-elementor', GEOBIN_SCRIPTS . '/elementor.js',array( 'jquery', 'elementor-frontend' ), GEOBIN_VERSION, true );
    }

    
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function xs_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'geobin-elements',
            [
                'title' => esc_html__( 'Geobin', 'geobin' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    public function xs_shortcode_elements($widgets_manager){
        require_once GEOBIN_SHORTCODE_DIR.'xs-timeline.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-faq.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-project.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-icon-list.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-simple-slider.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-price.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-working-proces.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-services.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-heading.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-button.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-image-box.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-blog.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-partner.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-team.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-slider.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-fun-fact.php';
        require_once GEOBIN_SHORTCODE_DIR.'xs-testimonial.php';

        $widgets_manager->register_widget_type(new Elementor\Xs_Timeline_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Faq_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Project_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Widget_Icon_List());
        $widgets_manager->register_widget_type(new Elementor\Xs_Simple_Slider());
        $widgets_manager->register_widget_type(new Elementor\XS_Price_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Working_Proces_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Services_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Heading_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Button_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Image_Box_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Post_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Partner_Widget());
        $widgets_manager->register_widget_type(new Elementor\XS_Team_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Slider_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Fun_Fact_Widget());
        $widgets_manager->register_widget_type(new Elementor\Xs_Testimonial_Widget());
        
    }
    
	public static function xs_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Xs_Shortcode();
        }
        return self::$_instance;
    }

}
$Xs_Shortcode = Xs_Shortcode::xs_get_instance();
