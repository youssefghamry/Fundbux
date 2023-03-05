<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_contact_card extends Widget_Base {

    public function get_name() {
        return 'modina_contact_card';
    }

    public function get_title() {
        return esc_html__( 'Contact Info Card', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_keywords() {
        return [ 'contact', 'us', 'message', 'mail', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {


        // ----- setp Item Box ---------//
        $this->start_controls_section(
            'contact_info_card_sec',
            [
                'label' => esc_html__( 'Contact Info Card', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();
    
        $repeater->add_control(
            'icon',
            [
                'label' => __( 'Choose Icon', 'modina-core' ),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'far fa-envelope',
                    'library' => 'regular',
                ],
            ]
        );

        $repeater->add_control(
            'contact_title',
            [
                'label' => esc_html__( 'Contact Heading', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Email Address',
            ]
        );

        $repeater->add_control(
            'contact_sub_title',
            [
                'label' => esc_html__( 'Contact Sub Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Sent mail asap anytime',
            ]
        );

        $repeater->add_control(
            'contact_info',
            [
                'label' => esc_html__( 'Contact Info', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'info@example.com <br> jobs@example.com',
            ]
        );

        $this->add_control(
            'contact_cards',
            [
                'label' => esc_html__( 'Contct Card Items', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icon' => [
                            'value' => 'far fa-envelope',
                        ],
                        'contact_title'   => 'Email Address',
                        'contact_sub_title'   => 'Sent mail asap anytime',
                        'contact_info'   => 'info@example.com <br> jobs@example.com',
                    ],

                    [
                        'icon' => [
                            'value' => 'far fa-phone',
                        ],
                        'contact_title'   => 'Phone Number',
                        'contact_sub_title'   => 'call us asap anytime',
                        'contact_info'   => '098-098-098-09 <br> +(098) 098-098-765',
                    ],

                    [
                        'icon' => [
                            'value' => 'far fa-map-marker-alt',
                        ],
                        'contact_title'   => 'Office Address',
                        'contact_sub_title'   => 'welcome to our house',
                        'contact_info'   => 'B2, Miranda City Tower <br> New York, US',
                    ],
                ],

                'title_field' => '{{{contact_title}}}'
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'item_style_tab', [
                'label' => esc_html__( 'Card Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_title_color', [
                'label' => esc_html__( 'Card Title Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_item_title',
                'selector' => '{{WRAPPER}} .single-contact-card h4',
            ]
        );

        $this->add_control(
            'item_text_color', [
                'label'   => esc_html__( 'Card Text Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card p, .single-contact-card span' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'item_icon_color', [
                'label'   => esc_html__( 'Card Icon Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .top-part .icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_icon_bg_color', [
                'label'   => esc_html__( 'Card Icon Circle Background', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card .top-part .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_card_bg_color', [
                'label'   => esc_html__( 'Card Background Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-contact-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

    $settings = $this->get_settings();
    $contact_cards = $settings['contact_cards'];
    ?>
        <div class="row">
            <?php if (!empty($contact_cards)) {
            $i = 0;
            foreach ($contact_cards as $item) { $i++; ?>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-contact-card card<?php echo $i; ?>">
                    <div class="top-part">
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="title">
                            <h4><?php echo wp_kses_post(nl2br($item['contact_title'])); ?></h4>
                            <span><?php echo wp_kses_post(nl2br($item['contact_sub_title'])); ?></span>
                        </div>
                    </div>
                    <div class="bottom-part">                            
                        <div class="info">
                            <p><?php echo wp_kses_post(nl2br($item['contact_info'])); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fal fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        </div>
    <?php
    }
}