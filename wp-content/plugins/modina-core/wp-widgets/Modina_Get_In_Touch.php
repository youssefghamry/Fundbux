<?php

class Modina_Get_In_Touch extends WP_Widget {

	public function __construct() {

		$widget_ops = array(
			'classname'      				=> 'site_info_widget',
			'description'      				=> __('This is a site info widgets.'),
			'customize_selective_refresh' 	=> true,
		);
		
		parent::__construct( 'get-in-touch', esc_html__( '(FundBux) Get In Touch', 'modina-core' ), $widget_ops );
	}

	public function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Get In Touch', 'modina-core' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$f_link   		= !empty( $instance['f_link'] ) ? $instance['f_link'] : '';
		$t_link   		= !empty( $instance['tw_link'] ) ? $instance['tw_link'] : '';
		$lin_link 		= !empty( $instance['ins_link'] ) ? $instance['ins_link'] : '';
		$y_link   		= !empty( $instance['you_link'] ) ? $instance['you_link'] : '';
		$d_link   		= !empty( $instance['dri_link'] ) ? $instance['dri_link'] : '';
		$in_link   		= !empty( $instance['linked_link'] ) ? $instance['linked_link'] : '';

        $phone1   = !empty( $instance['phone1'] ) ? $instance['phone1'] : '';
        $phone2   = !empty( $instance['phone2'] ) ? $instance['phone2'] : '';
        $email1   = !empty( $instance['email1'] ) ? $instance['email1'] : '';
        $email2   = !empty( $instance['email2'] ) ? $instance['email2'] : '';
        $address   = !empty( $instance['address'] ) ? $instance['address'] : '';

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
    ?>

