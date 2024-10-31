<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	// Create a data table for tools
	$table_tools = $wpdb->prefix . 'lg_tools';	
	$sql_tools   = "CREATE TABLE " . $table_tools . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title VARCHAR(200) NOT NULL,  
		tool TEXT,
		param TEXT,
		UNIQUE KEY id (id)
		) DEFAULT CHARSET=utf8;";
	dbDelta( $sql_tools );
	
	// Create a data table for users
	$table_mails = $wpdb->prefix . 'lg_mails';	
	$sql_mails   = "CREATE TABLE " . $table_mails . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title VARCHAR(200) NOT NULL,
		date TEXT,
		email TEXT,
		form_title TEXT,
		form_id mediumint(9),
		message TEXT,
		notice TEXT,
		UNIQUE KEY id (id)
		) DEFAULT CHARSET=utf8;";
		dbDelta( $sql_mails );
	
	$upload = wp_upload_dir();
	$upload_dir = $upload['basedir'] . '/lg-tools';
	