<?php if (!empty($settings['heading'])) : ?>
<section class="video-section bg-cover section-padding" style="background-image: url('<?php echo esc_url($settings['video_bg_img']['url']); ?>')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 text-center text-lg-left">                
                <div class="section-title">
                    <span><i class="fal fa-heart"></i><?php echo htmlspecialchars_decode( esc_html( $settings['sub_heading'] ) ); ?></span>
                    <h2><?php echo htmlspecialchars_decode( esc_html($settings['heading']) ); ?></h2>
                </div>
            </div>
            <?php if (!empty($settings['video_link'])) : ?>
            <div class="col-lg-4 col-12 text-center text-lg-right offset-lg-1 mt-4 mt-lg-0">
                <div class="video-play-btn">
                    <a href="<?php echo esc_url($settings['video_link']); ?>" class="play-video popup-video"><i class="fas fa-play"></i></a>
                    <a href="<?php echo esc_url($settings['video_link']); ?>" class="popup-video play-text text-white text-capitalize pl-4"><?php echo esc_html($settings['video_btn_text']); ?></a>                       
                </div>                                       
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>