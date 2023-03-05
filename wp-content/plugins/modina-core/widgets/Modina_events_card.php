<?php

namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use WP_Query;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Modina_events_card extends Widget_Base
{

    public function get_name()
    {
        return 'Modina_events_card';
    }

    public function get_title()
    {
        return esc_html__('Events Card', 'modina-core');
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
                'default' => 3,
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); 
    }

    protected function render() {

    $settings = $this->get_settings();
    ?>

        <div class="row">
        <?php 
            global $wp_query;

            $args = array (
                'post_type'              => array( 'event' ),
                'post_status'            => array( 'publish' ),
                'posts_per_page'        => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
            );
            // The Query
            $event = new \WP_Query($args);
            // The Loop
            if ( $event->have_posts() ) {
            while ( $event->have_posts() ) {  $event->the_post();  
                $event_date = get_field('event_date');   
                $event_location = get_field('event_location'); 
                $event_start_time = get_field('event_start_time'); 
                $event_end_time = get_field('event_end_time');                                       
            ?>
            <?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="single-event-card bg-cover" style=" background-image: url('<?php echo esc_url( $featured_img_url ); ?>'); ">
                    <div class="cat-name"> 
                        <?php $terms = get_the_terms( get_the_ID() , 'event_cat' );
                            if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {
                                foreach ($terms as $term) {
                                    $term_link = get_term_link($term, 'event_cat');
                                    if (is_wp_error($term_link))
                                        continue;
                                    echo '<a href="' . $term_link . '">' . esc_html( $term->name ) . '</a>';
                                }
                            }
                        ?> 
                    </div>
                    <div class="event-details">
                        <span><?php echo htmlspecialchars_decode( esc_attr( $event_date ) ); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title() , 40, ' ' ); ?></a></h3>
                        <p> <i class="fal fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?> </p>
                        <a href="<?php the_permalink(); ?>" class="buy-ticket"><i class="fal fa-chair"></i><?php echo esc_html__( 'Book Your Seat', 'fundbux' ); ?></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php }
            } else {
                // no posts found
            }
            // Restore original Post Data
            wp_reset_postdata(); ?>
        </div>

    <?php

    }
}
