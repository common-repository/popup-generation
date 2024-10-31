<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Tergeting settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

// Enable Don’t show on screens more than
$max_screen_enable = array(
	'id'   => 'max_screen_enable',
	'name' => 'max_screen_enable',	
	'type' => 'checkbox',
	'val' => isset( $param['max_screen_enable'] ) ? $param['max_screen_enable'] : 0,	
	'func' => 'max_screen_enable',
);

// Show on screens helper
$show_screen_help = array ( 
	'text' => __('Specify the window breakpoint in px when the popup will be shown.', 'leadgeneration'),
);

// Max screen value
$max_screen = array(
	'id'   => 'max_screen',
	'name' => 'max_screen',	
	'type' => 'number',
	'val' => isset( $param['max_screen'] ) ? $param['max_screen'] : 1024,	
	'option' => array (
		'min' => '0',
		'max' => '3000',
		'step' => '1',
		'placeholder' => '1024',
	),
);

// Enable Don’t show on screens less than
$min_screen_enable = array(
	'id'   => 'min_screen_enable',
	'name' => 'min_screen_enable',	
	'type' => 'checkbox',
	'val' => isset( $param['min_screen_enable'] ) ? $param['min_screen_enable'] : 0,
	'func' => 'min_screen_enable',
);

// Enable Don’t show on screens less than helper
$min_screen_enable_help = array ( 
	'text' => __('Specify the window breakpoint ( mix width) in px.', 'leadgeneration'),
);

// Min screen value
$min_screen = array(
	'id'   => 'min_screen',
	'name' => 'min_screen',	
	'type' => 'number',
	'val' => isset( $param['min_screen'] ) ? $param['min_screen'] : 480,	
	'option' => array (
		'min' => '0',
		'max' => '3000',
		'step' => '1',
		'placeholder' => '480',
	),
);

$action_help = array (
	'text' => __('The Action is a click on something in an open popup, such as a link or a button. To calculate the Action add the class "lg-popup-action" to the link or button that is inserted into the content of the popup.', 'leadgeneration'),
);