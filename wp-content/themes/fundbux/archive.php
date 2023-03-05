<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fundbux
 */


get_header();
$blog_column = is_active_sidebar( 'blog_sidebar' ) ? '8' : '12';
$opt = get_option('fundbux_opt');
$blog_layout_style = isset( $opt['blog_layout_style'] ) ? $opt['blog_layout_style'] : '';

?>

    <section class="blog-wrapper news-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-<?php echo esc_attr($blog_column) ?> <?php
                if(!empty($blog_layout_style) && $blog_layout_style == '2') :  ?> order-xl-2 order-1<?php endif;?>">
                    <div class="blog-posts">
                        <?php
                        while ( have_posts() ) : the_post();
                            get_template_part('template-parts/content/content', get_post_format());
                        endwhile;
                        ?>                        
                    </div>
                    <div class="page-nav-wrap mt-60 text-center">
                        <?php fundbux_pagination(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>                
            </div>
        </div>
    </section>

<?php
get_footer();
