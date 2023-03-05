<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_content_features extends Widget_Base {

    public function get_name() {
        return 'modina_content_features';
    }

    public function get_title() {
        return esc_html__( 'Promo - Block Contents', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_keywords() {
        return [ 'promo', 'button', 'fundbux', 'features', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {              

        // About Image
        $this->start_controls_section(
            'img_section',
            [
                'label' => esc_html__( 'Promo Images', 'modina-core' ),
            ]
        );

        $this->add_control(
            'block_img', [
                'label' => esc_html__( 'Upload Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/block-img.jpg',
                ],
            ]
        );

        $this->end_controls_section();


        // ----- Item List ---------//
        $this->start_controls_section(
            'features_sec',
            [
                'label' => esc_html__( 'Our Features List', 'modina-core' ),
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
            'feature_title',
            [
                'label' => esc_html__( 'Features Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '50 Million Volunteers',
            ]
        );

        $repeater->add_control(
            'feature_text',
            [
                'label' => esc_html__( 'Features Text', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Many of us have no idea what it"s like to be thirsty. We have plenty of water to drink even our toilets is clean!',
            ]
        );

        $this->add_control(
            'all_features',
            [
                'label' => esc_html__( 'All Features', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title'   => 'A place in history',
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/block-icon1.png',
                        ],
                    ],                  
                    [
                        'feature_title'   => '130+ Milion Rises',
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/block-icon2.png',
                        ],
                    ],                  
                ],

                'title_field' => '{{{feature_title}}}'
            ]
        );

        $this->end_controls_section();  

        $this->start_controls_section(
            'section_btn',
            [
                'label' => esc_html__( 'Button', 'modina-core' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'See Causes',                
            ]
        );

        $this->add_control(
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
                    '{{WRAPPER}} .block-section' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'before_bg_color',
            [
                'label' => esc_html__('Before Background - Style Hide?', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .block-section.section-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    <section class="block-section section-padding <?php if( !empty( $settings['before_bg_color'] ) && $settings['before_bg_color'] == 'yes' ) : ?> no-bg<?php endif; ?>">
        <div class="container">
            <div class="row align-items-center">
                <?php if ( !empty($settings['block_img']['url'] ) ) : ?>
                <div class="col-lg-6 col-md-12 mb-5 mb-lg-0 pr-lg-0">
                    <div class="block-img">
                        <img src="<?php echo esc_url($settings['block_img']['url']); ?>" alt="FundBux">
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-5 offset-lg-1 col-md-12 pl-lg-0">
                    
                    <div class="block-feature-list">
                        <?php if (!empty($all_features)) {
                            foreach ($all_features as $item) { ?>
                            <div class="single-block-item">
                                <div class="icon">
                                    <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="modina-core">
                                </div>
                                <div class="heading">
                                    <h3><?php echo htmlspecialchars_decode(esc_html($item['feature_title'])); ?></h3>
                                    <p><?php echo htmlspecialchars_decode(esc_html($item['feature_text'])); ?></p>
                                </div>
                            </div>
                            <?php }
                        } ?>

                        <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php modina_is_external($settings['btn_link']); ?> <?php modina_is_nofollow($settings['btn_link']); ?> class="theme-btn"><?php echo esc_html( $settings['button_text'] ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

    <?php
    }
}