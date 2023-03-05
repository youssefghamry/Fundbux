<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_about_us extends Widget_Base {

    public function get_name() {
        return 'Modina_about_us';
    }

    public function get_title() {
        return esc_html__( 'About Us', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-single-post';
    }

    public function get_keywords() {
        return [ 'about', 'us', 'fundbux', 'title', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {              

        // About Image
        $this->start_controls_section(
            'img_section',
            [
                'label' => esc_html__( 'About Images', 'modina-core' ),
            ]
        );

        $this->add_control(
            'big_img', [
                'label' => esc_html__( 'Big Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/about_girl.jpg',
                ],
            ]
        );

        $this->add_control(
            'small_img', [
                'label' => esc_html__( 'Small Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/about_woman.jpg',
                ],
            ]
        );

        $this->end_controls_section();

        // Years Of Experience

        $this->start_controls_section(
            'year_sec',
            [
                'label' => esc_html__( 'Years Of Experience', 'modina-core' ),
            ]
        );

        $this->add_control(
            'year_digit',
            [
                'label' => esc_html__( 'Enter Your Years', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 32,
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
                'default' => 'We’ve Funded <span>44k</span> Dollars Over',
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
                'label' => esc_html__( 'Text Content', 'modina-core' ),
            ]
        );

        $this->add_control(
            'section_text',
            [
                'label' => esc_html__( 'Text', 'modina-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Your $40.00 monthly donation can give 12 people clean water every year. 100% funds water projects. We have plenty of water to drink even.',
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
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->end_controls_section(); 


        // ----- Item List ---------//
        $this->start_controls_section(
            'features_sec',
            [
                'label' => esc_html__( 'Our Features List', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__( 'Features Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'A place in history',
            ]
        );

        $this->add_control(
            'all_features',
            [
                'label' => esc_html__( 'All Features', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title'   => 'A place in history',
                    ],                    
                    [
                        'feature_title'   => 'It’s about impact, goodness',
                    ],                    
                    [
                        'feature_title'   => 'More goodness in the world',
                    ],                    
                    [
                        'feature_title'   => 'The world we live in right now<br/>can be hard',
                    ],                    
                ],

                'title_field' => '{{{feature_title}}}'
            ]
        );

        $this->end_controls_section();  

        $this->start_controls_section(
            'section_btn',
            [
                'label' => esc_html__( 'Button', 'modina-core' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Learn More',                
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => __( 'https://', 'modina-core' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
					'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_tab', [
                'label' => esc_html__( 'Section Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg_color', [
                'label'   => esc_html__( 'Section Background Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about-us-section.section-padding' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-us-section.section-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    $all_features = $settings['all_features'];

    ?>
    <?php if (!empty($settings['heading'])) : ?>
    <section class="about-us-section section-padding pt-235 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-shots">
                        <div class="about-top-img bg-cover" style="background-image: url('<?php echo esc_url($settings['small_img']['url']); ?>')"></div>
                        <div class="about-main-img">
                            <img src="<?php echo esc_url($settings['big_img']['url']); ?>" alt="" class="img-fluid">
                        </div>
                        <div class="our-experience text-white d-none d-sm-block">
                            <h2><?php echo esc_html($settings['year_digit']) ?></h2>
                            <span><?php echo esc_html__( 'Years Of Experience', 'modina-core' ); ?></span>                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about_left_content pr-lg-0 pl-lg-5 text-<?php echo esc_attr( $settings['text_align'] ); ?>">                    
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
                        <h2><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h2>
                    </div>
                    <?php if (!empty($settings['section_text'])) : ?>
                        <p><?php echo htmlspecialchars_decode(esc_html($settings['section_text'])); ?></p>
                    <?php endif; ?>                    

                    <ul class="checked-list ml-80 mt-30">
                    <?php if (!empty($all_features)) {
                        foreach ($all_features as $item) { ?>                        
                        <li><?php echo htmlspecialchars_decode(esc_html($item['feature_title'])); ?></li>
                        <?php }
                    } ?>
                    </ul>

                    <a href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php modina_is_external($settings['btn_link']); ?> <?php modina_is_nofollow($settings['btn_link']); ?> class="theme-btn minimal-btn ml-80 mt-35"><?php echo esc_html( $settings['button_text'] ) ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    }
}