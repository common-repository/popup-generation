<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Public Class
		*
		* @package     Lead_Generation
		* @subpackage  Public
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class Popup_Generation_Public {
		public function __construct() {	
			$upload = wp_upload_dir();
			$this->basedir = $upload['basedir'] . '/lg-tools/';
			$this->baseurl = $upload['baseurl'] . '/lg-tools/';
			add_action( 'wp_head', array( $this, 'header_style' ) );
			add_action( 'wp_footer', array( $this, 'footer_style' ) );
			add_shortcode( 'Popup', array( $this, 'shortcode_popup' ) );
			
			// Senf forms
			if( defined('DOING_AJAX') && DOING_AJAX ){
				add_action( 'wp_ajax_lg_count', array( $this, 'lg_count' ) );
				add_action( 'wp_ajax_nopriv_lg_count', array( $this, 'lg_count' ) );				
			}			
			add_action( 'wp_footer', array( $this, 'display') );		
			add_action( 'lg_tools_counter', array( $this, 'view_counter'), 2, 10 );
		}		
		
		function header_style() {
			wp_enqueue_style( 'lg-main', POPUP_GENERATION_PLUGIN_URL . 'assets/css/main.min.css', array(), '1.0' );			
		}
		
		function footer_style() { 
			wp_enqueue_style( 'lg-animate', POPUP_GENERATION_PLUGIN_URL . 'assets/css/animate.min.css', array(), '1.0' );
			wp_enqueue_style( 'lg-fontawesome', POPUP_GENERATION_PLUGIN_URL . 'assets/vendors/fontawesome/css/fontawesome-all.min.css' );
		}
		
		function shortcode_popup( $atts ) {
			ob_start();
			require plugin_dir_path( __FILE__ ) . 'popups/shortcode.php';				
			$shortcode = ob_get_contents();
			ob_end_clean();					
			return $shortcode;
		}
		
		function display() {
			require plugin_dir_path( __FILE__ ) . 'display.php';
		}
		
		function view_counter ( $tool, $id ) {
			$should_count = true;			
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; 
			$bot = "Bot/|robot|Slurp/|yahoo";
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) ) {
				$should_count = false;
			}
			if( $should_count == true ) {
				$option_name = '_lg_tool_' . $tool . '_view_counter_' . $id;
				$tool_view = get_option( $option_name, '0' );				
				update_option( $option_name, ( $tool_view+1 ) );
			}
		}
		
		function lg_count() {
			$type = sanitize_text_field( $_POST['count_type'] );			
			$id = absint( $_POST['tool_id'] );		
			$tool = sanitize_text_field( $_POST['tool'] );	
			if( $type == 'reset' ) {
				$option_name_view = '_lg_tool_' . $tool . '_view_counter_' . $id;
				$option_name_action = '_lg_tool_' . $tool . '_action_counter_' . $id;
				$delete_view = delete_option( $option_name_view );
				$delete_action = delete_option( $option_name_action );
				if ( $delete_view == true ) {
					$response = array(
					"result" => 'OK',													
					);
					wp_send_json( $response );	
				}				
				exit();
			}
			
			$option_name = '_lg_tool_' . $tool . '_' . $type . '_counter_' . $id;
			$tool_view = get_option( $option_name, '0' );				
			update_option( $option_name, ( $tool_view+1 ) );		
		}
	}		