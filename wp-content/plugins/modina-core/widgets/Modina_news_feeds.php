<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use WP_Query;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_news_feeds extends Widget_Base
{

    public function get_name()
    {
        return 'modina_news_feeds';
    }

    public function get_title()
    {
        return esc_html__('News Feeds', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_keywords()
    {
        return ['blog', 'post', 'article', 'news', 'latest', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

         // ------------------- layout select  -----------------------//

        $this->start_controls_section(
            'news_style_select', [
                'label' => __( 'Blog Layout - Choice', 'modina-core' ),
            ]
        );

        $this->add_control(
            'style', [
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_1' => esc_html__( 'Style One', 'modina-core' ),
                    'style_2' => esc_html__( 'Style Two', 'modina-core' ),
                    'style_3' => esc_html__( 'Style Three', 'modina-core' ),
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
                'default' => 'News Feeds',
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
                'default' => 'Our Insights',                
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
            'post_content_option',
            [
                'label' => __('Post Options', 'modina-core'),
            ]
        );

        $this->add_control(
            'post_limit',
            [
                'label' => __('How many posts want to show?', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_length',
            [
                'label' => esc_html__('Content Length', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 12,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'show_read_more_btn',
            [
                'label' => esc_html__('Show Read More Button?', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'read_more_txt',
            [
                'label' => esc_html__('Read More Button Text', 'modina-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'modina-core'),
                'placeholder' => esc_html__('Read More', 'modina-core'),
                'condition' => [
                    'show_read_more_btn' => 'yes',
                ]
            ]
        );

        $this->end_controls_section(); 

   
        //--------------- Latest Post Style Section ---------

        $this->start_controls_section(
            'style_tab_latest_post',
            [
                'label' => esc_html__('Latest News', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Color
        $this->add_control(
            'latest_post_title_color',
            [
                'label' => esc_html__('Title Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .single-blog-card h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'latest_post_title_typo',
                'selector' => '{{WRAPPER}} .single-blog-card h3',
            ]
        );

        // Info Color
        $this->add_control(
            'latest_post_info_color',
            [
                'label' => esc_html__('Info Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .post-grid .post-excerpt p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Info Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'latest_post_info_typo',
                'selector' => '{{WRAPPER}} .post-grid .post-excerpt p',
            ]
        );

        // Button Color
        $this->add_control(
            'latest_post_button_color',
            [
                'label' => esc_html__('Button Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .post-grid .read-article' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Color
        $this->add_control(
            'latest_post_button_h_color',
            [
                'label' => esc_html__('Button Hover Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-grid .read-article:hover' => 'color: {{VALUE}};',
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
            'section_bg', [
                'label' => esc_html__( 'Section - Background', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/blog_3_bg.jpg',
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
                    '{{WRAPPER}} .blog-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        include 'blog/style-one.php';
    }

    if ( $settings['style'] == 'style_2' ) {
        include 'blog/style-two.php';
    }

    if ( $settings['style'] == 'style_3' ) {
        include 'blog/style-three.php';
    }

    }
}
