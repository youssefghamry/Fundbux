<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_team extends Widget_Base {

    public function get_name() {
        return 'modina_team';
    }

    public function get_title() {
        return esc_html__( 'Our Team', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_keywords() {
        return [ 'team', 'member', 'volunteers', 'mates', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'volunteers_section',
            [
                'label' => esc_html__( 'All Volunteers', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'volunteer_img',
            [
                'label' => esc_html__( 'Profile Photo', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/team/team1.png',
                ],              
            ]
        );

        $repeater->add_control(
            'volunteer_name',
            [
                'label' => esc_html__( 'Volunteer Name', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Salman Ahmed',
            ]
        );

        $repeater->add_control(
            'volunteer_post',
            [
                'label' => esc_html__( 'Volunteer Position', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'CEO',
            ]
        );

        $repeater->add_control(
            'volunteer_active',
            [
                'label' => esc_html__('Active / Hover Effect - Volunteer', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'label_block' => true,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'all_volunteers',
            [
                'label' => esc_html__( 'All Services', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'volunteer_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/team/team1.png',
                        ],
                        'volunteer_name'   => 'Salman Ahmed',
                        'volunteer_post'   => 'Volunteer',
                    ],
                    [
                        'volunteer_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/team/team2.png',
                        ],
                        'volunteer_name'   => 'Dimassi Shatt',
                        'volunteer_post'   => 'CEO',
                    ],
                    [
                        'volunteer_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/team/team3.png',
                        ],
                        'volunteer_name'   => 'Paul Smith',
                        'volunteer_post'   => 'Support Staff',
                    ],
                    [
                        'volunteer_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/team/team4.png',
                        ],
                        'volunteer_name'   => 'John Thompson',
                        'volunteer_post'   => 'Accountant',
                    ],
                ],
                'title_field' => '{{{volunteer_name}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'style_volunteers', [
                'label' => esc_html__( 'Volunteers Styles', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'volunteer_color', [
                'label' => esc_html__( 'Name Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .member-details h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'volunteer_position_color', [
                'label' => esc_html__( 'Position Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .member-details span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_volunteer_title',
                'selector' => '{{WRAPPER}} .single-team-member .member-details h3',
            ]
        );

        $this->add_control(
            's_item_margin', [
                'label' => esc_html__( 'Margin', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single-team-member' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'volunteers_btn',
            [
                'label' => esc_html__( 'Join Us - Button', 'modina-core' ),                                
            ]
        );

        $this->add_control(
            'join_btn',
            [
                'label' => esc_html__('Show - "Join With Us" Button?', 'modina-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'label_block' => true,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'join_btn_text',
            [
                'label' => esc_html__( 'Button Text', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Join With Us',
                'condition' => [
                    'join_btn' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'join_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'join_btn' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    

        $this->start_controls_section(
            'button_styles',
            [
                'label' => __('Join Us - Normal Button', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'accs_button_color',
            [
                'label' => __('Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .join-team-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_volunteer_btn',
                'selector' => '{{WRAPPER}} .join-team-btn a',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'accs_button_bg_color',
                'label' => __('Background', 'modina-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .join-team-btn a',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'accs_button_shadow',
                'selector' => '{{WRAPPER}} .join-team-btn a',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(Group_Control_Border::get_type(), [
            'name'     => 'accs_button_border',
            'label'    => esc_html__('Border', 'modina-core'),
            'selector' => '{{WRAPPER}} .join-team-btn a'
        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'button_hover_styles',
            [
                'label' => __('Join Us - Hover Button', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'accs_button_color_hover',
            [
                'label' => __('Color', 'modina-core'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .join-team-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_volunteer_btnhover',
                'selector' => '{{WRAPPER}} .join-team-btn a:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'accs_button_bg_colorhover',
                'label' => __('Background', 'modina-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .join-team-btn a:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'accs_button_shadowhover',
                'selector' => '{{WRAPPER}} .join-team-btn a:hover',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(Group_Control_Border::get_type(), [
            'name'     => 'accs_button_borderhover',
            'label'    => esc_html__('Border', 'modina-core'),
            'selector' => '{{WRAPPER}} .join-team-btn a:hover'
        ]);

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $all_volunteers = $settings['all_volunteers'];
    $join_btn = $settings['join_btn'];
    ?>
    
        <div class="row no-padding">
            <?php if (!empty($all_volunteers)) {
            foreach ($all_volunteers as $item) { ?> 
            <div class="col-lg-3 col-md-6 col-12 text-center">
                <div class="single-team-member <?php if( !empty( $item['volunteer_active'] ) && $item['volunteer_active'] == 'yes' ) : ?> active <?php endif; ?>">
                    <div class="member-img">
                        <img src="<?php echo esc_url($item['volunteer_img']['url']); ?>" alt="<?php echo esc_attr($item['volunteer_name']) ?>">
                        <div class="small-element"></div>
                    </div>
                    <div class="member-details">                            
                        <h3><?php echo esc_html($item['volunteer_name']) ?></h3>
                        <span><?php echo esc_html($item['volunteer_post']) ?></span>
                    </div>                        
                </div>                    
            </div>
            <?php } 
            } ?>
        </div>

        <?php if( !empty( $join_btn ) && $join_btn == 'yes' ) : ?>
        <div class="join-team-btn text-center mt-50">
            <a href="<?php echo esc_url($settings['join_btn_link']['url']); ?>"><?php echo esc_html($settings['join_btn_text']) ?></a>
        </div>
        <?php endif; ?>
    <?php
    }
}