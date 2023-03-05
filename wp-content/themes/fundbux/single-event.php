<?php
/**
 * The main template file
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

get_header();
$opt = get_option('fundbux_opt');

?>
    <section class="event-details-wrap section-padding">
        <div class="container">
            <?php 

            while ( have_posts() ) : the_post(); 
            
            $event_date = get_field('event_date');   
            $event_location = get_field('event_location'); 
            $event_start_time = get_field('event_start_time'); 
            $event_end_time = get_field('event_end_time'); 
            $event_mail_address = get_field('event_mail_address'); 
            $event_mobile_number = get_field('event_mobile_number'); 
            $guest_members = get_field('guest_members'); 
            $event_google_map = get_field('event_google_map'); 
            $event_ticket_link = get_field('event_ticket_link');  
            
            ?>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="event-fetaured-thumb">
                        <?php the_post_thumbnail('fundbux_1170x600'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="event-details-contents">
                        <?php the_content(); ?> 
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="event-details-sidebar">
                        <div class="single-event-sidebar wow fadeInUp">
                            <div class="sidebar-title">
                                <h3><?php echo esc_html__( 'Event Details', 'fundbux' ); ?></h3>
                            </div>

                            <div class="event-address-info">
                                <div class="single-address-info">
                                    <div class="icon icon1">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="address">
                                        <p><?php echo esc_html($event_start_time); ?> - <?php echo esc_html($event_end_time); ?></p>
                                    </div>
                                </div>
                                <div class="single-address-info">
                                    <div class="icon icon1">
                                        <i class="fal fa-calendar-alt"></i>
                                    </div>
                                    <div class="address">
                                        <p><?php echo htmlspecialchars_decode( esc_html( $event_date ) ); ?></p>
                                    </div>
                                </div>
                                <div class="single-address-info">
                                    <div class="icon icon1">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="address">
                                        <p><?php echo esc_html($event_location); ?></p>
                                    </div>
                                </div>
                                <div class="single-address-info">
                                    <div class="icon icon2">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="address">
                                        <p><?php echo esc_html($event_mail_address); ?></p>
                                    </div>
                                </div>
                                <div class="single-address-info">
                                    <div class="icon icon3">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="address">
                                        <p><?php echo esc_html($event_mobile_number); ?></p>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url($event_ticket_link); ?>" class="theme-btn minimal-btn"><?php echo esc_html__( 'Book A Seat', 'fundbux' ); ?></a>
                            </div>
                        </div>

                        <div class="single-event-sidebar wow fadeInUp">
                            <div class="sidebar-title">
                                <h3><?php echo esc_html__( 'Special Guest', 'fundbux' ); ?></h3>
                            </div>

                            <div class="special-guest-list">
                                <?php
                                if( have_rows('guest_members') ):
                                    while( have_rows('guest_members') ) : the_row();
                                    $guest_image = get_sub_field('guest_image');
                                    $guest_name = get_sub_field('guest_name');
                                    $guest_profession = get_sub_field('guest_profession');
                                    ?>
                                    <div class="single-guest-info">
                                        <div class="profile-img bg-cover" style="background-image: url('<?php echo esc_url($guest_image['url']); ?>')"></div>
                                        <div class="guest-bio">
                                            <h5><?php echo esc_html($guest_name); ?></h5>
                                            <span><?php echo esc_html($guest_profession); ?></span>
                                        </div>
                                    </div>
                                <?php endwhile; 
                                endif;
                                ?>
                            </div>
                        </div>
                        <?php if( !empty( $event_google_map ) ) : ?>
                        <div class="event-map-wrap wow fadeInUp">
                            <?php echo htmlspecialchars_decode( esc_attr( $event_google_map ) ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile;  ?> 
        </div>
    </section>

<?php
get_footer();
