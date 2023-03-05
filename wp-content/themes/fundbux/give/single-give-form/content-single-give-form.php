<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fires in single form template, before the form.
 *
 * Allows you to add elements before the form.
 *
 * @since 1.0
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

	<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>

		<?php
		// Featured Thumbnail
		if ( has_post_thumbnail() ) {

			$image_size = give_get_option( 'featured_image_size' );
			$image      = get_the_post_thumbnail( $post->ID, apply_filters( 'single_give_form_large_thumbnail_size', ( ! empty( $image_size ) ? $image_size : 'large' ) ) );

			echo apply_filters( 'single_give_form_image_html', $image );

		} else {

			// Placeholder Image
			echo apply_filters( 'single_give_form_image_html', sprintf( '<img src="%s" alt="%s" />', give_get_placeholder_img_src(), esc_attr__( 'Placeholder', 'fundbux' ) ), $post->ID );

		}
		?>

		<?php
		/**
		 * Fires in single form template, to the form summary.
		 *
		 * Allows you to add elements to the form summary.
		 *
		 * @since 1.0
		 */
		do_action( 'give_single_form_summary' );
		?>

		<?php
		/**
		 * Fires in single form template, after the form summary.
		 *
		 * Allows you to add elements after the form summary.
		 *
		 * @since 1.0
		 */
		do_action( 'give_after_single_form_summary' );
		?>

	</div><!-- #give-form-<?php the_ID(); ?> -->

	<?php
		/**
		 * Fires in single form template, after the form.
		 *
		 * Allows you to add elements after the form.
		 *
		 * @since 1.0
		 */
		do_action( 'give_after_single_form' );
	?>
