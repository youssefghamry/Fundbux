<?php

class Modina_About_Me extends WP_Widget {

	public function __construct() {

		$widget_ops = array(
			'classname'      				=> 'author_box_widegts',
			'description'      				=> __('This is an author info & social icon widgets.'),
			'customize_selective_refresh' 	=> true,
		);
		
		parent::__construct( 'author-box-widegt', esc_html__( '(FundBux) Author Box', 'modina-core' ), $widget_ops );
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'About Me', 'modina-core' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$author_img     = !empty( $instance['author_img'] ) ? $instance['author_img'] : '';
		$author_nam   = !empty( $instance['author_nam'] ) ? $instance['author_nam'] : '';
		$author_bio   = !empty( $instance['author_bio'] ) ? $instance['author_bio'] : '';
		$f_link   		= !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
		$t_link   		= !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';
		$lin_link 		= !empty( $instance['instragram_link'] ) ? $instance['instragram_link'] : '';
		$y_link   		= !empty( $instance['youtube_link'] ) ? $instance['youtube_link'] : '';
		$d_link   		= !empty( $instance['dribble_link'] ) ? $instance['dribble_link'] : '';

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
    ?>

		<div class="author-info text-center">
			<?php if($author_img) : ?>
			<div class="author-img" style="background-image: url('<?php echo esc_url($author_img); ?>');"></div>
			<?php endif; ?>
			<?php if($author_nam) : ?>
			<h4><?php echo esc_html( $author_nam ); ?></h4>
			<?php endif; ?>
			<?php if($author_bio) : ?>
			<p><?php echo esc_html( $author_bio ); ?></p>
			<?php endif; ?>

			<div class="social-profile">
				<?php if(!empty($f_link)) : ?>
	            <a target="_blank" href="<?php echo esc_url($f_link); ?>"><i class="fab fa-facebook-f"></i></a>
	            <?php endif; ?>
	            <?php if(!empty($lin_link)) : ?>
	            <a target="_blank" href="<?php echo esc_url($lin_link); ?>"><i class="fab fa-instagram"></i></a>
	            <?php endif; ?>
	            <?php if(!empty($t_link)) : ?>
	            <a target="_blank" href="<?php echo esc_url($t_link); ?>"><i class="fab fa-twitter"></i></a>
	            <?php endif; ?>
	            <?php if(!empty($y_link)) : ?>
	            <a target="_blank" href="<?php echo esc_url($y_link); ?>"><i class="fab fa-youtube"></i></a>
	            <?php endif; ?>
	            <?php if(!empty($d_link)) : ?>
	            <a target="_blank" href="<?php echo esc_url($d_link); ?>"><i class="fab fa-dribbble"></i></a>
	            <?php endif; ?>
			</div>
		</div>

	<?php echo $args['after_widget'];
	}

	public function form($instance) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$author_img   = !empty( $instance['author_img'] ) ? $instance['author_img'] : '';
		$author_nam   = !empty( $instance['author_nam'] ) ? $instance['author_nam'] : '';
		$author_bio   = !empty( $instance['author_bio'] ) ? $instance['author_bio'] : '';
		$facebook_link   	= !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
		$twitter_link   	= !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';
		$instragram_link 	= !empty( $instance['instragram_link'] ) ? $instance['instragram_link'] : '';
		$youtube_link   	= !empty( $instance['youtube_link'] ) ? $instance['youtube_link'] : '';
		$dribble_link   	= !empty( $instance['dribble_link'] ) ? $instance['dribble_link'] : '';
	?>
	
	<div class="website_fields" style="padding-top: 15px">
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Widget Title:', 'modina-core' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

	</div>
	
	<div class="website_fields" style="padding-top: 15px; margin-top: 10px">
		<button class="button" id="author_img">Image Upload</button>
		<input type="hidden" name="<?php echo $this->get_field_name('author_img'); ?>" value="<?php echo $author_img; ?>" class="img_link">
		<div class="show_img" style="margin-top: 20px">
			<img src="<?php echo esc_url($author_img); ?>" width="50%" height="auto">
		</div>
	</div>
	<div class="website_fields">
		<p>
			<label for="<?php echo $this->get_field_id('author_nam'); ?>"><?php _e('Author Name', 'modina-core'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('author_nam'); ?>" value="<?php echo esc_html( $author_nam ); ?>" id="<?php echo $this->get_field_id('author_nam'); ?>" class="widefat">
		</p>
	</div>
	<div class="website_fields">
		<p>
			<label for="<?php echo $this->get_field_id('author_bio'); ?>"><?php _e('Author Info', 'modina-core'); ?></label>
			<textarea name="<?php echo $this->get_field_name('author_bio'); ?>" id="<?php echo $this->get_field_id('author_bio'); ?>" class="widefat"><?php echo $author_bio; ?></textarea>
		</p>
	</div>
	<p>
		<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook Link', 'modina-core'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_url( $facebook_link); ?>" id="<?php echo $this->get_field_id('facebook_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Twitter Link', 'modina-core'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_url($twitter_link); ?>" id="<?php echo $this->get_field_id('twitter_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('instragram_link'); ?>"><?php _e('Instagram Link', 'modina-core'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('instragram_link'); ?>" value="<?php echo esc_url($instragram_link); ?>" id="<?php echo $this->get_field_id('instragram_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('youtube_link'); ?>"><?php _e('Youtube Link', 'modina-core'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('youtube_link'); ?>" value="<?php echo esc_url($youtube_link); ?>" id="<?php echo $this->get_field_id('youtube_link'); ?>" class="widefat">
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('dribble_link'); ?>"><?php _e('Dribble Link', 'modina-core'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('dribble_link'); ?>" value="<?php echo esc_url($dribble_link); ?>" id="<?php echo $this->get_field_id('dribble_link'); ?>" class="widefat">
	</p>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['author_nam'] = ( ! empty( $new_instance['author_nam'] ) ) ? strip_tags( $new_instance['author_nam'] ) : '';
		$instance['author_bio'] = ( ! empty( $new_instance['author_bio'] ) ) ? strip_tags( $new_instance['author_bio'] ) : '';
		$instance['author_img'] = sanitize_url( $new_instance['author_img'] );
		$instance['facebook_link'] = sanitize_url( $new_instance['facebook_link'] );
		$instance['twitter_link'] = sanitize_url( $new_instance['twitter_link'] );
		$instance['instragram_link'] = sanitize_url( $new_instance['instragram_link'] );
		$instance['youtube_link'] = sanitize_url( $new_instance['youtube_link'] );
		$instance['dribble_link'] = sanitize_url( $new_instance['dribble_link'] );
		
		return $instance;
	}


}

add_action('admin_enqueue_scripts', 'website_admin_custom_script');
add_action('wp_enqueue_scripts', 'website_admin_custom_script');

function website_admin_custom_script() {

	wp_enqueue_media();

	wp_register_script('admin-custom-js', plugin_dir_url(__DIR__).'/assets/js/admin-custom.js', 'jquery');

	wp_enqueue_script('admin-custom-js');

}