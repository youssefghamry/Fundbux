<?php

$allowed_html = array(
	'a' => array(
		'href' => array(),
		'title' => array()
	),
	'br' => array(),
	'em' => array(),
	'strong' => array(),
    'iframe' => array(
        'src' => array(),
    )
);

$opt = get_option( 'fundbux_opt' );
$is_post_meta = isset($opt['is_post_meta']) ? $opt['is_post_meta'] : '1';
$share_options = isset($opt['is_social_share']) ? $opt['is_social_share'] : '0';
$share_heading = isset($opt['share_heading']) ? $opt['share_heading'] : '';
$is_post_author = isset($opt['is_post_author']) ? $opt['is_post_author'] : '1';
$is_post_cat = isset($opt['is_post_cat']) ? $opt['is_post_cat'] : '1';
?>
<div <?php post_class( 'single-blog-post post-details' ); ?> id="post-<?php the_ID(); ?>">
    <div class="post-content">
        <?php if ( $is_post_cat === '1' ) : ?>
            <div class="post-cat">
                <?php $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                    }
                    echo trim( $output, $separator );
                } ?>
            </div>
        <?php endif; ?>
        <?php if ( $is_post_meta === '1' ) : ?>
        <div class="post-meta">
            <span><i class="fal fa-comments"></i><?php comments_number( 'no responses', 'one Comment', '% Comments' ); ?></span>
            <span><i class="fal fa-calendar-alt"></i><?php the_time( get_option('date_format') ); ?></span>
        </div>
        <?php endif; ?>
        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links mt-3"><span class="page-link-label">' . esc_html__( 'Pages:', 'fundbux' ) . '</span>',
                'after'  => '</div>',
            ) );
        ?>     
    </div>
</div>

<?php if( has_tag() ) : ?>
<div class="row tag-share-wrap">
    <div class="col-lg-<?php echo esc_attr(($share_options == '1') ? '6' : '12'); ?> post-tags col-12">
        <h4 class="d-line-block mr-1"><?php echo esc_html__('Tags:', 'fundbux') ?></h4>
        <?php the_tags( '', '', '' ); ?>
    </div>
    <?php if( !empty( $share_options ) && $share_options == '1' ) : ?>
    <div class="col-lg-6 col-12 text-lg-right">
        <h4><?php echo esc_html($share_heading); ?></h4>
        <div class="social-share">
            <?php echo fundbux_post_share(); ?>
        </div>
    </div>
    <?php endif; ?>
    <hr>
</div>
<?php endif; ?>