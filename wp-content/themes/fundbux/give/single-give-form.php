<?php
/**
 * The Template for displaying all single Give Forms.
 *
 * Override this template by copying it to yourtheme/give/single-give-forms.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();?>
<section class="cause-contents-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="cause-details-wrapper">
                    <?php  						
                    while ( have_posts() ) :
                        the_post();
                    
                        give_get_template_part( 'single-give-form/content', 'single-give-form' );
                    
                    endwhile; // end of the loop.
                    ?>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0 col-12">
            <?php if ( is_active_sidebar( 'give-forms-sidebar' ) ) { ?>
                <div class="casues-sidebar-wrapper">
                    <?php dynamic_sidebar( 'give-forms-sidebar' ); ?>
                </div>
            <?php } else { ?>
                <div class="main-sidebar">
                    <?php dynamic_sidebar( 'blog_sidebar' ); ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section> 
<?php 
get_footer();
