<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Close settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/


// Close popup when click overlay
$close_overlay = array(
	'id'   => 'close_overlay',
	'name' => 'close_overlay',	
	'type' => 'checkbox',
	'val' => isset( $param['close_overlay'] ) ? $param['close_overlay'] : 0,	
);

//  Close popup when click overlay helper
$close_overlay_help = array ( 
	'text' => __('Specify if overlay can close the modal or not.', 'leadgeneration'),
);

// Close popup on ESC key press
$close_esc = array(
	'id'   => 'close_esc',
	'name' => 'close_esc',	
	'type' => 'checkbox',
	'val' => isset( $param['close_esc'] ) ? $param['close_esc'] : 0,	
);

// Close popup on ESC key press helper
$close_esc_help = array ( 
	'text' => __('Enabled the ESC key to close the popup.', 'leadgeneration'),
);


