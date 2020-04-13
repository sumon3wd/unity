<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Partner_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-partner';
    }

    public function get_title() {
        return esc_html__( 'Geobin Logo Carousel', 'geobin' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'geobin-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Geobin Logo Carousel', 'geobin'),
            ]
        );

        $this->add_control(
            'logo_partner',
            [
                'type' => Controls_Manager::REPEATER,
                'default'   => [
                    'partner_image' => Utils::get_placeholder_image_src(),
                    'btn_link'  => '#',
                    
                ],
                'fields' => [
                    [
                        'name'          => 'partner_image',
                        'label'         => esc_html__( 'Images', 'geobin' ),
                        'type'          => Controls_Manager::MEDIA,
                        'default' => [
                                'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name'  =>  'btn_link',
                        'label' => esc_html__( 'Link', 'geobin' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => esc_html__('http://your-link.com','geobin' ),
                        'default' => [
                            'url' => '#',
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        $this->end_controls_section();
    }

    protected function render( ) {
          $settings = $this->get_settings();
          $logo_partners = $settings['logo_partner'];

          ?>
               <div class="clients-carousel owl-carousel">

                <?php 
                    foreach ($logo_partners as $logo_partner) :

                    $btn_link = (! empty( $logo_partner['btn_link']['url'])) ? $logo_partner['btn_link']['url'] : '';
                    $btn_target = ( $logo_partner['btn_link']['is_external']) ? '_blank' : '_self';

                    $image = $logo_partner['partner_image'];
                    $alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true);

                    if(isset($image['url']) && !empty($image['url'])){
                        $image = $image['url'];
                    }
                ?>

                  <div class="client-logo-wrapper d-table">
                     <div class="client-logo d-table-cell">
                        <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" >
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>">
                        </a>
                     </div>
                     <!-- End Clients logo -->
                  </div>
              <?php endforeach; ?>
                  <!-- End Client wrapper -->

              </div>
          <?php
    }

    protected function _content_template() { }
}