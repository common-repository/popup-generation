<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Admin Page Class
		*
		* @package     WPLG
		* @subpackage  
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class Popup_Generation_Admin {					
		
		public function __construct( ) {	
			
			add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
			remove_all_filters( 'lg_create_option' );
			add_filter( 'lg_create_option', array( $this, 'create_option' ) );
			remove_all_filters( 'lg_help_tip' );
			add_filter( 'lg_help_tip', array( $this, 'help_tooltip' ) );
			add_action( 'plugins_loaded', array( $this, 'plugin_check' ) );
			add_filter( 'admin_footer_text', array( $this, 'rate_us' ) );			
			$this->includes();
		}
		private function includes() {
			if( !class_exists( 'LG_DB_Update' ) ) {
				require_once 'class-db-update.php';	
			}
			if( !class_exists( 'JavaScriptPacker' ) ) {
				require_once 'class-js-packer.php';
			}
		}
		function add_menu_page() {
			$icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjI3LjAwMDAwMHB0IiBoZWlnaHQ9IjE5MS4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDIyNy4wMDAwMDAgMTkxLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgoKPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsMTkxLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTg2MCAxODkyIGMtMzIzIC0yNCAtNTU4IC0xMjAgLTcxMCAtMjg5IC02MCAtNjggLTEyNiAtMTk1IC0xNDAKLTI3MiAtMTYgLTg3IC0xMyAtNjI2IDQgLTY5MSAzNiAtMTM3IDEzOSAtMzEwIDIyOCAtMzgyIDEyOSAtMTA0IDIzOSAtMTU5CjQwOCAtMjA0IDg0IC0yMiAxMjggLTI2IDM3MCAtMzUgMTUxIC01IDQ4MyAtOCA3MzcgLTcgNDI4IDMgNDY0IDQgNDgwIDIxIDE2CjE2IDE4IDQyIDE4IDI4MiAwIDI0MCAtMiAyNjYgLTE4IDI4MiAtMTcgMTcgLTY0IDE4IC03MTEgMjQgLTYxMSA2IC02OTkgOQotNzUxIDI0IC04OCAyNSAtMTY3IDY5IC0yMDggMTE0IGwtMzcgNDEgMCAxNjQgYzAgMTUzIDEgMTY1IDIzIDE5NyAyOCA0MiAxMTAKOTIgMTk3IDEyMSA2NCAyMiA3NSAyMiA3NjcgMjIgNjYwIDEgNzAzIDIgNzIwIDE5IDE2IDE2IDE4IDQzIDIxIDI1NSAzIDI1MgotMSAyODYgLTQwIDMwMSAtMjAgOCAtMTI3MCAyMCAtMTM1OCAxM3ogbTEyODAgLTI1MiBsMCAtMjQwIC0yNzUgMCAtMjc1IDAgMAoyNDAgMCAyNDAgMjc1IDAgMjc1IDAgMCAtMjQweiBtLTQgLTExMjcgYy0yIC01NCAtNCAtMTY3IC01IC0yNTAgbC0xIC0xNTMKLTI3NSAwIC0yNzUgMCAwIDI1MCAwIDI1MCAyODAgMCAyODAgMCAtNCAtOTd6Ii8+CjwvZz4KPC9zdmc+Cg==';
			add_menu_page( 'WordPress Popup Generation', 'Popup Generation', 'manage_options', 'popupgeneration', array( $this, 'main_page' ), $icon );
			add_submenu_page( 'popupgeneration', 'About Popup Generation ', 'About', 'manage_options', 'popupgeneration' );	
			add_submenu_page( 'popupgeneration', 'Popup Generation', 'Popups', 'manage_options', 'popupgeneration-popups', array( $this, 'main_page' ) );	
		}
		
		function main_page() {
			global $typenow;
			$typenow = 'popupgeneration';
			$page =  isset( $_REQUEST["page"] ) ? sanitize_text_field( $_REQUEST["page"] ) : 'main';
			$page_tool = explode('-', $page);	
			if( !empty( $page_tool[1] ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'popups/main.php';				
			}
			else {
				require_once plugin_dir_path( __FILE__ ) . 'general/main.php';
			}
			if ( isset( $page_tool[1] ) ) {
				self:: admin_style_script( $page_tool[1] );
			}
			
		}		
		
		function admin_style_script( $tool ) {
			wp_enqueue_style( 'popupgeneration', POPUP_GENERATION_PLUGIN_URL . 'assets/css/admin.min.css', false, POPUP_GENERATION_VERSION );			
			$admin_style = POPUP_GENERATION_PLUGIN_DIR . '/assets/css/' . $tool . '/admin.min.css';
			$admin_script = POPUP_GENERATION_PLUGIN_DIR . '/assets/js/' . $tool . '/admin.min.js';				
			if ( file_exists( $admin_style ) ) {
				wp_enqueue_style( 'lg-tool', POPUP_GENERATION_PLUGIN_URL . 'assets/css/' . $tool . '/admin.min.css', array(), POPUP_GENERATION_VERSION );	
			}
			if ( file_exists( $admin_script ) ) {					
				wp_enqueue_script( 'lg-tool', POPUP_GENERATION_PLUGIN_URL . 'assets/js/' . $tool . '/admin.min.js', array('wp-color-picker'), POPUP_GENERATION_VERSION );
			}				
			wp_enqueue_script( 'popupgeneration', POPUP_GENERATION_PLUGIN_URL . 'assets/js/admin.min.js', array('wp-color-picker'), POPUP_GENERATION_VERSION );
			wp_localize_script( 'popupgeneration', 'lg_count', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'lg-color-picker-alpha', POPUP_GENERATION_PLUGIN_URL . 'assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ) );			
			wp_enqueue_script( 'jquery-ui-tooltip' );
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-ui-droppable' );	
			if ( $tool == 'forms' ) {
				wp_enqueue_script( 'lg-tool-preview', POPUP_GENERATION_PLUGIN_URL . 'assets/js/' . $tool . '/preview.min.js', array('jquery'), POPUP_GENERATION_VERSION );
			}
			elseif ( $tool == 'buttons' ) {
				wp_enqueue_style( 'lg-fontawesome', POPUP_GENERATION_PLUGIN_URL . 'assets/vendors/fontawesome/css/fontawesome-all.min.css', array(), POPUP_GENERATION_VERSION );
				wp_enqueue_script( 'lg-fonticonpicker', POPUP_GENERATION_PLUGIN_URL . 'assets/vendors/fonticonpicker/fonticonpicker.min.js', array('jquery'), POPUP_GENERATION_VERSION );
				wp_enqueue_style( 'lg-fonticonpicker', POPUP_GENERATION_PLUGIN_URL . 'assets/vendors/fonticonpicker/css/fonticonpicker.min.css', array(), POPUP_GENERATION_VERSION );
				wp_enqueue_style( 'lg-fonticonpicker-darkgrey', POPUP_GENERATION_PLUGIN_URL . 'assets/vendors/fonticonpicker/fonticonpicker.darkgrey.min.css', array(), POPUP_GENERATION_VERSION );
				wp_enqueue_script( 'lg-tool-preview', POPUP_GENERATION_PLUGIN_URL . 'assets/js/' . $tool . '/preview.min.js', array('jquery'), POPUP_GENERATION_VERSION );
			}
		}
		
		
		function create_option ($arg){
			$id        = isset($arg['id'])     ? $arg['id']                         : null;
			$name      = isset($arg['name'])   ? $arg['name']                       : '';
			$type      = isset($arg['type'])   ? $arg['type']                       : '';
			$func      = !empty($arg['func'])  ? ' onchange="'.$arg['func'].'();"'  : '';
			$options   = isset($arg['option']) ? $arg['option']                     : '';
			$val       = $arg['val'];
			$separator = isset($arg['sep'])    ? $arg['sep']                        : '';			
			// create radio fields
			if ($type == 'radio'){									
				$option = '';
				foreach ($options as $key => $value){
					$select = ($key == $val) ? 'checked="checked"' : '';				
					$option .= '<input name="param['.$name.']" type="radio" value="'.$key.'" id="lg_'.$id.'_'.$key.'" '.$select.$func.'><label for="lg_'.$id.'_'.$key.'"> '.$value.'</label>'.$separator;					
				}
				$field = $option;
			}
			
			// create checkbox field
			elseif ($type == 'checkbox'){							
				$select = !empty($val) ? 'checked="checked"' : '';
				$field = '<input type="checkbox" '.$select.$func.' id="lg_'.$id.'">'.$separator;	
				$field .= '<input type="hidden" name="param['.$name.']" value="">';
			}
			
			// create text field
			elseif ($type == 'text'){		
				$option = '';
				if ( is_array( $options ) ) {
					foreach ($options as $key => $value){ 
						$option .= ' ' . $key . '="' . $value . '"';
					}
				}				
				$field = '<input name="param[' . $name . ']" type="text" value="' . $val . '" id="lg_' . $id . '"' . $func . $option .'>'.$separator;
			}
			
			// create number field
			elseif ($type == 'number'){	
				$option = '';
				if ( is_array( $options ) ) {
					foreach ($options as $key => $value){ 
						$option .= ' ' . $key . '="' . $value . '"';
					}
				}
				$field = '<input name="param['.$name.']" type="number"  value="'.$val.'" id="lg_'.$id.'"' . $func . $option . '>'.$separator;
			}
			
			// create color field
			elseif ($type == 'color'){							
				$field = '<input name="param['.$name.']" type="text" value="'.$val.'" class="wp-color-picker-field" data-alpha="true" id="lg_'.$id.'">'.$separator;
			}
			
			// create select field
			elseif ($type == 'select'){													
				$option = '';
				foreach ($options as $key => $value){
					$select = ($key == $val) ? 'selected="selected"' : '';
					$option .= '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
				}
				$field = '<select name="param['.$name.']"'.$func.' id="lg_'.$id.'">';
				$field .= $option;
				$field .= '</select>' . $separator;
			}
			
			// create editor field
			elseif ($type == 'editor'){
				$settings = array(
				'wpautop'       => 0,
				'textarea_name' => 'param['.$name.']',	
				'textarea_rows' => 15,
				);
				$field = wp_editor( $val, $id, $settings );				
			}		
			
			// create textarea field
			elseif ($type == 'textarea'){
				$field = '<textarea name="param['.$name.']" id="lg_'.$id.'">'.$val.'</textarea>'.$separator;	
			}
			
			return $field;
		}
		
		function help_tooltip( $arg ) {
			$tooltip = '';
			foreach ( $arg as $key => $value ) {
				if( $key == 'title' ) {
					$tooltip .= $value . '<p/>';
				}
				elseif ( $key == 'ul' ) {
					$tooltip .= '<ul>';
					$arr = $value;
					foreach ( $arr as $val ) {
						$tooltip .= '<li>' . $val . '</li>';
					}
					$tooltip .= '</ul>';
				}
				else {
					$tooltip .= $value;
				}
			}			
			$tooltip = "<span class='lg-help dashicons dashicons-editor-help' title='" .  $tooltip . "'></span>";
			return $tooltip;			
		}
		
		public function plugin_check() {
			if ( isset( $_POST['popup_generation_nonce_field'] ) ) {
				if ( !empty( $_POST ) && wp_verify_nonce( $_POST['popup_generation_nonce_field'],'popup_generation_action' ) && current_user_can( 'manage_options' ) ) {
					self:: save_data();
				}
			}
		}
		public function save_data(){
			global $wpdb;
			$objItem = new LG_DB_Update();
			$add = ( isset($_REQUEST['add'] ) ) ? absint( $_REQUEST['add'] ) : '';
			$data = ( isset($_REQUEST['data'] ) ) ? sanitize_text_field( $_REQUEST['data'] ) : '';
			$page = sanitize_text_field( $_REQUEST['page'] );
			$page_tool = explode( '-', $page );
			$tool = $page_tool[1];
			$tool_id = absint( $_POST['tool_id'] );
			$param = $_POST['param'];			
			$param_new = array();			
			foreach ( $param as $key => $value ) {
				if ( $key == 'content') {
					$param_new[$key] = $value;					
				}
				else {
					$param_new[$key] = sanitize_text_field( $value );
				}				
			}			
			$info = array();
			$info['id'] = $tool_id;
			$info['title'] = sanitize_text_field( $_POST['title'] );
			$info['param'] = $param_new;
			$info['tool'] = $tool;
			if ( isset( $_POST['submit'] ) ) {
				if ( absint( $_POST['add'] ) == '1') {
					$objItem->addNewItem( $data, $info, $tool );					
					header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=saved' );
					exit;
				} 
				elseif ( absint($_POST['add'] ) == '2' ) {
					$objItem->updItem( $data, $info, $tool );
					header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=update' );
					exit;
				}
			}
		}
		
		function rate_us( $footer_text ) {
			global $typenow;
			if ( $typenow == 'popupgeneration' ) {
				$rate_text = sprintf( __( 'Thank you for using <a href="%1$s" target="_blank">Popup Generation Pro</a>! Please <a href="%2$s" target="_blank">rate us on WordPress.org</a>', 'popupgeneration' ),
				'https://wow-estore.com/lead-generation/#pro',
				'https://wordpress.org/plugins/popup-generation/reviews/?rate=5#new-post'
				);				
				return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
				} else {
				return $footer_text;
			}
		}		
	}									