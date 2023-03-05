<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_box_card extends Widget_Base {

    public function get_name() {
        return 'modina_box_card';
    }

    public function get_title() {
        return esc_html__( 'Box Card & Link', 'modina-core' );
    }

    public function get_icon() {
        return ' eicon-info-box';
    }

    public function get_keywords() {
        return [ 'box', 'fundbux', 'link', 'card', 'icon', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        // ----- faq Item Box ---------//
        $this->start_controls_section(
            'box_card_section',
            [
                'label' => esc_html__( 'Box Card - Link', 'modina-core' ),
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
            'card_title',
            [
                'label' => esc_html__( 'Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Payment & Refund',
            ]
        );

        $repeater->add_control(
            'card_text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Many of us have no idea what its like to be thirsty have plenty',
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

        $repeater->add_control(
            'card_bg',
            [
                'label' => esc_html__( 'Background Image', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/f1.jpg',
                ],              
            ]
        );

        $this->add_control(
            'card_items',
            [
                'label' => esc_html__( 'All Box Card', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'card_bg' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/fc1.jpg',
                        ],
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/f1.png',
                        ],
                        'card_title'   => 'Payment & Refund',
                    ],
                    [
                        'card_bg' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/fc2.jpg',
                        ],
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/f2.png',
                        ],
                        'card_title'   => 'Administrations',
                    ],
                    [
                        'card_bg' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/fc3.jpg',
                        ],
                        'img_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/f3.png',
                        ],
                        'card_title'   => 'Team & Volunteer',
                    ],
                ],
                'title_field' => '{{{card_title}}}'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_card_item', [
                'label' => esc_html__( 'Card Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label' => esc_html__( 'Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-faq-item .faq-details h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_card_title',
                'selector' => '{{WRAPPER}} .single-faq-item .faq-details h2',
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
                    '{{WRAPPER}} .faq-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_control(
            'sec_bg_color', [
                'label' => esc_html__( 'Section BG Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $card_items = $settings['card_items'];
    ?>

    <section class="faq-wrap section-padding text-center">
        <div class="container">
            <div class="row">
                <?php
                if (!empty($card_items)) { $i = 0;
                foreach ($card_items as $item) {
                $i++; ?> 
                <div class="col-12 col-md-6 col-lg-4 wow fadeInUp">
                    <div class="single-faq-card card<?php echo esc_attr($i); ?> bg-cover" style="background-image: url('<?php echo esc_url($item['card_bg']['url']); ?>')">
                        <div class="icon">
                            <img src="<?php echo esc_url($item['img_icon']['url']); ?>" alt="">
                        </div>
                        <h3><?php echo esc_html($item['card_title']); ?></h3>
                        <p><?php echo esc_html($item['card_text']); ?></p>
                        <a href="<?php echo esc_url($item['btn_link']['url']); ?> <?php modina_is_external($item['btn_link']); ?> <?php modina_is_nofollow($item['btn_link']); ?>"><i class="fal fa-arrow-right"></i></a>
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