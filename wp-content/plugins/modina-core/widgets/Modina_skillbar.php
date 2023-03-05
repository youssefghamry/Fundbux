<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_skillbar extends Widget_Base {

    public function get_name() {
        return 'modina_skillbar';
    }

    public function get_title() {
        return esc_html__( 'Skillbar - Circle', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-counter-circle';
    }

    public function get_keywords() {
        return [ 'skill', 'fundbux', 'progressbar', 'funfact', 'circle', 'counter', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        // ----- service Item Box ---------//
        $this->start_controls_section(
            'skills_section',
            [
                'label' => esc_html__( 'Skillbar Circle', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'skill_title',
            [
                'label' => esc_html__( 'Skill Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Complete Project',
            ]
        );

        $repeater->add_control(
            'skill_bar_percent',
            [
                'label' => esc_html__( 'Skill Percent?', 'modina-core' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '76',
            ]
        );

        $repeater->add_control(
            'skill_bar_color',
            [
                'label' => esc_html__( 'Skill Bar Color?', 'modina-core' ),
                'label_block' => true,
                'type' => Controls_Manager::COLOR,
                'default' => '#d55342',
            ]
        );
        
        $this->add_control(
            'skill_items',
            [
                'label' => esc_html__( 'All Skill Circle', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'skill_title'   => 'Complete Project',
                    ],
                ],
                'title_field' => '{{{skill_title}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_skill_item', [
                'label' => esc_html__( 'Skillbar Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            's_color_title', [
                'label' => esc_html__( 'Skill Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-skill p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_skill_title',
                'selector' => '{{WRAPPER}} .single-skill p',
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render() {

    $settings = $this->get_settings();
    $skill_items = $settings['skill_items'];
    ?>
        <div class="skills-list row text-center">
            <?php
            if (!empty($skill_items)) { $i = 0;
            foreach ($skill_items as $item) {
            $i++; ?>  
            <div class="single-skill col-sm-6 col-12">
                <div class="skillprogress" data-bar-color="<?php echo esc_attr( $item['skill_bar_color'] ); ?>" data-percent="<?php echo esc_attr( $item['skill_bar_percent'] ); ?>">
                    <span class="percent"></span>
                </div>
                <p><?php echo esc_html($item['skill_title']); ?></p>
            </div>
            <?php } 
            } ?>
        </div> 
    <?php
    }
}