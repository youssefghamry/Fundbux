<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_services extends Widget_Base {

    public function get_name() {
        return 'modina_services';
    }

    public function get_title() {
        return esc_html__( 'Service Box', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_keywords() {
        return [ 'service', 'fundbux', 'item', 'icon', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        // ----- service Item Box ---------//
        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__( 'Service Item Box', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'img_icon',
            [
                'label' => esc_html__( 'Icon', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/box.png',
                ],              
            ]
        );

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__( 'Service Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Healthy Foods',
            ]
        );

        $repeater->add_control(
            'service_info',
            [
                'label' => esc_html__( 'Service Info', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'There are only a few times in each of our lives that we get to witness a truly historic global compliment Ending smallpox, tearing',
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'read more',                
            ]
        );

        $repeater->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'service_items',
            [
                'label' => esc_html__( 'All Services', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/box.png',
                        ],
                        'service_title'   => 'Healthy Foods',
                    ],
                    [
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/hand-love.png',
                        ],
                        'service_title'   => 'Make Donation',
                    ],
                    [
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/medical.png',
                        ],
                        'service_title'   => 'Medical Facilities',
                    ],
                ],
                'title_field' => '{{{service_title}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_service_item', [
                'label' => esc_html__( 'Service Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            's_color_title', [
                'label' => esc_html__( 'Service Name Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item .service-details h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            's_item_margin', [
                'label' => esc_html__( 'Service Item Margin', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-service-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_title',
                'selector' => '{{WRAPPER}} .single-service-item .service-details h2',
            ]
        );

        $this->end_controls_section();
        
        //--------------- Style Section Padding ---------
        $this->start_controls_section(
            'style_section_padding', [
                'label' => esc_html__( 'Section Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .services-section.section-padding.pt-0' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $service_items = $settings['service_items'];
    ?>

    <section class="services-section section-padding pt-0">
        <div class="container">
            <div class="row">
            <?php
                if (!empty($service_items)) { $i = 0;
                foreach ($service_items as $item) {
                $i++; ?>            
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-service-item">
                        <div class="icon"><img src="<?php echo esc_url($item['img_icon']['url']); ?>" alt="" /></div>
                        <div class="service-details">
                            <?php if(!empty($item['service_title'])) : ?>
                            <h2><a href="<?php echo esc_url($item['btn_link']['url']); ?> <?php modina_is_external($item['btn_link']); ?> <?php modina_is_nofollow($item['btn_link']); ?>"><?php echo esc_html($item['service_title']) ?></a></h2>
                            <?php endif; ?>
                            <?php if(!empty($item['service_info'])) : ?>
                            <p><?php echo esc_html($item['service_info']) ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($item['btn_link']['url']); ?>" <?php modina_is_external($item['btn_link']); ?> <?php modina_is_nofollow($item['btn_link']); ?>><i class="fal fa-plus"></i><?php echo esc_html( $item['button_text'] ) ?></a>
                        </div>
                    </div>
                </div>
                <?php } 
                } ?>
            </div>
        </div>
    </section>
    <?php
    }
}