<?php
/**
 * Plugin Name: Saaspik Addons
 * Plugin URI: https://themeforest.net/user/pixelsigns/portfolio
 * Description: This plugin adds the core features to the Pixsass WordPress theme. You must have to install this plugin to get all the features included with the theme.
 * Version: 2.1.0
 * Author: PixelSigns
 * Author URI: https://themeforest.net/user/pixelsigns/portfolio
 * Text domain: saaspik-addons
 */

if ( !defined('ABSPATH') )
    die('-1');


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SAASPIK_ADDONS_VERSION', '2.1.0' );

/**
 * Constant for the plugins
 */
define('SAASPIK_PLUGIN_URL',plugins_url().'/saaspik-addons/');
define('SAASPIK_PLUGIN_ASSETS_URL',plugins_url().'/saaspik-addons/assets/');
define('SAASPIK_ADDONCE_DIR', plugin_dir_path( __FILE__ ) );
define('SAASPIK_SCRIPTS', SAASPIK_PLUGIN_URL . 'assets/js');


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Saaspik_Addons' ) ) {
	/**
	 * Main Saaspik Addons Class
	 *
	 * The main class that initiates and runs the Saaspik Addons plugin.
	 *
	 * @since 1.7.0
	 */
	final class Saaspik_Addons {
		/**
		 * Saaspik Addons Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 2.1.0	
		 *
		 * @var string The plugin version.
		 */
		const VERSION = '2.1.0' ;
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
		 * Holds a single instance of the `Saaspik_Addons` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Saaspik_Addons A single instance of the class.
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
		 * @return Saaspik_Addons An instance of the class.
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
		 * @since 1.0.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'saaspik-addons' ), '1.0.0' );
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
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'saaspik-addons' ), '1.0.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Saaspik Addons plugins.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->addons_includes();
			$this->init_hooks();
			do_action( 'saaspik_addons_loaded' );
			
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function addons_includes() {
			// Extra functions
			require_once __DIR__ . '/inc/extra.php';

			// Custom post types				
			require_once __DIR__ . '/inc/post-type/portfolio/init.php';
			require_once __DIR__ . '/inc/post-type/faq.pt.php';		

			// Mailchimp Newsletter
			require_once __DIR__ . '/inc/mailchimp.php';


            /**
             * Register widget area.
             *
             * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
             */
			
			//Elementor Widgets
			require_once __DIR__ . '/elementor/elementor.php';

			// Elementor custom field icons
			require_once __DIR__ . '/elementor/fields/icons.php';
		}

	


		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.0.0
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
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'saaspik-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}


		/**
		 * Init Saaspik Addons
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.0.0 The logic moved from a standalone function to this class method.
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

			// Register Widget Scripts
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'enqueue_widget_styles' ] );

			add_action( 'wp_enqueue_scripts', [ $this, 'custom_dequeue'], 100);
		}



		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Saaspik Addons 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'saaspik-addons' ),
				'<strong>' . esc_html__( 'Saaspik Addons', 'saaspik-addons' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'saaspik-addons' ) . '</strong>'
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
			/* translators: 1: Saaspik Addons 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'saaspik-addons' ),
				'<strong>' . esc_html__( 'Saaspik Addons', 'saaspik-addons' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'saaspik-addons' ) . '</strong>',
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
			/* translators: 1: Saaspik Addons 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'saaspik-addons' ),
				'<strong>' . esc_html__( 'Saaspik Addons', 'saaspik-addons' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'saaspik-addons' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Saaspik Addons.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			wp_enqueue_script('saaspik-main', plugins_url( 'assets/js/main.js', __FILE__ ), 'jquery', '1.0', true);	
		}


		/**
		 * Dequeue the Elementor Animation CSS.
		 *
		 * Hooked to the wp_print_scripts action, with a late priority (100),
		 * so that it is after the script was enqueued.
		 */

		function custom_dequeue() {
			wp_dequeue_style('elementor-animations');
			wp_deregister_style('elementor-animations');

		}
	
		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Saaspik Addons.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		
		public function enqueue_widget_styles() {
            wp_enqueue_style('simple-line-icon', plugins_url( 'assets/vendors/simple-line-icon/simple-line-icons.css', __FILE__ ));
            wp_register_style('themify-icons', plugins_url( 'assets/vendors/themify-icon/themify-icons.css', __FILE__ ));
			wp_enqueue_style( 'themify-icons' );
			wp_enqueue_style( 'plugin-style', plugins_url( 'assets/css/app-plugin.css', __FILE__ ));
            wp_enqueue_style( 'elegant-icons', plugins_url( 'assets/vendors/components-elegant-icons/css/elegant-icons.min.css', __FILE__ ));
            
		}
	}
}
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'Saaspik_addons_load' ) ) {
	/**
	 * Load Saaspik Addons
	 *
	 * Main instance of Saaspik_Addons.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function Saaspik_addons_load() {
		return Saaspik_Addons::instance();
	}

	// Run Sasspik Addons
    Saaspik_addons_load();
}