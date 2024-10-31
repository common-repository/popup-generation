<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Popup settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/


// Popup open trigger
$triggers  = array(
	'id'   => 'triggers',
	'name' => 'triggers',	
	'type' => 'select',
	'val' => isset( $param['triggers'] ) ? $param['triggers'] : '',	
	'option' => apply_filters('lg_popups_triggers',	array(
		'click'        => __('Click', 'leadgeneration'),
		'load'         => __('Auto', 'leadgeneration'),	
	) ),
	'func' => 'triggers',
);


// Trigger helper
$triggers_help = array (
	'title' => __('Triggers cause a popup to open:', 'leadgeneration'),
	'ul' => apply_filters('lg_popups_triggers_help', array (
		__('<strong>Click</strong> - if you wish to activate the popup manually on element click;', 'leadgeneration'),		
		__('<strong>Auto</strong> - popup will activate when the page loads;', 'leadgeneration'),		
		) ),
);



// Popup Animate In
$animate_in  = array(
	'id'   => 'animate_in',
	'name' => 'animate_in',	
	'type' => 'select',
	'val' => isset( $param['animate_in'] ) ? $param['animate_in'] : 'fadeIn',	
	'option' => apply_filters( 'lg_popups_animations_in', array(		
		'fadeIn'            => __('fadeIn','leadgeneration'),		
	) ),
);

// Popup Animate In helper
$animate_in_help = array ( 
	'text' => __('Specify modal window transition open effect.', 'leadgeneration'),
);

// Popup Animate Out
$animate_out  = array(
	'id'   => 'animate_out',
	'name' => 'animate_out',	
	'type' => 'select',
	'val' => isset( $param['animate_out'] ) ? $param['animate_out'] : 'fadeOut',	
	'option' => apply_filters( 'lg_popups_animations_out', array(		
		'fadeOut'            => __('fadeOut','leadgeneration'),		
	) )
);

// Popup Animate Out helper
$animate_out_help = array ( 
	'text' =>  __('Specify modal window transition close effect.', 'leadgeneration'),
);

// Popup Animation Speed
$animate_speed   = array(
	'id'   => 'animate_speed',
	'name' => 'animate_speed',	
	'type' => 'number',
	'val' => isset( $param['animate_speed'] ) ? $param['animate_speed'] : 0.4,	
	'option' => array (
		'min' => '0',
		'max' => '60',
		'step' => '0.1',
		'placeholder' => '0',
	),
);

// Popup Animation Speed helper
$animate_speed_help = array ( 
	'text' =>  __('Specify popup animation effect speed in seconds.', 'leadgeneration'),
);

// Enable cookie for popup
$set_cookie = array(
	'id'   => 'set_cookie',
	'name' => 'set_cookie',	
	'type' => 'checkbox',
	'val' => isset( $param['set_cookie'] ) ? $param['set_cookie'] : 0,
	'func' => 'setCookie',
); 

// Cookie helper
$cookie_help = array ( 
	'text' => __('Defines if the popup will set a cookie and hide it self for a period of time from the user.  Set the cookie in days.', 'leadgeneration'),
);

// Set the cookie time for popup
$cookie_time   = array(
	'id'   => 'cookie_time',
	'name' => 'cookie_time',	
	'type' => 'number',
	'val' => isset( $param['cookie_time'] ) ? $param['cookie_time'] : 1,
	'option' => array (
		'min' => '0',
		'max' => '9999999',
		'step' => '1',
		'placeholder' => '0',
	),
);