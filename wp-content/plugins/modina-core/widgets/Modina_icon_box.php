<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_icon_box extends Widget_Base {

    public function get_name() {
        return 'modina_icon_box';
    }

    public function get_title() {
        return esc_html__( 'Box Grid (Fundbux)', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_keywords() {
        return [ 'box', 'fundbux', 'item', 'icon', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        // ----- service Item Box ---------//
        $this->start_controls_section(
            'box_section',
            [
                'label' => esc_html__( 'Icon Box Item', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'box_img',
            [
                'label' => esc_html__( 'Image', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/block-img.jpg',
                ],              
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label' => __( 'Choice Icon', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-tint',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'box_title',
            [
                'label' => esc_html__( 'Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Our Goal',
            ]
        );

        $repeater->add_control(
            'box_text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Become the One Who is Considered a Hero',
            ]
        );

        $this->add_control(
            'box_items',
            [
                'label' => esc_html__( 'All Icon Box', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [                       
                        'box_title'   => 'Our Goal',
                    ],
                    [
                        'box_title'   => 'Our Achievement',
                    ],
                    [
                        'box_title'   => 'Our Missions',
                    ],
                    [
                        'box_title'   => 'Our Dream',
                    ],
                ],
                'title_field' => '{{{box_title}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_service_item', [
                'label' => esc_html__( 'Box Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            's_color_title', [
                'label' => esc_html__( 'Box Name Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-skill-box .skill-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_box_title',
                'selector' => '{{WRAPPER}} .single-skill-box .skill-content h3',
            ]
        );

        $this->add_control(
            's_item_margin', [
                'label' => esc_html__( 'Box Item Margin', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-skill-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
    $box_items = $settings['box_items'];
    ?>

        <div class="skill-box-items row text-center">
            <?php
            if (!empty($box_items)) { $i = 0;
            foreach ($box_items as $item) {
            $i++; ?> 
            <div class="col-12 col-sm-6">
                <div class="single-skill-box bg-cover" style="background-image: url('<?php echo esc_url($item['box_img']['url']); ?>')">
                    <div class="skill-content">
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <?php if(!empty($item['box_title'])) : ?>
                        <h3><?php echo esc_html($item['box_title']); ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($item['box_text'])) : ?>
                        <p><?php echo esc_html($item['box_text']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php } 
            } ?>
        </div>
    <?php
    }
}