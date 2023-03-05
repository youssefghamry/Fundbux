<section class="testimonial-area p-tb-132">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-header style-2 text-center">
                    <?php if (!empty($settings['sub_title'])) : ?>
                    <h5 class="section-subtitle"><?php echo wp_kses_post(nl2br($settings['sub_title'])); ?></h5>
                    <?php endif; ?>
                    <h3 class="section-title"><?php echo wp_kses_post(nl2br($settings['section_title'])); ?></h3>
                </div>
            </div>
        </div>
        <div class="testimmonial-wrap text-center">
            <div class="testimonial-slider style-2">
                <?php foreach ($testimonial_items as $item) : ?>
                <div>
                    <div class="testimonial-item">
                        <blockquote><?php echo esc_attr($item['feedback']); ?></blockquote>
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
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

