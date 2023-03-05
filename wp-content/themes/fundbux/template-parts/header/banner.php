<?php
$opt = get_option('fundbux_opt');
$page_slogan = isset( $opt['page_slogan'] ) ? $opt['page_slogan'] : '<strong>Our Mission:</strong> Food, Education, Medicine';
$is_breadcrumb = !empty($opt['is_breadcrumb']) ? $opt['is_breadcrumb'] : '';
?>

<section class="page-banner-wrap bg-cover">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <?php if ( class_exists('ReduxFrameworkPlugin') ) : ?> 
                    <div class="sub-title">
                        <h4><?php echo htmlspecialchars_decode( esc_html($page_slogan) ); ?></h4>
                    </div>
                    <?php endif; ?>
                    <div class="page-title">
                        <h1><?php fundbux_banner_title(); ?></h1>
                    </div>
                </div>
            </div>
            <?php if ( $is_breadcrumb == '1' ) :?>
            <div class="col-md-12 col-12 text-white mt-4">
                <nav aria-label="breadcrumb">
                    <?php if(function_exists('bcn_display')){
                        bcn_display();
                    }?>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
