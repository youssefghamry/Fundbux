<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_join_us_cta extends Widget_Base
{

    public function get_name()
    {
        return 'modina_join_us_cta';
    }

    public function get_title()
    {
        return esc_html__('Join Us - CTA', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-click';
    }

    public function get_keywords()
    {
        return ['join', 'us', 'internship', 'cta', 'careers', 'team', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {


         // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'section_contents',
            [
                'label' => esc_html__( 'Join Us - Banner Contents', 'modina-core' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__( 'Section Title', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Joel Orphanage Of Ministry Uganda',
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Join With Us',                
            ]
        );

        $this->add_control(
            'cta_bg', [
                'label' => esc_html__( 'Banner - Background', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/join-cat-bg.jpg',
                ],
            ]
        );

        $this->add_control(
            'banner_bg_color',
            [
                'label' => esc_html__('Section Background - Style Hide?', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->end_controls_section(); 

        $this->start_controls_section(
            'btn_sec',
            [
                'label' => esc_html__( 'Banner Buttons', 'modina-core' ),
            ]
        );

        $this->add_control(
            'button_text1',
            [
                'label' => esc_html__( 'Button Text - Active', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Careers',                
            ]
        );

        $this->add_control(
            'btn_link1',
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
            'button_text2',
            [
                'label' => esc_html__( 'Button Text - Normal', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Internship',
            ]
        );

        $this->add_control(
            'btn_link2',
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

        $this->end_controls_section(); 


        $this->start_controls_section(
            'btn_items_style', [
                'label' => esc_html__( 'Button Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_color1', [
                'label' => esc_html__( 'Button Text Color - Active', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-btn.color' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color1', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-btn.color' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_color2', [
                'label' => esc_html__( 'Button Text Color - Normal', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color2', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cat-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //--------------- Style Section Padding ---------
        $this->start_controls_section(
            'section_padding',
            [
                'label' => esc_html__('Section Style', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .join-cta-section::before' => 'background-color: {{VALUE}};',
                ], 
            ]
        );

        $this->add_control(
            'sec_padding',
            [
                'label' => esc_html__('Padding', 'modina-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .join-cta-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    ?>
    <?php if (!empty($settings['heading'])) : ?>
    <section class="join-cta-section text-white text-center text-lg-left <?php if( !empty( $settings['banner_bg_color'] ) && $settings['banner_bg_color'] == 'yes' ) : ?> no-bg section-padding<?php endif; ?>">
        <div class="container bg-cover bg-overlay" style="background-image: url('<?php echo esc_url($settings['cta_bg']['url']); ?>')">
            <div class="row align-items-center">
                <div class="offset-xl-5 col-xl-6 col-lg-8 offset-lg-2 col-md-12">                    
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
                        <h2><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h2>
                    </div>                    

                    <a href="<?php echo esc_url($settings['btn_link1']['url']); ?>" <?php modina_is_external($settings['btn_link1']); ?> <?php modina_is_nofollow($settings['btn_link1']); ?> class="cat-btn color"><i class="fal fa-briefcase"></i><?php echo esc_html( $settings['button_text1'] ) ?></a>
                    <a href="<?php echo esc_url($settings['btn_link2']['url']); ?>" <?php modina_is_external($settings['btn_link2']); ?> <?php modina_is_nofollow($settings['btn_link2']); ?> class="cat-btn"><i class="fal fa-user"></i><?php echo esc_html( $settings['button_text2'] ) ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php
    }
}
