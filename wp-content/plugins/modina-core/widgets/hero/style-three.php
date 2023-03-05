<section class="hero-slider hero-style-1 hero-style-3">
    <div class="hero-slider-active hero-3 owl-carousel">
    <?php if (!empty($hero_slides)) { $i = 0;
    foreach ($hero_slides as $item) { $i++; ?>
        <div class="single-slide" style="background-image: url('<?php echo esc_url($item['hero_image']['url']); ?>')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 text-lg-left col-12">
                        <div class="slide-contents text-white">
                            <div class="sub-title">
                                <h4><?php echo htmlspecialchars_decode(esc_html($item['hero_subtitle'])); ?></h4>
                            </div>
                            <h2 class="fs-lg"><?php echo htmlspecialchars_decode(esc_html($item['hero_subtitle'])); ?></h2>
                            <a href="<?php echo esc_url($item['btn_link1']['url']); ?>" <?php modina_is_external($item['btn_link1']); ?> <?php modina_is_nofollow($item['btn_link1']); ?> class="theme-btn"><?php echo esc_html( $item['button_text1'] ) ?></a>
                            <a href="<?php echo esc_url($item['btn_link2']['url']); ?>" <?php modina_is_external($item['btn_link2']); ?> <?php modina_is_nofollow($item['btn_link2']); ?> class="theme-btn no-fil"><?php echo esc_html( $item['button_text2'] ) ?></a>
                        </div>
                    </div>
                    <?php if( !empty( $item['video_link'] ) ) : ?>
                    <div class="col-lg-2 offset-lg-1 col-12 text-xl-right">
                        <div class="video-play-btn mt-80 mt-lg-0">
                            <a href="<?php echo esc_url($item['video_link']); ?>" class="play-video popup-video"><i class="fas fa-play"></i></a>                     
                        </div> 
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php }
        } ?>
    </div>
</section>
