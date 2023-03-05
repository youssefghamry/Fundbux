<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_contact_form extends Widget_Base
{

    public function get_name()
    {
        return 'modina_contact_form';
    }

    public function get_title()
    {
        return esc_html__('Contact Form', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-form-horizontal';
    }

    public function get_keywords()
    {
        return ['form', 'subscribe', 'contact', 'email', 'modina'];
    }

    public function get_categories()
    {
        return ['modina-elements'];
    }

    public function is_reload_preview_required() {
        return true;
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_shortcode',
            [
                'label' => __( 'Shortcode', 'modina-core' ),
            ]
        );

        $this->add_control(
            'form_sub_title',
            [
                'label' => esc_html__('Form Sub Title', 'modina-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Write Here',
            ]
        );

        $this->add_control(
            'form_heading',
            [
                'label' => esc_html__('Form Upper Title - Heading', 'modina-core'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Get in Touch',
            ]
        );

        $this->add_control(
            'shortcode',
            [
                'label' => __( 'Enter your shortcode', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => '[contact-form-7 id="2166" title="Contact form 1"]',
            ]
        );

        $this->end_controls_section();

        //--------------- Style Section ---------
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Section Style', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_color', [
                'label' => esc_html__( 'Form Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-from-addon .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_item_title',
                'selector' => '{{WRAPPER}} .contact-from-addon .section-title h2',
            ]
        );

        $this->add_control(
            'item_text_color', [
                'label'   => esc_html__( 'Text Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .contact-from-addon .section-title span' => 'color: {{VALUE}} !important;',
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
                    '{{WRAPPER}} .contact-from-addon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $shortcode_id = $settings['shortcode'];
        $shortcode = do_shortcode( shortcode_unautop( $shortcode_id ) );
    ?>
        <div class="row contact-from-addon section-padding">
            <div class="col-12 text-center mb-20">
                <div class="section-title">
                    <?php if ( !empty( $settings['form_sub_title'] ) ) : ?>
                        <span><i class="fal fa-pen"></i><?php echo esc_html( $settings['form_sub_title'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( !empty( $settings['form_heading'] ) ) : ?>
                        <h2><?php echo esc_html( $settings['form_heading'] ); ?></h2>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="contact-form">                                                        
                    <?php if ( !empty( $shortcode ) ) : ?>
                        <?php echo $shortcode; ?>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
    <?php
    }
}
