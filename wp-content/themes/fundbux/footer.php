<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fundbux
 */

    $opt = get_option('fundbux_opt');
    
    $scrollup = isset( $opt['scrollup'] ) ? $opt['scrollup'] : '1';

    $footer_copyright_content = isset( $opt['footer_copyright_content'] ) ? $opt['footer_copyright_content'] : '<p>&copy; <b>FundBux </b> Charity Trust - 2021. All rights reserved.</p>';

    $footer_visibility = function_exists( 'get_field' ) ? get_field( 'footer_visibility' ) : '1';
    $footer_visibility = isset($footer_visibility) ? $footer_visibility : '1';

    $footerclass = function_exists( 'get_field' ) ? get_field( 'footerclass' ) : 'footer-1';
    $footerclass = isset($footerclass) ? $footerclass : 'footer-1';

    if ( !empty( $footerclass ) && $footerclass == 'footer2' ) {
        $footerclass = 'footer-2';
    } else {
        $footerclass = 'footer-1';
    }
?>

    <?php if( $footer_visibility  == '1' ) : ?>
    <footer class="<?php echo esc_attr( $footerclass ); ?> footer-wrap">
        <?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
        <div class="footer-widgets section-bg pt-60 pb-60">            
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer_widgets' ); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (!empty ($footer_copyright_content) ) : ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <div class="copyright-info">
                            <?php echo htmlspecialchars_decode( esc_html( $footer_copyright_content ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </footer>
    <?php endif; ?>
    
    <?php if( !empty( $scrollup ) && $scrollup  == '1' ) : ?>
        <a class="scroll-up" id="scrollUp" href="#"><i class="fal fa-angle-up"></i></a>
    <?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
