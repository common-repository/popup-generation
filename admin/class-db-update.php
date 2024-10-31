<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	class LG_DB_Update {
		function __construct() {
			$upload = wp_upload_dir();
			$this->basedir = $upload['basedir'] . '/lg-tools/';
		}
		
		function addNewItem( $tblname, $info, $tool ) {
			global $wpdb;
			$fields = $wpdb->get_col( "DESC " . $tblname, 0);			
			$data = array();            
			foreach ( $fields as $key ) {
				if ( is_array( $info[$key] ) == true){
					$data[$key] = serialize( $info[$key] );
				}
				else {
					$data[$key] = $info[$key];
				}				                
			}
			$wpdb->insert( $tblname,$data );			
			$lastid = $wpdb->insert_id; 
			$result = $wpdb->get_results("SELECT * FROM " . $tblname . " WHERE id = " . $lastid);			
			if ( count( $result ) > 0 ) {
				foreach ( $result as $key => $val ) {
					$param = unserialize( $val->param );					
					$file_script = plugin_dir_path( __FILE__ ) . $tool . '/generator/script.php';
					if ( file_exists ( $file_script ) ) {
						$path_script = $this->basedir . $tool .'-' . $lastid . '.js';
						ob_start();
						include ( $file_script );
						$content_script = ob_get_contents();
						$packer = new JavaScriptPacker ( $content_script, 'Normal', true, false );
						$packed = $packer->pack();					
						ob_end_clean();
						file_put_contents( $path_script, $packed );
					}
					$file_style = plugin_dir_path( __FILE__ ) . $tool . '/generator/style.php';
					if ( file_exists ( $file_style ) ) {
						$path_style = $this->basedir . $tool .'-' . $lastid . '.css';
						ob_start();
						include ( $file_style );
						$content_style = ob_get_contents();										
						ob_end_clean();
						file_put_contents( $path_style, $content_style );
					}				
				}
			}		
		}
		function updItem( $tblname, $info, $tool ) {
			global $wpdb;		
			$fields = $wpdb->get_col( "DESC " . $tblname, 0);			
			$data = array();            
			foreach ( $fields as $key ) {
				if (is_array( $info[$key] ) == true ) {
					$data[$key] = serialize( $info[$key] );
				}
				else {
					$data[$key] = $info[$key];
				}				                
			}
			$where = array( 'id' => $info["id"] );
			$id = $info["id"];			
			$wpdb->update( $tblname, $data, array('id' => $id ), $format = null, $where_format = null );			
			$result = $wpdb->get_results( "SELECT * FROM ".$tblname." WHERE id = " . $id );	
			if (count( $result ) > 0 ) {
				foreach ( $result as $key => $val ) {
					$param = unserialize($val->param);
					$file_script = plugin_dir_path( __FILE__ ) . $tool . '/generator/script.php';
					if (file_exists ( $file_script ) ) {
						$path_script = $this->basedir . $tool .'-' . $id . '.js';
						ob_start();
						include ( $file_script );
						$content_script = ob_get_contents();
						$packer = new JavaScriptPacker( $content_script, 'Normal', true, false );
						$packed = $packer->pack();					
						ob_end_clean();
						file_put_contents( $path_script, $packed );
					}
					$file_style = plugin_dir_path( __FILE__ ) . $tool . '/generator/style.php';
					if (file_exists ( $file_style )){
						$path_style = $this->basedir . $tool .'-' . $id . '.css';
						ob_start();
						include ( $file_style );
						$content_style = ob_get_contents();										
						ob_end_clean();
						file_put_contents( $path_style, $content_style );
					}				
				}			
			}
		}		
	}
?>