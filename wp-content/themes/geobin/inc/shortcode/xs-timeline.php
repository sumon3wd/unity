<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Timeline_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-timeline';
    }

    public function get_title() {
        return esc_html__( 'Geobin Timeline', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Timeline', 'geobin'),
            ]
        );

        $this->add_control(
            'xs_timeline_items',
            [
                'label' => esc_html__( 'Timeline', 'geobin' ),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'featured_title' => esc_html__( 'Timeline Title', 'geobin' ),
                        'featured_content' => esc_html__( 'Our promising journey started on 08 February 2010 by Leonardo Decaprio, the CEO and Founder of the Geobin', 'geobin' ),
                    ],
                ],
                'fields' => [
                    [
                            'name' => 'featured_title',
                            'label' => esc_html__( 'Title', 'geobin' ),
                            'type' => Controls_Manager::TEXT,
                            'default' => esc_html__( 'We are featured' , 'geobin' ),
                            'label_block' => true,
                    ],
                    [
                            'name' => 'timeline_year',
                            'label' => esc_html__( 'Yaer', 'geobin' ),
                            'type' => Controls_Manager::TEXT,
                            'default' => esc_html__( '2010' , 'geobin' ),
                    ],
                    [
                            'name' => 'featured_content',
                            'label' => esc_html__( 'Content', 'geobin' ),
                            'type' => Controls_Manager::WYSIWYG,
                            'default' => esc_html__( 'Our promising journey started on 08 February 2010 by Leonardo Decaprio, the CEO and Founder of the Geobin', 'geobin' ),
                            'label_block' => true,
                    ],
                    [                                       
                        'name'                 => 'featured_align',
                        'label'          => esc_html__( 'Alignment', 'geobin' ),
                        'type'           => Controls_Manager::CHOOSE,
                        'options'        => [

                                'left'       => [
                                        'title'  => esc_html__( 'Left', 'geobin' ),
                                        'icon'   => 'fa fa-align-left',
                                ],                                                
                                'right'      => [
                                        'title'  => esc_html__( 'Right', 'geobin' ),
                                        'icon'   => 'fa fa-align-right',
                                ],
                        ],
                        'default'           => 'right',
                        
                    ],  
                ],
                'title_field' => '{{{ featured_title }}}',
            ]
        );

        $this->end_controls_section();

 
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $xs_featued_items = $settings['xs_timeline_items'];

        ?>
            <div class="timeline-wrapper">
                
                <?php foreach ($xs_featued_items as $xs_featued_item ) {
                    if($xs_featued_item['featured_align'] == 'left' ) {
                    ?>
                  <div class="row">
                     <div class="col-md-6 timeline-item <?php echo 'left-part'; ?>">
                        <div class="timeline-badge active"></div>
                        <div class="timeline-panel">
                           <div class="details"><?php echo wp_kses_post($xs_featued_item['featured_content']); ?></div>
                        </div>
                     </div>
                     <div class="col-md-6 timeline-item ">
                        <div class="timeline-date left-part active">
                           <p class="title"><?php echo esc_html($xs_featued_item['timeline_year']); ?></p>
                           <p class="tagline"><?php echo esc_html($xs_featued_item['featured_title']); ?></p>
                        </div>
                     </div>
                  </div>

                  <?php } else { ?>
                
                  <div class="row">
                     <div class="col-md-6 timeline-item">
                        <div class="timeline-date">
                           <p class="title"><?php echo esc_html($xs_featued_item['timeline_year']); ?></p>
                           <p class="tagline"><?php echo esc_html($xs_featued_item['featured_title']); ?></p>
                        </div>
                     </div>
                     <div class="col-md-6 timeline-item">
                        <div class="timeline-badge"></div>
                        <div class="timeline-panel">
                           <div class="details"><?php echo wp_kses_post($xs_featued_item['featured_content']); ?></div>
                        </div>
                     </div>
                  </div>
                <?php } } ?>

               </div>
<?php
        }

    protected function _content_template() { }
}
?>