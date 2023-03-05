<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_section_title extends Widget_Base {

    public function get_name() {
        return 'modina_section_title';
    }

    public function get_title() {
        return esc_html__( 'Section Title', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-pojome';
    }

    public function get_keywords() {
        return [ 'title', 'section', 'fundbux', 'heading', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

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
                'default' => 'We’ve Funded <span>44k</span> Dollars Over',
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Heading Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_heading_span', [
                'label' => esc_html__( 'Heading Span Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        $this->end_controls_section(); 

        // ------------------- Sub Title Section  -----------------------//
        $this->start_controls_section(
            'section_sub_heading',
            [
                'label' => esc_html__( 'Section Sub Heading', 'modina-core' ),
            ]
        );

        $this->add_control(
            'section_icon',
            [
                'label' => __( 'Choice Icon', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-heart',
                    'library' => 'regular',
                ],
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__( 'Sub Heading', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'About Us',
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

        // ------------------- Section Text  -----------------------//
        $this->start_controls_section(
            'section_text_tab',
            [
                'label' => esc_html__( 'Section Text Content', 'modina-core' ),
            ]
        );

        $this->add_control(
            'section_text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section(); 


        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Section Alignment', 'modina-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => __( 'Alignment', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'modina-core' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'modina-core' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'modina-core' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->end_controls_section(); 

    }

    protected function render() {
    $settings = $this->get_settings();
    ?>

    <?php if (!empty($settings['heading'])) : ?>
        <div class="section-title text-<?php echo esc_attr( $settings['text_align'] ); ?>">
            <span><?php \Elementor\Icons_Manager::render_icon( $settings['section_icon'] ); ?><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
            <h2><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h2>
        </div>
        <?php if (!empty($settings['section_text'])) : ?>
            <p class="mt-30"><?php echo htmlspecialchars_decode(esc_html($settings['section_text'])); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    }
}