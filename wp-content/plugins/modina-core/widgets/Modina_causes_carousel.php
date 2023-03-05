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

class Modina_causes_carousel extends Widget_Base {

    public function get_name() {
        return 'modina_causes_carousel';
    }

    public function get_title() {
        return esc_html__( 'Causes Carousel - Donations', 'modina-core' );
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
            'default' => 'Popular Causes',
        ]
    );

    $this->add_control(
        'color_heading', [
            'label' => esc_html__( 'Heading Color', 'modina-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'color_heading_span', [
            'label' => esc_html__( 'Heading Span Color', 'modina-core' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section-title h2 span' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(), [
            'name' => 'typography_heading',
            'selector' => '{{WRAPPER}} .section-title h2',
        ]
    );

    $this->end_controls_section(); 

    // ------------------- Sub Title Section  -----------------------//
    $this->start_controls_section(
        'section_sub_heading',
        [
            'label' => esc_html__( 'Section Sub Heading', 'modina-core' ),
        ]
    );

    $this->add_control(
        'section_icon',
        [
            'label' => __( 'Choice Icon', 'modina-core' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'far fa-heart',
            ],
        ]
    );

    $this->add_control(
        'sub_heading',
        [
            'label' => esc_html__( 'Sub Heading', 'modina-core' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => 'Trending Cause',
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
            'default' => 9,
            'separator' => 'before',
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
                '{{WRAPPER}} .popular-cause-section.section-padding' => 'background: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'sec_padding', [
            'label' => esc_html__( 'Section Padding', 'modina-core' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .popular-cause-section.section-padding' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    ?>
    <section class="popular-cause-section section-padding pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 text-left mb-40">
                <?php if (!empty($settings['heading'])) : ?>
                    <div class="section-title text-<?php echo esc_attr( $settings['text_align'] ); ?>">
                        <span><?php \Elementor\Icons_Manager::render_icon( $settings['section_icon'] ); ?><?php echo htmlspecialchars_decode( esc_html($settings['sub_heading']) ); ?></span>
                        <h2><?php echo htmlspecialchars_decode( esc_html($settings['heading']) ); ?></h2>
                    </div>
                <?php endif; ?>
                </div>
                <div class="col-4 text-right mb-40">
                    <div class="cause-carousel-nav"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="popular-cause-carousel-active owl-carousel owl-theme mt-40">
                    <?php // WP_Query arguments
                        global $wp_query;
                        $args = array (
                            'post_type'              => array( 'give_forms' ),
                            'post_status'            => array( 'publish' ),
                            'order'                  => 'ASC',
                            'orderby'                => 'menu_order',
                            'posts_per_page'         => !empty($settings['post_limit']) ? $settings['post_limit'] : 9,        
                        );

                        // The Query
                        $causes = new \WP_Query($args);

                        // The Loop
                        if ( $causes->have_posts() ) {
                            while ( $causes->have_posts() ) { $causes->the_post(); 
                                
                                $stats = give_goal_progress_stats( get_the_ID() );
                                if ( $stats['raw_actual'] != 0 ) {
                                    $bar_width = $stats['goal'] ? (int) ( $stats['raw_actual'] / $stats['raw_goal'] * 100 ) : 0;
                                }
                            
                                $lack_value = give_format_amount( $stats['raw_goal'] - $stats['raw_actual'] );
                            
                                if ( 'amount' === $stats['format'] ) {
                                    $lack_amount = give_currency_filter( $lack_value );
                                } else {
                                    $lack_amount = $lack_value;
                                }                                                                               
                                ?>
                                <div class="single-cause-item style-2">
                                    <?php 
                                        if ( has_post_thumbnail() ) :
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
                                    ?> 
                                    <div class="cause-featured-img bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
                                    <?php $terms = get_the_terms( get_the_ID() , 'give_forms_category' );
                                    if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term, 'give_forms_category');
                                            if (is_wp_error($term_link))
                                                continue;
                                            echo '<a href="' . $term_link . '" class="cause-cat">' . $term->name . '</a>';
                                        }
                                    }
                                    ?>
                                        <?php if ( $stats['raw_actual'] != 0 ) : ?>
                                        <div class="donate-progress-bar wow fadeInLeft" data-wow-duration="2s"
                                            data-percentage="<?php echo $bar_width; ?>%">
                                            <div class="progress-title-holder clearfix"> <span class="progress-number-wrapper">
                                                    <span class="progress-number-mark"> <span class="percent"></span> <span
                                                            class="down-arrow"></span> </span> </span> </div>
                                            <div class="progress-content-outter">
                                                <div class="progress-content"></div>
                                            </div>
                                        </div>
                                        <?php endif; ?> 
                                    </div>
                                    <?php endif; ?>
                                    <div class="cause-details">
                                        <div class="cause-amount d-flex justify-content-between">
                                            <div class="price-raised"> <i class="fal fa-heart"></i><span><?php echo $bar_width; ?></span> <?php echo esc_html__( 'Raised', 'modina-core' ); ?></div>
                                            <div class="price-goal"> <i class="far fa-analytics"></i><span><?php echo $stats['goal']; ?></span> <?php echo esc_html__( 'Goal', 'modina-core' ); ?>
                                            </div>
                                        </div>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="cause-btns"> 
                                            <a href="<?php the_permalink(); ?>" class="theme-btn minimal-btn"><i class="fal fa-heart"></i> <?php echo esc_html__( 'Donate Now', 'modina-core' ); ?></a> 
                                            <a href="<?php the_permalink(); ?>" class="cause-share-link"><i class="fal fa-share"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }

                        } else {
                            // no posts found
                        }

                        // Restore original Post Data
                        wp_reset_postdata(); ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
            
                if($('.popular-cause-carousel-active').length > 0) {

                    $(".popular-cause-carousel-active").owlCarousel({        
                        margin: 30,      
                        dots: false,
                        loop: true,
                        autoplayTimeout: 8000,
                        autoplay:true,
                        nav: true,
                        navText: ['<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>'],
                        navContainer: '.popular-cause-section .cause-carousel-nav',   
                        responsive : {
                            // breakpoint from 0 up
                            0 : {
                                items: 1
                            },
                            767 : {
                                items: 2
                            },                
                            // breakpoint from 992 up
                            1191 : {
                                items: 3
                            }
                        }
                    });

                    $('.donate-progress-bar').each(function() {
                        $(this).find('.progress-content').animate({
                        width:$(this).attr('data-percentage')
                        },2000);
                        
                        $(this).find('.progress-number-mark').animate(
                        {left:$(this).attr('data-percentage')},
                        {
                        duration: 2000,
                        step: function(now, fx) {
                            var data = Math.round(now);
                            $(this).find('.percent').html(data + '%');
                        }
                        });  
                    }); 
                }    

            });
        }( jQuery ));
    </script>
    <?php
    }
}
