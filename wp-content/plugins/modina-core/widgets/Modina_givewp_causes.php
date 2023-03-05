<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use WP_Query;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_givewp_causes extends Widget_Base {

    public function get_name() {
        return 'modina_givewp_causes';
    }

    public function get_title() {
        return esc_html__( 'Causes Grid - Donations', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-heart';
    }

    public function get_keywords() {
        return [ 'causes', 'form', 'givewp', 'donate', 'help', 'donations', 'modina', 'fundbux'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_style', [
                'label' => __( 'Causes Card Style - Choice', 'modina-core' ),
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

        $this->start_controls_section(
            'post_content_option',
            [
                'label' => __('Causes Options', 'modina-core'),
            ]
        );

        $this->add_control(
            'post_limit',
            [
                'label' => __('How many causes want to show?', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); 

    }

    protected function render() {
 
    $settings = $this->get_settings();

    if ( $settings['style'] == 'style_1' ) {
        include 'cause/style-one.php';
    }

    if ( $settings['style'] == 'style_2' ) {
        include 'cause/style-two.php';
    }

    if ( $settings['style'] == 'style_3' ) {
        include 'cause/style-three.php';
    }
    
    }
}
