<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WP_Query;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Modina_tribe_events extends Widget_Base
{

    public function get_name()
    {
        return 'modina_tribe_events';
    }

    public function get_title()
    {
        return esc_html__('Events Carousel - Tribe', 'modina-core');
    }

    public function get_icon()
    {
        return 'eicon-map-pin';
    }

    public function get_keywords()
    {
        return ['event', 'carousel', 'meeting', 'ticket', 'venue', 'fundbux'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'post_content_option',
            [
                'label' => __('Events Options', 'modina-core'),
            ]
        );

        $this->add_control(
            'post_limit',
            [
                'label' => __('How many Events want to show?', 'modina-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5,
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); 


    }

    protected function render() {

    $settings = $this->get_settings();
    $eventShow = !empty( $settings['post_limit'] );        
    ?>
    <section class="event-section event-carousel text-white">
        <div class="event-carousel-active owl-carousel">
        <?php  global $wp_query;
            $args = array (
                'post_type'              => array( 'tribe_events' ),
                'post_status'            => array( 'publish' ),
                'order'                  => 'ASC',                
            );

            // The Query
            $event = new \WP_Query($args);

            // The Loop
            if ( $event->have_posts() ) {
                while ( $event->have_posts() ) { 
                    $event->the_post();                                         
                ?> 
                <?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?> 
                    <div class="single-event-item bg-cover" style="background-image: url('<?php echo esc_url( $featured_img_url ); ?>')">
                        <div class="event-details">
                            <div class="event-date">
                                <span><?php echo tribe_get_start_date( get_the_ID(), false, 'd' ); ?></span><?php echo tribe_get_start_date( get_the_ID(), false, 'M' ); ?>
                            </div>
                            <div class="event-title">
                                <?php $terms = get_the_terms( get_the_ID() , 'tribe_events_cat' );
                                    if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term, 'tribe_events_cat');
                                            if (is_wp_error($term_link))
                                                continue;
                                            echo '<a href="' . $term_link . '" class="event-cat">' . esc_html( $term->name ) . '</a>';
                                        }
                                    }
                                ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h4>
                            </div>
                        </div>
                        <div class="event-hover d-flex">
                            <div class="event-time">
                                <i class="fal fa-clock"></i> <?php echo tribe_get_start_time ( get_the_ID(), 'g:i A' ); ?> - <?php echo tribe_get_end_time ( get_the_ID(), 'g:i A' ); ?>
                            </div>
                            <div class="event-author">
                                <i class="fal fa-user"></i><?php the_author_posts_link(); ?>
                            </div>
                        </div>
                    </div> <!-- ./single-event-item -->
                <?php endif; ?>
                
                <?php }

            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata(); ?>
        
        </div>
    </section>

    <script>
        (function ( $ ) {
            "use strict";
            $(document).ready( function() {
            
                if ($('.event-carousel-active').length > 0) {                
                    $(".event-carousel-active").owlCarousel({
                        autoWidth:true,
                        center: true,
                        loop: true,                                                               
                        responsive : {
                            // breakpoint from 0 up
                            0 : {
                                items: 1,                    
                            },
                            // breakpoint from 768 up
                            767 : {
                                items: 2,                    
                            },

                            991 : {
                                items: 3
                            },
                            
                            1300 : {
                                items: 4
                            },

                            // breakpoint from 992 up
                            1700 : {
                                items: <?php echo $eventShow; ?>
                            }
                        }
                    });                                        
                } 
                
            });
        }( jQuery ));
    </script>

    <?php

    }
}
