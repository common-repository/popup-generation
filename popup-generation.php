<?php
	/**
		* Plugin Name: Popup Generation
		* Plugin URI: https://wordpress.org/plugins/popup-generation/
		* Description: The easiest way for Lead Generation with WordPress.
		* Author: Dmytro Lobov
		* Author URI: https://wow-estore.com
		* Version: 1.1.1
		* Text Domain: popupgeneration
		* Domain Path: languages
		*
		* @package WPLG
		* @category Core
		* @author Dmytro Lobov
		* @version 1.0
	*/
	
	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	if ( ! class_exists( 'Popup_Generation' ) ) :
	
	final class Popup_Generation {
		
		private static $instance;	
		
		public static function instance() {			
			
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Popup_Generation ) ) {
				self::$instance = new Popup_Generation;
				self::$instance->setup_constants();
				
				register_activation_hook( __FILE__, array( self::$instance, 'plugin_activate' ) );
				register_deactivation_hook( __FILE__, array( self::$instance, 'plugin_deactivate' ) );
				
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				add_filter( 'plugin_action_links', array( self::$instance, 'action_links' ), 10, 2 );
				
				self::$instance->includes();
				
				self::$instance->admin  = new Popup_Generation_Admin();
				self::$instance->public = new Popup_Generation_Public();				
			}		
			return self::$instance;	
		}
		
		/**
			* Throw error on object clone.
			*
			* The whole idea of the singleton design pattern is that there is a single
			* object therefore, we don't want the object to be cloned.
			*
			* @since 1.0
			* @access protected
			* @return void
		*/
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'leadgeneration' ), '1.0' );
		}
		
		/**
			* Disable unserializing of the class.
			*
			* @since 1.0
			* @access protected
			* @return void
		*/
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'leadgeneration' ), '1.0' );
		}
		
		/**
			* Setup plugin constants.
			*
			* @access private
			* @since 1.0
			* @return void
		*/
		private function setup_constants() {
			
			// Plugin version.
			if ( ! defined( 'POPUP_GENERATION_VERSION' ) ) {
				define( 'POPUP_GENERATION_VERSION', '1.1' );
			}
			
			// Plugin Folder Path.
			if ( ! defined( 'POPUP_GENERATION_PLUGIN_DIR' ) ) {
				define( 'POPUP_GENERATION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			
			// Plugin Folder URL.
			if ( ! defined( 'POPUP_GENERATION_PLUGIN_URL' ) ) {
				define( 'POPUP_GENERATION_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}					
		}
		
		private function includes() {
			require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';			
			require_once plugin_dir_path( __FILE__ ) . 'public/class-public.php';			
		}
		
		// Activate & diactivate
		function plugin_activate() {
			require_once plugin_dir_path( __FILE__ ) . 'activator.php';	
		}
		function plugin_deactivate() {	
			require_once plugin_dir_path( __FILE__ ) . 'deactivator.php';
		}
		
		function load_textdomain(){
			load_plugin_textdomain( 'popupgeneration', FALSE, dirname( plugin_basename(__FILE__) ).'/languages/' );
		}
		
		function action_links( $actions, $plugin_file ){
			if( false === strpos( $plugin_file, basename(__FILE__) ) ) {
				return $actions;
			}
			$settings_link = '<a href="admin.php?page=buttongeneration-buttons">Settings</a>';
			array_unshift( $actions, $settings_link );
			return $actions;
		}
		
	}
	
	endif; // End if class_exists check.
	
	
	function popupgeneration() {
		return Popup_Generation::instance();
	}	
	// Get Running.
	popupgeneration();	