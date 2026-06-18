<?php
/**
 * Plugin Name: Reflect Elementor Addons
 * Description: Custom Elementor widgets for the Reflect design system.
 * Version: 1.0.0
 * Author: Gemini CLI
 * Text Domain: reflect-addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Reflect Elementor Addons Class
 */
final class Reflect_Elementor_Addons {

	/**
	 * Plugin Version
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Minimum PHP Version
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 */
	private static $_instance = null;

	/**
	 * Instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 */
	public function i18n() {
		load_plugin_textdomain( 'reflect-addons' );
	}

	/**
	 * Initialize the plugin
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add custom category
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_categories' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
        
        // Register scripts/styles
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
	}

	/**
	 * Admin notice
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'reflect-addons' ),
			'<strong>' . esc_html__( 'Reflect Elementor Addons', 'reflect-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'reflect-addons' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'reflect-addons' ),
			'<strong>' . esc_html__( 'Reflect Elementor Addons', 'reflect-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'reflect-addons' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'reflect-addons' ),
			'<strong>' . esc_html__( 'Reflect Elementor Addons', 'reflect-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'reflect-addons' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Register Custom Category
	 */
	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'reflect-addons',
			[
				'title' => esc_html__( 'Reflect Addons', 'reflect-addons' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 * Register Widgets
	 */
	public function register_widgets( $widgets_manager ) {
		require_once( __DIR__ . '/widgets/reflect-grid-cards.php' );
		require_once( __DIR__ . '/widgets/reflect-services.php' );
		require_once( __DIR__ . '/widgets/reflect-why-items.php' );
		require_once( __DIR__ . '/widgets/reflect-hero.php' );
		require_once( __DIR__ . '/widgets/reflect-testimonials.php' );

		$widgets_manager->register( new \Reflect_Grid_Cards_Widget() );
		$widgets_manager->register( new \Reflect_Services_Widget() );
		$widgets_manager->register( new \Reflect_Why_Items_Widget() );
		$widgets_manager->register( new \Reflect_Hero_Widget() );
		$widgets_manager->register( new \Reflect_Testimonials_Widget() );
	}

    /**
     * Widget Scripts/Styles
     */
    public function widget_scripts() {
        wp_enqueue_style( 'reflect-addons-style', plugins_url( '/assets/css/style.css', __FILE__ ), [], self::VERSION );
    }
}

Reflect_Elementor_Addons::instance();
