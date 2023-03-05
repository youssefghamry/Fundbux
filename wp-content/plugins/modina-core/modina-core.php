<?php
/**
 * Plugin Name: Modina Core
 * Plugin URI: https://themeforest.net/user/modinatheme/portfolio
 * Description: This plugin adds the core features to the Fundbux WordPress Theme. This plugin is toolkit for theme. you must install it & active.
 * Version: 1.0
 * Author: Modina Theme
 * Author URI: https://themeforest.net/user/modinatheme/portfolio
 * Text domain: modina-core
 */

if ( !defined('ABSPATH') )
    die('-1');


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Modina_Core' ) ) {
	/**
	 * Main Modnia Core Class
	 *
	 * The main class that initiates and runs the Modnia Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class Modina_Core {
		/**
		 * Modnia Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Plugin's directory paths
         * @since 1.0
         */
        const CSS = null;
        const JS = null;
        const IMG = null;
        const VEND = null;

		/**
		 * Instance
		 *
		 * Holds a single instance of the `Modina_Core` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Modina_Core A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Modina_Core An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'modina-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'modina-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Modnia Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->core_includes();
			$this->init_hooks();
			do_action( 'Modina_Core_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Extra functions
			require_once __DIR__ . '/inc/extra.php';

			// // Custom post types
			require_once __DIR__ . '/post-type/event.pt.php';
			// require_once __DIR__ . '/post-type/none.pt.php';


            /**
             * Register widget area.
             *
             * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
             */
			require_once __DIR__ . '/wp-widgets/widgets.php';
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'modina-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init Modnia Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_scripts' ] );

			// Register Widget Style
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Modnia Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'modina-core' ),
				'<strong>' . esc_html__( 'Modnia Core', 'modina-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'modina-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Modnia Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'modina-core' ),
				'<strong>' . esc_html__( 'Modnia Core', 'modina-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'modina-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: Modnia Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'modina-core' ),
				'<strong>' . esc_html__( 'Modnia Core', 'modina-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'modina-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Modnia Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function add_elementor_category() {

			\Elementor\Plugin::instance()->elements_manager->add_category( 'modina-elements', [
				'title' => __( 'FundBux Widgets', 'modina-core' ),
			], 1 );

		}

		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Modnia Core.
		 *
		 * @since 1.6.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {

            // wp_register_script('universal-tilt', plugins_url( 'assets/js/universal-tilt.js', __FILE__ ), 'jquery', '0.5', true);
		}

		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Modnia Core.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */

		public function enqueue_widget_styles() {

		}

		/*public function register_admin_styles() {
            wp_enqueue_style( 'Modina_Core_admin', plugins_url( 'assets/css/moidna-core-admin.css', __FILE__ ) );
        }*/

		/**
		 * Register New Widgets
		 *
		 * Include Modnia Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Modnia Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {
			require_once __DIR__ . '/widgets/Modina_hero.php';
			require_once __DIR__ . '/widgets/Modina_services.php';
			require_once __DIR__ . '/widgets/Modina_section_title.php';
			require_once __DIR__ . '/widgets/Modina_about_us.php';
			require_once __DIR__ . '/widgets/Modina_grid_gallery.php';
			require_once __DIR__ . '/widgets/Modina_news_feeds.php';
			require_once __DIR__ . '/widgets/Modina_video.php';
			require_once __DIR__ . '/widgets/Modina_timeline.php';
			require_once __DIR__ . '/widgets/Modina_cause_cat_list.php';
			require_once __DIR__ . '/widgets/Modina_team.php';
			require_once __DIR__ . '/widgets/Modina_join_us_cta.php';
			require_once __DIR__ . '/widgets/Modina_contact_card.php';
			require_once __DIR__ . '/widgets/Modina_contact_form.php';
			require_once __DIR__ . '/widgets/Modina_givewp_causes.php';
			require_once __DIR__ . '/widgets/Modina_events.php';
			require_once __DIR__ . '/widgets/Modina_events_card.php';
			require_once __DIR__ . '/widgets/Modina_causes_carousel.php';
			require_once __DIR__ . '/widgets/Modina_content_features.php';
			require_once __DIR__ . '/widgets/Modina_promo_box.php';
			require_once __DIR__ . '/widgets/Modina_site_cta.php';
			require_once __DIR__ . '/widgets/Modina_funfact.php';
			require_once __DIR__ . '/widgets/Modina_skillbar.php';
			require_once __DIR__ . '/widgets/Modina_icon_box.php';
			require_once __DIR__ . '/widgets/Modina_box_card.php';
			require_once __DIR__ . '/widgets/Modina_video_slider.php';
        }

		/**
		 * Register Widgets
		 *
		 * Register Modnia Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_hero() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_services() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_section_title() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_about_us() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_grid_gallery() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_news_feeds() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_video() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_timeline() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_cause_cat_list() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_team() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_join_us_cta() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_contact_card() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_contact_form() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_givewp_causes() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_events() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_events_card() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_causes_carousel() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_content_features() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_promo_box() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_site_cta() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_funfact() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_skillbar() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_icon_box() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_box_card() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ModinaCore\Widgets\Modina_video_slider() );

		}
	}
}

if ( !function_exists( 'Modina_Core_load' ) ) {
	/**
	 * Load Modnia Core
	 * Main instance of Modina_Core.
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function Modina_Core_load() {
		return Modina_Core::instance();
	}

	// Run Modnia Core
    Modina_Core_load();
}
