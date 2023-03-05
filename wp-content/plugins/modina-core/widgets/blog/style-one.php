<section class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-50">
                <?php if (!empty($settings['heading'])) : ?>
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i><?php echo htmlspecialchars_decode(esc_html($settings['sub_heading'])); ?></span>
                        <h1><?php echo htmlspecialchars_decode(esc_html($settings['heading'])); ?></h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 pr-3 pl-3 pr-lg-5">
                <div class="blog-card">
                    <?php
                        global $post;
                        $args = array(
                            'post_type'             => 'post',
                            'post_status'           => 'publish',
                            'ignore_sticky_posts'   => 1,
                            'posts_per_page'        => 1,
                        );
                        $the_query = new \WP_Query($args);
                        while ($the_query->have_posts()) : $the_query->the_post();

                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                        $do_not_duplicate = $post->ID;
                    ?>
                    <div class="single-blog-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-img bg-cover" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
                        </div>
                        <?php endif; ?>
                        <div class="post-content">
                            <div class="post-meta d-flex">
                                <div class="post-author">
                                    <i class="fal fa-user"></i><?php echo esc_html__( 'By', 'modina-core' ); ?> <?php the_author_posts_link(); ?>
                                </div>
                                <div class="post-cat">
                                    <i class="fal fa-tags"></i>
                                    <?php the_category( ' , ' ); ?>
                                </div>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="blog-list-view">
                    <?php
                        $args = array(
                            'post_type'             => 'post',
                            'post_status'           => 'publish',
                            'ignore_sticky_posts'   => 1,
                            'posts_per_page'        => !empty($settings['post_limit']) ? $settings['post_limit'] : 3,
                        );
                        $the_query = new \WP_Query($args);
                        while ($the_query->have_posts()) : $the_query->the_post();
                        if( $post->ID == $do_not_duplicate ) continue;

                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    ?>
                    <div class="single-blog-item">
                        <div class="post-date">                            
                            <span><?php the_time( 'j' ); ?></span><?php the_time( 'F' ); ?>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <div class="post-author">
                                    <i class="fal fa-user"></i><?php echo esc_html__( 'By', 'modina-core' ); ?> <?php the_author_posts_link(); ?>
                                </div>
                                <div class="post-cat">
                                    <i class="fal fa-tags"></i>
                                    <?php the_category( ' , ' ); ?>
                                </div>
                            </div>

                            <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_content(), $settings['content_length'], '') ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

    </div>
</section>  