<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_funfact extends Widget_Base {

    public function get_name() {
        return 'modina_funfact';
    }

    public function get_title() {
        return esc_html__( 'Fun Fact', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_keywords() {
        return [ 'fun', 'fact', 'achievement', 'countdown', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'volunteers_section',
            [
                'label' => esc_html__( 'All Fun Fact', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon_img',
            [
                'label' => esc_html__( 'Icon', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/1.png',
                ],              
            ]
        );

        $repeater->add_control(
            'fact_name',
            [
                'label' => esc_html__( 'Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Donation Done',
            ]
        );

        $repeater->add_control(
            'digit',
            [
                'label' => esc_html__( 'Countdown Digit', 'modina-core' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => '8',
            ]
        );

        $repeater->add_control(
            'total',
            [
                'label' => esc_html__( 'Total ( K, M, B )?', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );


        $this->add_control(
            'all_funfact',
            [
                'label' => esc_html__( 'All Funfacts', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/3.png',
                        ],
                        'fact_name'   => 'Donation Done',
                        'digit'   => '50',
                        'total'   => 'm',
                    ],
                    [
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/4.png',
                        ],
                        'fact_name'   => 'Hopeless Child',
                        'digit'   => '30',
                        'total'   => 'm',
                    ],
                    [
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/1.png',
                        ],
                        'fact_name'   => 'Team Member',
                        'digit'   => '99',
                    ],
                    [
                        'icon' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/icons/2.png',
                        ],
                        'fact_name'   => 'Get Regards',
                        'digit'   => '15',
                    ],
                ],
                'title_field' => '{{{fact_name}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_funs', [
                'label' => esc_html__( 'Funfact Styles', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tittle_color', [
                'label' => esc_html__( 'Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-fact .numbers .digit' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'digits_color', [
                'label' => esc_html__( 'Digits Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-fact .numbers .digit span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_fact_title',
                'selector' => '{{WRAPPER}} .single-fact .numbers p, .single-fact .numbers .digit',
            ]
        );

        $this->end_controls_section();

        //--------------- Style Section Padding ---------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Section Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_bg_color', [
                'label' => esc_html__( 'Section Background Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact-wrap' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .funfact-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_control(
            'sec_margin', [
                'label' => esc_html__( 'Section Margin', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .funfact-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
    $all_funfact = $settings['all_funfact'];
    ?>
    <section class="funfact-wrap section-padding text-white">
        <div class="container">
            <div class="row">
            <?php if (!empty($all_funfact)) {
            foreach ($all_funfact as $item) { ?> 
                <div class="col-lg-3 col-sm-6">
                    <div class="single-fact">
                        <div class="icon">
                            <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['fact_name']); ?>">
                        </div>
                        <div class="numbers">
                            <div class="digit"><span><?php echo esc_html($item['digit']); ?></span><?php if (!empty($item['total'])) : ?><?php echo esc_html($item['total']); ?>
                            <?php endif ?></div>
                            <p><?php echo esc_html($item['fact_name']); ?></p>
                        </div>
                    </div>
                </div>
                <?php } 
            } ?>
            </div>
        </div>
    </section>
    <?php
    }
}