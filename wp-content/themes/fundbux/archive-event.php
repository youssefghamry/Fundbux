<?php
    /**
     * Template Name: Events
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Fundbux
     */

    global $wp_query;

    get_header();
    $opt = get_option('fundbux_opt');

    $event_cats = get_terms(array(
        'taxonomy' => 'event_cat',
        'hide_empty' => true
    ));

?>

<section class="upcoming-events-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="event-cat-filter mb-20">
                        <button data-filter="*" class="active"><?php echo esc_html__('All Categories', 'fundbux') ?></button>
                        <?php
                        foreach ($event_cats as $event_cat) :
                            ?>
                            <button data-filter=".<?php echo esc_attr( $event_cat->slug ); ?>">
                                <?php echo esc_html( $event_cat->name ); ?>
                            </button>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>

            <div class="row grid">
                <?php // WP_Query arguments
                    // The Query
                    $args = array (
                        'post_type'              => array( 'event' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => 9,
                        'paged'                  => $paged,
                    );

                    $events = new WP_Query( $args );

                    while ($events->have_posts()) : $events->the_post();
                        $event_date = get_field('event_date');   
                        $event_location = get_field('event_location'); 
                        $cats = get_the_terms(get_the_ID(), 'event_cat');
                        $cat_slug = '';
                        if(is_array($cats)) {
                            foreach ($cats as $cat) {
                                $cat_slug .= $cat->slug.' ';
                            }
                        }  
                    ?>
                    <div class="col-12 col-lg-6 col-xl-12 <?php echo esc_attr($cat_slug); ?> grid-item">
                        <div class="single-event-ticket d-flex align-items-center">
                            <div class="col-xl-4">
                                <?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                <div class="event-featured-cover bg-cover" style="background-image: url('<?php echo esc_url( $featured_img_url ); ?>')">
                                    <div class="event-time-address">
                                        <span><i class="fal fa-calendar-alt"></i><?php echo esc_html( $event_date ); ?></span>
                                        <span><i class="fal fa-map-marker-alt"></i><?php echo esc_html( $event_location ); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-5 pr-xl-0">
                                <div class="event-info">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                                </div>
                            </div>
                            <div class="col-xl-3 text-xl-right">
                                <div class="event-ticket-buy">
                                    <a href="<?php the_permalink(); ?>" class="ticket-buy-btn"><i class="fal fa-home"></i><?php echo esc_html__( 'Book A Seat', 'fundbux' ); ?></a>
                                </div>
                            </div>
                        </div> <!-- single-event-ticket -->
                    </div> 
                        
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?> 
            
            </div>
        </div>
    </section>

<?php
get_footer();
