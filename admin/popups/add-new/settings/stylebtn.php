<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Close Button Styly settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

// Close button type
$close_type = array(
	'id'   => 'close_type',
	'name' => 'close_type',	
	'type' => 'select',
	'val' => isset( $param['close_type'] ) ? $param['close_type'] : 'text',	
	'option' => array(				
		'text'      => __('Text', 'leadgeneration'),
		'icon'      => __('Icon', 'leadgeneration'),		
	),
	'func' => 'close_type',
);

// Location of the close button
$close_location  = array(
	'id'   => 'close_location',
	'name' => 'close_location',	
	'type' => 'select',
	'val' => isset( $param['close_location'] ) ? $param['close_location'] : 'topRight',	
	'option' => array(				
		'topRight'      => __('Top Right location on the popup', 'leadgeneration'),
		'topLeft'       => __('Top Left location on the popup', 'leadgeneration'),
		'bottomLeft'    => __('Bottom Left location on the popup', 'leadgeneration'),
		'bottomRight'   => __('Bottom Right location on the popup', 'leadgeneration'),
	),
	'func' => 'close_location',
);

// Location helper
$close_location_help = array (
	'text' => __('Specify close button location.', 'leadgeneration'),
);

// Location Top
$location_close_top = array(
	'id'   => 'location_close_top',
	'name' => 'location_close_top',	
	'type' => 'number',
	'val' => isset( $param['location_close_top'] ) ? $param['location_close_top'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_close_top_help = array (
	'text' => __('Distance from the top edge of the popup in px.', 'leadgeneration'),
);

// Location Bottom
$location_close_bottom = array(
	'id'   => 'location_close_bottom',
	'name' => 'location_close_bottom',	
	'type' => 'number',
	'val' => isset( $param['location_close_bottom'] ) ? $param['location_close_bottom'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Bottom helper
$location_close_bottom_help = array (
	'text' => __('Distance from the bottom  edge of the popup in px.', 'leadgeneration'),
);

// Location Left
$location_close_left = array(
	'id'   => 'location_close_left',
	'name' => 'location_close_left',	
	'type' => 'number',
	'val' => isset( $param['location_close_left'] ) ? $param['location_close_left'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_close_left_help = array (
	'text' => __('Distance from the left edge of the popup in px.', 'leadgeneration'),
);

// Location Right
$location_close_right = array(
	'id'   => 'location_close_right',
	'name' => 'location_close_right',	
	'type' => 'number',
	'val' => isset( $param['location_close_right'] ) ? $param['location_close_right'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_close_right_help = array (
	'text' => __('Distance from the right edge of the popup in px.', 'leadgeneration'),
);

// Text Close button
$btn_text = array(
	'id'   => 'btn_text',
	'name' => 'btn_text',	
	'type' => 'text',
	'val' => isset( $param['btn_text'] ) ? $param['btn_text'] : __( 'CLOSE', 'leadgeneration' ),
	'option' => array (
		'placeholder' => __( 'CLOSE', 'leadgeneration' ),		
	),
); 

// Text helper
$btn_text_help = array (
	'text' => __('Enter the close button text.', 'leadgeneration'),
);

// Close Button Text Padding
$btn_text_padding = array(
	'id'   => 'btn_text_padding',
	'name' => 'btn_text_padding',	
	'type' => 'text',
	'val' => isset( $param['btn_text_padding'] ) ? $param['btn_text_padding'] : '6px 12px',	
	'option' => array (
		'placeholder' => '6px 12px',		
	),
);

// Close Button Padding helper
$btn_text_padding_help = array (
	'title' => __('Specify button text inner padding. Can be:', 'leadgeneration'),
	'ul' => array (
		__('any integer value in px (for example: "10px" will set popup inner paddings to 10px)', 'leadgeneration'),
		__('if you enter 0, the popup will have not paddings', 'leadgeneration'),
		__('when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise)', 'leadgeneration'),
	),
);

// Icon Button Box Size
$btn_box_size = array(
	'id'   => 'btn_box_size',
	'name' => 'btn_box_size',	
	'type' => 'number',
	'val' => isset( $param['btn_box_size'] ) ? $param['btn_box_size'] : '24',	
	'option' => array (
		'placeholder' => '24',		
	),
);

// Close Button helper
$btn_box_size_help = array (
	'text' => __('Specify box size for close button icon.', 'leadgeneration'),	
);

// Icon Button Box Size
$btn_border_radius = array(
	'id'   => 'btn_border_radius',
	'name' => 'btn_border_radius',	
	'type' => 'number',
	'val' => isset( $param['btn_border_radius'] ) ? $param['btn_border_radius'] : '0',
	'option' => array (
		'placeholder' => '0',		
	),
);

// Close Button Font Size
$btn_size = array(
	'id'   => 'btn_size',
	'name' => 'btn_size',	
	'type' => 'number',
	'val' => isset( $param['btn_size'] ) ? $param['btn_size'] : '12',	
	'option' => array (
		'min' => '8',
		'max' => '54',
		'step' => '1',
		'placeholder' => '12',	
	),
);

// Close Button font size helper
$btn_size_help = array (
	'text' => __('Set the font size for close button content in px', 'leadgeneration'),
);

// Close Button Font Family
$btn_font = array(
	'id'   => 'btn_font',
	'name' => 'btn_font',	
	'type' => 'select',
	'val' => isset( $param['btn_font'] ) ? $param['btn_font'] : 'inherit',	
	'option' => array (
		'inherit' => __('Use Your Themes', 'leadgeneration'),
		'Sans-Serif' => 'Sans-Serif',
		'Tahoma' => 'Tahoma',
		'Georgia' => 'Georgia',
		'Comic Sans MS' => 'Comic Sans MS',
		'Arial' => 'Arial',
		'Lucida Grande' => 'Lucida Grande',
		'Times New Roman' => 'Times New Roman',
	),
);

// Close Button Font Weight
$btn_font_weight = array(
	'id'   => 'btn_font_weight',
	'name' => 'btn_font_weight',	
	'type' => 'select',
	'val' => isset( $param['btn_font_weight'] ) ? $param['btn_font_weight'] : 'normal',	
	'option' => array (
		'normal' => 'Normal',
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	),
);

// Close Button Font Style
$btn_font_style = array(
	'id'   => 'btn_font_style',
	'name' => 'btn_font_style',	
	'type' => 'select',
	'val' => isset( $param['btn_font_style'] ) ? $param['btn_font_style'] : 'normal',	
	'option' => array (
		'normal' => 'Normal',
		'italic' => 'Italic',		
	),
);


// Close Button Text Color
$btn_color  = array(
	'id'   => 'btn_color',
	'name' => 'btn_color',	
	'type' => 'color',
	'val' => isset( $param['btn_color'] ) ? $param['btn_color'] : '#fff',	
	'option' => array (		
		'placeholder' => '#ffffff',	
	),
);

// Close Button Color helper
$btn_color_help = array (
	'text' => __('Specify popup close button color.', 'leadgeneration'),	
);

// Close Button Color hover
$btn_color_hover = array(
	'id'   => 'btn_color_hover',
	'name' => 'btn_color_hover',	
	'type' => 'color',
	'val' => isset( $param['btn_color_hover'] ) ? $param['btn_color_hover'] : '#000',	
	'option' => array (		
		'placeholder' => '#000000',	
	),
);

// Close Button Text Color helper
$btn_color_hover_help = array (
	'text' => __('Specify popup close button hover text color.', 'leadgeneration'),	
);

// Close Button Background
$btn_background  = array(
	'id'   => 'btn_background',
	'name' => 'btn_background',	
	'type' => 'color',
	'val' => isset( $param['btn_background'] ) ? $param['btn_background'] : '#000',
	'option' => array (		
		'placeholder' => '#000000',	
	),
);

// Close Button Background helper
$btn_background_help = array (
	'text' => __('Specify popup close button background color.', 'leadgeneration'),	
);

// Close Button Background hover
$btn_background_hover = array(
	'id'   => 'btn_background_hover',
	'name' => 'btn_background_hover',	
	'type' => 'color',
	'val' => isset( $param['btn_background_hover'] ) ? $param['btn_background_hover'] : '#fff',	
	'option' => array (		
		'placeholder' => '#fff',	
	),
);

// Close Button Background hover helper
$btn_background_hover_help = array (
	'text' => __('Specify popup close button hover background color.', 'leadgeneration'),	
);