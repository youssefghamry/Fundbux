<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_promo_box extends Widget_Base {

    public function get_name() {
        return 'modina_promo_box';
    }

    public function get_title() {
        return esc_html__( 'Promo - Box Card', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_keywords() {
        return [ 'promo', 'donation', 'box', 'fundbux', 'card', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {              


        // ----- Item List ---------//
        $this->start_controls_section(
            'promo_sec',
            [
                'label' => esc_html__( 'Promo Donation Box', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon', [
                'label' => esc_html__( 'Upload Icon', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/block-icon1.png',
                ],
            ]
        );

        $repeater->add_control(
            'promo_title',
            [
                'label' => esc_html__( 'Headline', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Make Donation',
            ]
        );

        $repeater->add_control(
            'promo_text',
            [
                'label' => esc_html__( 'Sub Heading', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'The Spring is a passionate and determined group of monthly givers on a mission',
            ]
        );

        $repeater->add_control(
            'card_bg', [
                'label' => esc_html__( 'Box Background Upload', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/support_girl.jpg',
                ],
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Read More',                
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
                    'is_external' => true,
					'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'all_features',
            [
                'label' => esc_html__( 'All Promo Card', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'promo_title'   => 'Make Donation',
                        'icon' => [
                            'url' => plugin_dir_url(__DIR__) . 'assets/img/icons/hand.png',
                        ],
                        'card_bg' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/support_girl.jpg',
                        ],
                    ],                  
                    [
                        'promo_title'   => 'Fundrise For Grow',
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/world.png',
                        ],
                        'card_bg' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/block-img.jpg',
                        ],
                    ],                  
                ],

                'title_field' => '{{{promo_title}}}'
            ]
        );

        $this->end_controls_section();  


        $this->start_controls_section(
            'section_style_tab', [
                'label' => esc_html__( 'Section Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg_color', [
                'label'   => esc_html__( 'Section Background Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .promo-section' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .promo-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $all_features = $settings['all_features'];
    ?>
    <?php if (!empty($settings['all_features'])) : ?>
    <section class="promo-section promo-flex-wrap">
        <div class="container wow fadeInUp">
            <div class="row">
                <?php if (!empty($all_features)) {
                    foreach ($all_features as $item) { ?>
                    <div class="col-lg-6 p-lg-0 col-12">
                        <div class="single-promo-item text-white bg-cover" style="background-image: url('<?php echo esc_url($item['card_bg']['url']); ?>')">
                            <div class="icon"> <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="modina-core" /> </div>
                            <div class="promo-details">
                                <h2><a href="<?php echo esc_url($item['btn_link']['url']); ?>" <?php modina_is_external($item['btn_link']);?> <?php modina_is_nofollow($item['btn_link']); ?>><?php echo htmlspecialchars_decode(esc_html($item['promo_title'])); ?></a></h2>
                                <p><?php echo htmlspecialchars_decode(esc_html($item['promo_text'])); ?></p>
                                <a href="<?php echo esc_url($item['btn_link']['url']); ?>" <?php modina_is_external($item['btn_link']);?> <?php modina_is_nofollow($item['btn_link']); ?>><?php echo esc_html( $item['button_text'] ) ?></a>
                            </div>
                        </div>
                    </div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php
    }
}