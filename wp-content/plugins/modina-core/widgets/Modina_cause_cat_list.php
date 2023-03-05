<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class Modina_cause_cat_list extends Widget_Base {

    public function get_name() {
        return 'modina_cause_cat_list';
    }

    public function get_title() {
        return esc_html__( 'Causes Category - Promo', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_keywords() {
        return [ 'causes', 'donate', 'Promo', 'category', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'cause_cat_section',
            [
                'label' => esc_html__( 'Top Causes Category', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'cat_name',
            [
                'label' => esc_html__( 'Category Name', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Pure Water',
            ]
        );

        $repeater->add_control(
            'cat_icon',
            [
                'label' => esc_html__( 'Category Icon', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/cat1.png',
                ],
                'label_block' => true,
            ]
        );

     	$repeater->add_control(
            'cat_link',
            [
                'label' => esc_html__( 'Client Link', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '#',
            ]
        );

        $this->add_control(
            'all_causes_cat',
            [
                'label' => esc_html__( 'Causes Category List', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat1.png',
                        ],
                        'cat_name'   => 'Pure Water'
                    ],
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat2.png',
                        ],
                        'cat_name'   => 'Health Food'
                    ],
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat3.png',
                        ],
                        'cat_name'   => 'No Poverty'
                    ],
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat4.png',
                        ],
                        'cat_name'   => 'Good Health'
                    ],
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat5.png',
                        ],
                        'cat_name'   => 'Partnerships'
                    ],
                    [
                        'cat_icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/cat6.png',
                        ],
                        'cat_name'   => 'Good Health'
                    ],
                ],                
                'title_field' => '{{{cat_name}}}'
            ]
        );

        $this->end_controls_section();      

        // -------------------  Title Section  -----------------------//
        $this->start_controls_section(
            'promo_cat_style',
            [
                'label' => esc_html__( 'Category Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_heading', [
                'label' => esc_html__( 'Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-cause-cat p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_heading',
                'selector' => '{{WRAPPER}} .single-cause-cat p',
            ]
        );

        $this->end_controls_section();   

        $this->start_controls_section(
            'style_section_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cause-cat-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    $all_causes_cat = $settings['all_causes_cat'];
    ?>
    <div class="promo-section cause-cat-section">
        <div class="container wow fadeInUp">
            <div class="row">
            <?php if (!empty($all_causes_cat)) {
                foreach ($all_causes_cat as $item) {?>
                <div class="col-6 col-sm-4 col-lg-2">
                    <a class="single-cause-cat" href="<?php echo esc_url($item['cat_link']); ?>">
                        <div class="icon">
                            <img src="<?php echo esc_url($item['cat_icon']['url']); ?>" alt="donate">
                        </div>
                        <p><?php echo esc_html($item['cat_name']); ?></p>
                    </a>
                </div>
                <?php }
            } ?>
            </div>
        </div>
    </div>
    <?php
    }
}