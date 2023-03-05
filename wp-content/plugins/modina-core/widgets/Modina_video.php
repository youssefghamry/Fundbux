<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_video extends Widget_Base
{

    public function get_name()
    {
        return 'modina_video';
    }

    public function get_title()
    {
        return esc_html__('Video Section', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-video-playlist';
    }

    public function get_keywords()
    {
        return ['video', 'popup', 'play', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

         // ------------------- layout select  -----------------------//

        $this->start_controls_section(
            'news_style_select', [
                'label' => __( 'Video Section - Choice', 'modina-core' ),
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


         // -------------------  Title Section  -----------------------//
         $this->start_controls_section(
            'section_heading',
            [
                'label' => esc_html__( 'Section Heading', 'modina-core' ),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__( 'Heading Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Joel Orphanage Of Ministry Uganda',
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_heading_span', [
                'label' => esc_html__( 'Heading Span Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h1 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .section-title h1',
            ]
        );

        $this->end_controls_section();   

        $this->start_controls_section(
            'section_sub_heading',
            [
                'label' => esc_html__( 'Section Sub Heading', 'modina-core' ),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub Heading', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Life Changing Video',                
            ]
        );

        $this->add_control(
            'color_sub_heading', [
                'label' => esc_html__( 'Sub Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'video_start',
            [
                'label' => esc_html__('Video Options', 'modina-core'),
            ]
        );

        $this->add_control(
            'video_link',
            [
                'label' => esc_html__( 'Video Link - URL', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'https://www.youtube.com/watch?v=M9gopSGhmuE',
            ]
        );

        $this->add_control(
            'video_btn_text',
            [
                'label' => esc_html__( 'Video Button Text', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'play video',
            ]
        );

        $this->add_control(
            'video_btn_bg_color', [
                'label' => esc_html__( 'Video Button BG Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn .play-video' => 'background-color: {{VALUE}};',
                ],
            ]
        ); 

        $this->add_control(
            'video_btn_color', [
                'label' => esc_html__( 'Video Button Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn .play-video i' => 'color: {{VALUE}};',
                ],
            ]
        );   

        $this->add_control(
            'video_btn_text_color', [
                'label' => esc_html__( 'Video Text Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn .play-text' => 'color: {{VALUE}};',
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
            'video_bg_img', [
                'label' => esc_html__( 'Section Background Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/child_video_bg.jpg',
                ],
            ]
        );

        $this->add_control(
            'sec_padding',
            [
                'label' => esc_html__('Section Padding', 'modina-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .video-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    if ( $settings['style'] == 'style_1' ) {
        include 'video/style-one.php';
    }

    if ( $settings['style'] == 'style_2' ) {
        include 'video/style-two.php';
    }

    }
}
