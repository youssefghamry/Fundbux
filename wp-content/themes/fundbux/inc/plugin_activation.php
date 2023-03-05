<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'fundbux_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function fundbux_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
        array(
            'name'      => esc_html__('Elementor', 'fundbux'),
            'slug'      => 'elementor',
            'required'  => true,
        ),

        array(
            'name'               => esc_html__('Modina Core', 'fundbux'), // The plugin name.
            'slug'               => 'modina-core', // The plugin slug (typically the folder name).
            'source'             => get_template_directory().'/inc/tgm/plugins/modina-core.zip', // The plugin source.
            'required'           => true,
            'version'            => '1.0'
        ),

        array(
            'name'          => esc_html__( 'Advanced Custom Fields Pro', 'fundbux' ), // The plugin name.
            'slug'          => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
            'source'        => 'https://codexpeed.com/3rd-plugins/advanced-custom-fields-pro.zip', // The plugin source.
            'required'      => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name'      => esc_html__('Redux Framework', 'fundbux'),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__('Contact Form 7', 'fundbux'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        
        array(
            'name'      => esc_html__('Mailchimp for WordPress', 'fundbux'),
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
        ),
        
        array(
			'name'      => esc_html__('Breadcrumb Navxt','fundbux'),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),

        array(
            'name'      => esc_html__('Classic Editor','fundbux'),
            'slug'      => 'classic-editor',
            'required'  => false
        ),

        array(
            'name'      => esc_html__( 'GiveWP – Donation Plugin and Fundraising', 'fundbux' ),
            'slug'      => 'give',
            'required'  => true,
        ),
        
        array(
            'name'      => esc_html__('One Click Demo Import', 'fundbux'),
            'slug'      => 'one-click-demo-import',
            'required'  => false,
        ),
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
