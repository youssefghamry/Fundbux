<section class="testimonial-area p-tb-132 grid-1230">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-header text-center style-7">
                    <h5 class="section-subtitle"><?php echo wp_kses_post( nl2br($settings['sub_title']) ); ?></h5>
                    <h3 class="section-title"><?php echo wp_kses_post(nl2br($settings['section_title'])); ?></h3>
                </div>
            </div>
        </div>
        <div class="testimmonial-wrap text-center">
            <div class="testimonial-slider style-5">
                <?php foreach ($testimonial_items as $item) : ?>
                <div>
                    <div class="testimonial-item">
                        <div class="slider-author">
                            <?php if ('' !=  $item['image']['url']) : ?>
                            <div class="author-thumb">
                                <img class="img-fluid" src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['name']); ?>" />
                            </div>
                            <?php endif; ?>
                            <div class="author-information">
                                <h5 class="author-name"><?php echo esc_attr($item['name']); ?></h5>
                                <span class="author-profession"><?php echo esc_attr($item['position']); ?></span>
                            </div>
                        </div>
                        <blockquote><?php echo esc_attr($item['feedback']); ?></blockquote>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>