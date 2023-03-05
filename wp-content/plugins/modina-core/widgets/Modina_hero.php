<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_hero extends Widget_Base {

    public function get_name() {
        return 'modina_hero';
    }

    public function get_title() {
        return esc_html__( 'Hero - Sliders', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_keywords() {
        return [ 'fundbux', 'hero', 'slider', 'welcome', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        // -------------------  Title Section  -----------------------//


        $this->start_controls_section(
            'hero_style_select', [
                'label' => __( 'Hero Style - Choice', 'modina-core' ),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_1' => esc_html__( 'Style One', 'modina-core' ),
                    'style_2' => esc_html__( 'Style Two', 'modina-core' ),
                ],
                'default' => 'style_1'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_section_heading',
            [
                'label' => esc_html__( 'Slider - Hero', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'hero_image', [
                'label' => esc_html__( 'Slide Background Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/slide1.jpg',
                ],
            ]
        );

        $repeater->add_control(
            'hero_heading',
            [
                'label' => esc_html__( 'Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We’re On A Mission To Change World',
            ]
        );

        $repeater->add_control(
            'hero_subtitle',
            [
                'label' => esc_html__( 'Sub Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '<strong>Our Mission:</strong> Food, Education, Medicine',
            ]
        );

        $repeater->add_control(
            'button_text1',
            [
                'label' => esc_html__( 'Button Title - Active', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View Causes',                
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
            'button_text2',
            [
                'label' => esc_html__( 'Button Text - Normal', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Donate Now',
            ]
        );

        $repeater->add_control(
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

        $this->add_control(
            'hero_slides',
            [
                'label' => esc_html__( 'All Slides', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'hero_image' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/slide1.jpg',
                        ],
                        'hero_heading'   => 'We’re On A Mission To Change World',
                    ],
                    [
                        'hero_image' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/slide2.jpg',
                        ],
                        'hero_heading'   => 'More charity. More better life.',
                    ],
                    [
                        'hero_image' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/slide3.jpg',
                        ],
                        'hero_heading'   => 'We’re On A Mission To Change That',
                    ],
                ],
                'title_field' => '{{{hero_heading}}}'
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'slide_items_style', [
                'label' => esc_html__( 'Slide Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .single-slide .slide-contents h1',
            ]
        );

        $this->add_control(
            'color_subheading', [
                'label' => esc_html__( 'Sub Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .sub-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subheading',
                'selector' => '{{WRAPPER}} .single-slide .slide-contents .sub-title h4',
            ]
        );

        $this->add_control(
            'button_color1', [
                'label' => esc_html__( 'Button Text Color - Active', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color1', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_color2', [
                'label' => esc_html__( 'Button Text Color - Normal', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn.no-fil' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color2', [
                'label' => esc_html__( 'Button Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-slide .slide-contents .theme-btn.no-fil' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Section Color 
        $this->start_controls_section(
            'hero_slide_bg_color',
            [
                'label' => esc_html__( 'Slide Background Color', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'slide_bg_color', [
                'label'   => esc_html__( 'Background Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .hero-slider .single-slide' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slide_padding_tab', [
                'label' => esc_html__( 'Slide Padding', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slide_padding', [
                'label' => esc_html__( 'Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-slider .single-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    $hero_slides = $settings['hero_slides'];
    
    if ( $settings['style'] == 'style_1' ) {
        include 'hero/style-one.php';
    }

    if ( $settings['style'] == 'style_2' ) {
        include 'hero/style-two.php';
    }

    ?>   

    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
            
                if ($('.hero-slider-active').length > 0) {
                    $(".hero-slider-active").owlCarousel({        
                        items: 1,     
                        dots: false,
                        loop: true,
                        autoplayTimeout: 8000,
                        autoplay:true,
                        nav: true,
                        animateOut: "slideOutDown",        
                        navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
                    });
                }        

            });
        }( jQuery ));
    </script>

    <?php
    }
}