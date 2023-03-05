<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class Modina_timeline extends Widget_Base {

    public function get_name() {
        return 'modina_timeline';
    }

    public function get_title() {
        return esc_html__( 'Timeline Carousel', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-time-line';
    }

    public function get_keywords() {
        return [ 'timeline', 'history', 'carousel', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'timeline_section',
            [
                'label' => esc_html__( 'Timeline Achieve', 'modina-core' ),
            ]
        );

        $this->add_control(
            'show_item',
            [
                'label' => esc_html__( 'How Many Item Show?', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 6,
				'step' => 1,
				'default' => 4,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'event_photo',
            [
                'label' => esc_html__( 'Event Image', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/1.jpg',
                ],              
            ]
        );

        $repeater->add_control(
            'event_year',
            [
                'label' => esc_html__( 'Event Year', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1998',
            ]
        );

        $repeater->add_control(
            'event_title',
            [
                'label' => esc_html__( 'Event Title', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Journey Was Started',
            ]
        );

        $this->add_control(
            'timeline_list',
            [
                'label' => esc_html__( 'All Events', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/1.jpg',
                        ],
                        'event_year'   => '1998',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/2.jpg',
                        ],
                        'event_year'   => '2008',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/3.jpg',
                        ],
                        'event_year'   => '2010',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/4.jpg',
                        ],
                        'event_year'   => '2016',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/1.jpg',
                        ],
                        'event_year'   => '1998',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/2.jpg',
                        ],
                        'event_year'   => '2008',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/3.jpg',
                        ],
                        'event_year'   => '2010',                        
                    ],
                    [
                        'event_photo' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/timeline/4.jpg',
                        ],
                        'event_year'   => '2016',                        
                    ],
                ],
                'title_field' => '{{{event_year}}}'
            ]
        );

        $this->end_controls_section();

       /**
         * Style Tab
         * @Title
         */

        $this->start_controls_section(
            'style_timeline_item', [
                'label' => esc_html__( 'Timeline Item Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            's_color_title', [
                'label' => esc_html__( 'Year Color', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline__item h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_service_title',
                'selector' => '{{WRAPPER}} .timeline__item h2',
            ]
        );

        $this->end_controls_section();
        
        //--------------- Style Section Padding ---------
        $this->start_controls_section(
            'section_padding',
            [
                'label' => esc_html__('Section Style', 'modina-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_img', [
                'label' => esc_html__( 'Section Background Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => plugin_dir_url(__DIR__) . 'assets/img/timeline-bg.png',
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
                    '{{WRAPPER}} .timeline-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $timeline_list = $settings['timeline_list'];

        ?>
        <?php if( !empty($timeline_list) ) : ?>
        <div class="timeline-wrap bg-cover section-padding" style="background-image: url('<?php echo esc_url($settings['bg_img']['url']); ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-md-0">
                        <div class="featured-timeline">
                            <div class="timeline">
                                <div class="timeline__wrap">
                                    <div class="timeline__items">
                                    <?php
                                    if (!empty($timeline_list)) {
                                    foreach ($timeline_list as $item) {?>
                                        <div class="timeline__item">
                                            <div class="timeline__content">
                                            <h2><?php echo esc_html($item['event_year']) ?></h2>
                                            <p>- <?php echo esc_html($item['event_title']) ?></p>
                                            <img src="<?php echo esc_url($item['event_photo']['url']); ?>" alt="event">
                                            </div>
                                        </div>
                                        <?php } 
                                    } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
                var timeline = '.timeline';
                if(timeline.length > 0) {                
                    $(timeline).timeline({
                        mode: 'horizontal',
                        visibleItems: <?php echo esc_html($settings['show_item']) ?>,
                        forceVerticalMode: 991 // 600px
                    });
                }                
            });
        }( jQuery ));
        </script>  

        <?php endif; ?>              
        <?php
    }
}