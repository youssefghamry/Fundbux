<div class="container">
    <div class="row">
    <?php // WP_Query arguments
        global $wp_query;
        $args = array (
            'post_type'              => array( 'give_forms' ),
            'post_status'            => array( 'publish' ),
            'order'                  => 'ASC',
            'orderby'                => 'menu_order',
            'posts_per_page'         => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,        
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
                <div class="col-md-6 col-lg-4">
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
                                <div class="price-goal"> <i class="fal fa-analytics"></i><span><?php echo $stats['goal']; ?></span> <?php echo esc_html__( 'Goal', 'modina-core' ); ?>
                                </div>
                            </div>
                            <h4> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="cause-btns"> 
                                <a href="<?php the_permalink(); ?>" class="theme-btn minimal-btn"><i class="fal fa-heart"></i> <?php echo esc_html__( 'Donate Now', 'modina-core' ); ?></a> 
                                <a href="<?php the_permalink(); ?>" class="cause-share-link"><i class="fal fa-share"></i></a>
                            </div>
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
<script>
    (function ( $ ) {
        "use strict";
        $(document).ready( function() {

            if($('.donate-progress-bar').length > 0) {
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