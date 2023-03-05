
<section class="blog-card-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-40">
            <?php if (!empty($settings['heading'])) : ?>
                <div class="section-title">
                    <span><i class="fal fa-heart"></i><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
                    <h1><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h1>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="row">
        <?php
            $args = array(
                'post_type'             => 'post',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
            );
            $the_query = new \WP_Query($args);
            while ($the_query->have_posts()) : $the_query->the_post();

            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        ?>
        <div class="col-xl-4 col-md-6 col-12">
            <div class="single-blog-card">
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-img bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
                </div>
                <?php endif; ?>
                <div class="blog-details">
                    <span><i class="fal fa-calendar-alt"></i><?php the_time(get_option('date_format')); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_content(), $settings['content_length'], '') ?></p>
                    <?php if( 'yes' == $settings['show_read_more_btn']) : ?>
                    <a href="<?php the_permalink(); ?>" class="read-more-btn"><?php echo esc_html( $settings['read_more_txt'] ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>