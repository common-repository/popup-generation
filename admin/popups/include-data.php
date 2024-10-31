<?php if ( ! defined( 'ABSPATH' ) ) exit;
	
	/**
		* Include data param for Poopup
		*
		* @package     Lead_Generation
		* @subpackage  Popps
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	$act = ( isset( $_REQUEST["act"] ) ) ? sanitize_text_field( $_REQUEST["act"] ) : '';
	if ($act == "update") {
		$recid = absint( $_REQUEST["id"] );
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
		if ($result){
			$id = $result->id;
			$title = $result->title;
			$param = unserialize( $result->param );
			$tool_id = $id;
			$hidval = 2;
			$btn = __( 'Update', 'leadgeneration' );
		}
	}
	else if ($act == "duplicate") {
		$recid = $_REQUEST["id"];
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
		if ($result){
			$id = "";
			$title = "";
			$param = unserialize($result->param);		
			$last = $wpdb->get_row("SHOW TABLE STATUS LIKE '$data'");
			$tool_id = $last->Auto_increment;			
			$hidval = 1;
			$btn = __( 'Save', 'leadgeneration' );
		}
	}
	else {    
    $id = "";
    $title = "";
		$last = $wpdb->get_row("SHOW TABLE STATUS LIKE '$data'");
		$tool_id = $last->Auto_increment;		
		$param = '';
		$hidval = 1;		
		$btn = __( 'Save', 'leadgeneration' );
	}
	
?>