        <div class="contact-us">
            <?php if($phone1) : ?>
            <div class="single-contact-info">
                <div class="icon">
                    <i class="fal fa-phone"></i>
                </div>
                <div class="contact-info">
                    <span><?php echo esc_html( $phone1 ); ?></span>
                    <?php if($phone2) : ?>
                        <span><?php echo esc_html( $phone2 ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if($email1) : ?>
            <div class="single-contact-info">
                <div class="icon">
                    <i class="fal fa-envelope"></i>
                </div>
                <div class="contact-info">
                    <span><?php echo esc_html( $email1 ); ?></span>
                    <?php if($email2) : ?>
                        <span><?php echo esc_html( $email2 ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if($address) : ?>
            <div class="single-contact-info">
                <div class="icon">
                    <i class="fal fa-map-marker-alt"></i>
                </div>
                <div class="contact-info pr-5 mr-5">
                    <span><?php echo htmlspecialchars_decode( esc_html( $address ) ); ?></span>
                </div>
            </div>
            <?php endif; ?>
        </div>

		<div class="social-link">
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
			<?php if(!empty($in_link)) : ?>
			<a target="_blank" href="<?php echo esc_url($in_link); ?>"><i class="fab fa-linkedin-in"></i></a>
			<?php endif; ?>
		</div>

	<?php echo $args['after_widget'];
	}

	public function form($instance) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$f_link   	= !empty( $instance['f_link'] ) ? $instance['f_link'] : '';
		$tw_link   	= !empty( $instance['tw_link'] ) ? $instance['tw_link'] : '';
		$ins_link 	= !empty( $instance['ins_link'] ) ? $instance['ins_link'] : '';
		$you_link   	= !empty( $instance['you_link'] ) ? $instance['you_link'] : '';
		$dri_link   	= !empty( $instance['dri_link'] ) ? $instance['dri_link'] : '';
		$linked_link   	= !empty( $instance['linked_link'] ) ? $instance['linked_link'] : '';


        $phone1   = !empty( $instance['phone1'] ) ? $instance['phone1'] : '';
        $phone2   = !empty( $instance['phone2'] ) ? $instance['phone2'] : '';
        $email1   = !empty( $instance['email1'] ) ? $instance['email1'] : '';
        $email2   = !empty( $instance['email2'] ) ? $instance['email2'] : '';
        $address   = !empty( $instance['address'] ) ? $instance['address'] : '';

	?>
        <div class="website_fields">
            <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Widget Title:', 'modina-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        </div>

        <div class="contact-info-wid-wrapper">
            <h3>Contact Info</h3>
            <div class="website_fields">
                <p>
                    <label for="<?php echo $this->get_field_id('phone1'); ?>"><?php esc_html_e( 'Phone Number 1:', 'modina-core' ); ?></label>
                    <input type="text" name="<?php echo $this->get_field_name('phone1'); ?>" value="<?php echo esc_html( $phone1 ); ?>" id="<?php echo $this->get_field_id('phone1'); ?>" class="widefat">
                </p>
            </div>
            <div class="website_fields">
                <p>
                    <label for="<?php echo $this->get_field_id('phone2'); ?>"><?php esc_html_e( 'Phone Number 2:', 'modina-core' ); ?></label>
                    <input type="text" name="<?php echo $this->get_field_name('phone2'); ?>" value="<?php echo esc_html( $phone2 ); ?>" id="<?php echo $this->get_field_id('phone2'); ?>" class="widefat">
                </p>
            </div>
            <div class="website_fields">
                <p>
                    <label for="<?php echo $this->get_field_id('email1'); ?>"><?php esc_html_e( 'Email Address 1:', 'modina-core' ); ?></label>
                    <input type="text" name="<?php echo $this->get_field_name('email1'); ?>" value="<?php echo esc_html( $email1 ); ?>" id="<?php echo $this->get_field_id('email1'); ?>" class="widefat">
                </p>
            </div>
            <div class="website_fields">
                <p>
                    <label for="<?php echo $this->get_field_id('email2'); ?>"><?php esc_html_e( 'Email Address 2:', 'modina-core' ); ?></label>
                    <input type="text" name="<?php echo $this->get_field_name('email2'); ?>" value="<?php echo esc_html( $email2 ); ?>" id="<?php echo $this->get_field_id('email2'); ?>" class="widefat">
                </p>
            </div>
            <div class="website_fields">
                <p>
                    <label for="<?php echo $this->get_field_id('address'); ?>"><?php esc_html_e( 'Office Address:', 'modina-core' ); ?></label>
                    <textarea name="<?php echo $this->get_field_name('address'); ?>" id="<?php echo $this->get_field_id('address'); ?>" class="widefat"><?php echo $address; ?></textarea>
                </p>
            </div>
        </div>
	
        <div class="social-icon-wrap" style="margin-top: 5px">
            <h3>Social Links</h3>
            <p>
                <label for="<?php echo $this->get_field_id('f_link'); ?>"><?php _e('Facebook Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('f_link'); ?>" value="<?php echo esc_url( $f_link); ?>" id="<?php echo $this->get_field_id('f_link'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>" value="<?php echo esc_url($tw_link); ?>" id="<?php echo $this->get_field_id('tw_link'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('ins_link'); ?>"><?php _e('Instagram Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('ins_link'); ?>" value="<?php echo esc_url($ins_link); ?>" id="<?php echo $this->get_field_id('ins_link'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('you_link'); ?>"><?php _e('Youtube Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('you_link'); ?>" value="<?php echo esc_url($you_link); ?>" id="<?php echo $this->get_field_id('you_link'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('linked_link'); ?>"><?php _e('LinkedIn Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('linked_link'); ?>" value="<?php echo esc_url($linked_link); ?>" id="<?php echo $this->get_field_id('linked_link'); ?>" class="widefat">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('dri_link'); ?>"><?php _e('Dribble Link', 'modina-core'); ?></label>
                <input type="text" name="<?php echo $this->get_field_name('dri_link'); ?>" value="<?php echo esc_url($dri_link); ?>" id="<?php echo $this->get_field_id('dri_link'); ?>" class="widefat">
            </p>
        </div>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['f_link'] = sanitize_url( $new_instance['f_link'] );
		$instance['tw_link'] = sanitize_url( $new_instance['tw_link'] );
		$instance['ins_link'] = sanitize_url( $new_instance['ins_link'] );
		$instance['you_link'] = sanitize_url( $new_instance['you_link'] );
		$instance['linked_link'] = sanitize_url( $new_instance['linked_link'] );
		$instance['dri_link'] = sanitize_url( $new_instance['dri_link'] );


        $instance['phone1'] = ( ! empty( $new_instance['phone1'] ) ) ? strip_tags( $new_instance['phone1'] ) : '';
        $instance['phone2'] = ( ! empty( $new_instance['phone2'] ) ) ? strip_tags( $new_instance['phone2'] ) : '';
        $instance['email1'] = ( ! empty( $new_instance['email1'] ) ) ? strip_tags( $new_instance['email1'] ) : '';
        $instance['email2'] = ( ! empty( $new_instance['email2'] ) ) ? strip_tags( $new_instance['email2'] ) : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		
		return $instance;
	}


}