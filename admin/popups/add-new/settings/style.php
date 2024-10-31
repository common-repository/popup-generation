<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Styll settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

// Enable Overlay
$overlay = array(
	'id'   => 'overlay',
	'name' => 'overlay',	
	'type' => 'checkbox',
	'val' => isset( $param['overlay'] ) ? $param['overlay'] : 1,	
	'func' => 'overlayEnable',
); 

// Overlay helper
$overlay_help = array(
	'text' => __('Specify if overlay should be active or not. If you uncheck, the modal will have no background overlay.', 'leadgeneration'),
);

// Overlay background color
$overlay_background = array(
	'id'   => 'overlay_background',
	'name' => 'overlay_background',	
	'type' => 'color',
	'val' => isset( $param['overlay_background'] ) ? $param['overlay_background'] : 'rgba(0,0,0,.7)',	
);

// Z-index all elements of popup
$zindex  = array(
	'id'   => 'zindex',
	'name' => 'zindex',	
	'type' => 'number',
	'val' => isset( $param['zindex'] ) ? $param['zindex'] : '999',
	'option' => array (
		'min' => '1',
		'max' => '9999999',
		'step' => '1',
		'placeholder' => '999',
	),
);

// Z-index helper
$zindex_help = array(
	'text' => __('The z-index property specifies the stack order of an element. An element with greater stack order is always in front of an element with a lower stack order.', 'leadgeneration'),
);

// Location of the popup
$location  = array(
	'id'   => 'location',
	'name' => 'location',	
	'type' => 'select',
	'val' => isset( $param['location'] ) ? $param['location'] : 'center',	
	'option' => array(
		'center'        => __('Center location on the page', 'leadgeneration'),
		'topLeft'       => __('Top Left location on the page', 'leadgeneration'),
		'topCenter'     => __('Top Center location on the page', 'leadgeneration'),
		'topRight'      => __('Top Right location on the page', 'leadgeneration'),
		'bottomLeft'    => __('Bottom Left location on the page', 'leadgeneration'),
		'bottomCenter'  => __('Bottom Center location on the page', 'leadgeneration'),
		'bottomRight'   => __('Bottom Right location on the page', 'leadgeneration'),
		'left'          => __('Left location on the page', 'leadgeneration'),
		'right'         => __('Right location on the page', 'leadgeneration'),
	),
	'func' => 'popup_location',
);

// Location helper
$location_help = array (
	'text' => __('Specify modal window location on screen.', 'leadgeneration'),
);

// Location Top
$location_top = array(
	'id'   => 'location_top',
	'name' => 'location_top',	
	'type' => 'number',
	'val' => isset( $param['location_top'] ) ? $param['location_top'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_top_help = array (
	'text' => __('Distance from the top edge of the screen in px.', 'leadgeneration'),
);

// Location Bottom
$location_bottom = array(
	'id'   => 'location_bottom',
	'name' => 'location_bottom',	
	'type' => 'number',
	'val' => isset( $param['location_bottom'] ) ? $param['location_bottom'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_bottom_help = array (
	'text' => __('Distance from the bottom  edge of the screen in px.', 'leadgeneration'),
);

// Location Left
$location_left = array(
	'id'   => 'location_left',
	'name' => 'location_left',	
	'type' => 'number',
	'val' => isset( $param['location_left'] ) ? $param['location_left'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_left_help = array (
	'text' => __('Distance from the left edge of the screen in px.', 'leadgeneration'),
);

// Location Right
$location_right = array(
	'id'   => 'location_right',
	'name' => 'location_right',	
	'type' => 'number',
	'val' => isset( $param['location_right'] ) ? $param['location_right'] : '0',
	'option' => array (
		'min' => '-500',
		'max' => '500',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Location Top helper
$location_right_help = array (
	'text' => __('Distance from the right edge of the screen in px.', 'leadgeneration'),
);

// Popup Position
$position  = array(
	'id'   => 'position',
	'name' => 'position',	
	'type' => 'select',
	'val' => isset( $param['position'] ) ? $param['position'] : 'fixed',	
	'option' => array(		
		'fixed'    => __('Fixed', 'leadgeneration'),	
		'absolute' => __('Absolute', 'leadgeneration'),
	),
);

// Popup Position helper
$position_help = array (
	'title' => __('Set the positioning of the popup. Can be:', 'leadgeneration'), 
	'ul' => array (
		__('<strong>fixed</strong> - popup is positioned relative to the browser window;', 'leadgeneration'),
		__('<strong>absolute</strong> - the popup is positioned relative to its place;', 'leadgeneration'),		
	),
); 

// Popup Width
$width = array(
	'id'   => 'width',
	'name' => 'width',	
	'type' => 'text',
	'val' => isset( $param['width'] ) ? $param['width'] : '480px',	
	'option' => array( 
		'placeholder' => '480px',
	),
);

// Width helper
$width_help = array (
	'title' => __('Specify modal window width. Can be:', 'leadgeneration'), 
	'ul' => array (
		__('<strong>any integer value in px</strong> (for example: "400px" will set popup width to 400px);', 'leadgeneration'),
		__('<strong>any integer value in %</strong> (for example: "80%" will set popup width to 80% of the window width);', 'leadgeneration'),
		__('<strong>auto</strong> - the browser calculates the popup width.', 'leadgeneration'),
	),
);

// Popup Height
$height = array(
	'id'   => 'height',
	'name' => 'height',	
	'type' => 'text',
	'val' => isset( $param['height'] ) ? $param['height'] : '280px',
	'option' => array( 
		'placeholder' => '280px',
	),
);

// Height helper
$height_help = array (
'title' => __('Specify modal window height. Can be:', 'leadgeneration'),
	'ul' => array (
		__('<strong>any integer value in px</strong> (for example: "400px" will set popup height to 400px);', 'leadgeneration'),
		__('<strong>any integer value in %</strong> (for example: "80%" will set popup height to 80% of the window height);', 'leadgeneration'),
		__('<strong>auto</strong> - the browser calculates the popup height.', 'leadgeneration'),
	),
);

// Popup Background
$background  = array(
	'id'   => 'background',
	'name' => 'background',	
	'type' => 'color',
	'val' => isset( $param['background'] ) ? $param['background'] : '#ffffff',	
);

// Popup Background helper
$background_help = array (
	'text' => __('Specify modal window background color.', 'leadgeneration'),	
);

// Popup Background Image
$background_image  = array(
	'id'   => 'background_image',
	'name' => 'background_image',	
	'type' => 'text',
	'val' => isset( $param['background_image'] ) ? $param['background_image'] : '',	
);

// Popup Background Image helper
$background_image_help = array (
	'text' => __('Specify the modal window background image. Enter the URL of the image which you want to use as a background.', 'leadgeneration'),	
);

// Popup Margin
$margin = array(
	'id'   => 'margin',
	'name' => 'margin',	
	'type' => 'text',
	'val' => isset( $param['margin'] ) ? $param['margin'] : '30px',	
	'option' => array( 
		'placeholder' => '0px',
	),
);

// Popup Margin helper
$margin_help = array (
	'title' => __('Specify modal window margins. Can be:', 'leadgeneration'),
	'ul' => array (
		__('any integer value in px (for example: "20px" will set popup margins to 20px)', 'leadgeneration'),	
		__('if you enter 0, the popup will have not margins', 'leadgeneration'),
		__('when four values are specified, the margins apply to the top, right, bottom, and left in that order (clockwise)', 'leadgeneration'),
	),
);

// Popup Padding
$padding = array(
	'id'   => 'padding',
	'name' => 'padding',	
	'type' => 'text',
	'val' => isset( $param['padding'] ) ? $param['padding'] : '30px',	
	'option' => array( 
		'placeholder' => '0px',
	),
);

// Popup Padding helper
$padding_help = array (
	'title' => __('Specify modal window inner padding. Can be:', 'leadgeneration'),
	'ul' => array (
		__('any integer value in px (for example: "10px" will set popup inner paddings to 10px)', 'leadgeneration'),
		__('if you enter 0, the popup will have not paddings', 'leadgeneration'),
		__('when four values are specified, the paddings apply to the top, right, bottom, and left in that order (clockwise)', 'leadgeneration'),
	),
);

// Border Radius
$border_radius  = array(
	'id'   => 'border_radius',
	'name' => 'border_radius',	
	'type' => 'number',
	'val' => isset($param['border_radius']) ? $param['border_radius'] : '12',	
	'option' => array (
		'min' => '0',
		'max' => '100',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Border Radius helper
$border_radius_help = array (
	'text' => __('Specify modal window border radius in px.', 'leadgeneration'),	
);

// Border Style
$border_style  = array(
	'id'   => 'border_style',
	'name' => 'border_style',	
	'type' => 'select',
	'val' => isset( $param['border_style'] ) ? $param['border_style'] : 'solid',	
	'option' => array(		
		'none'    => __('None', 'leadgeneration'),	
		'solid'   => __('Solid', 'leadgeneration'),
		'dotted'  => __('Dotted', 'leadgeneration'),
		'dashed'  => __('Dashed', 'leadgeneration'),
		'double'  => __('Double', 'leadgeneration'),
		'groove'  => __('Groove', 'leadgeneration'),
		'inset'   => __('Inset', 'leadgeneration'),
		'outset'  => __('Outset', 'leadgeneration'),
		'ridge'   => __('Ridge', 'leadgeneration'),
	),
	'func' => 'border',
);

// Border Style helper
$border_style_help = array (
	'text' => __('Choose a border style for your popup.', 'leadgeneration'),	
);

// Border Color
$border_color  = array(
	'id'   => 'border_color',
	'name' => 'border_color',	
	'type' => 'color',
	'val' => isset( $param['border_color'] ) ? $param['border_color'] : '#383838',
	'option' => array( 
		'placeholder' => '#383838',
	),
);

// Border Width
$border_width  = array(
	'id'   => 'border_width',
	'name' => 'border_width',	
	'type' => 'number',
	'val' => isset( $param['border_width'] ) ? $param['border_width'] : '1',
	'option' => array (
		'min' => '0',
		'max' => '100',
		'step' => '1',
		'placeholder' => '0',
	),
);

// Popup Shadow
$shadow = array(
	'id'   => 'shadow',
	'name' => 'shadow',	
	'type' => 'select',
	'val' => isset( $param['shadow'] ) ? $param['shadow'] : 'none',	
	'option' => array (
		'none' => __('None', 'leadgeneration'),
		'outset' => __('Outset', 'leadgeneration'),
		'inset' => __('Inset', 'leadgeneration'),
	),
	'func' => 'shadow',
);

$shadow_help = array (
	'title' => __('Set the box shadow.', 'leadgeneration'),	
	'ul' => array (
		__('None - no shadow is displayed', 'leadgeneration'),
		__('Outset - outer shadow of popup', 'leadgeneration'),
		__('Inset - inner shadow of popup', 'leadgeneration'),
	),
);

// Popup Shadow Horizontal Position
$shadow_h_offset  = array(
	'id'   => 'shadow_h_offset',
	'name' => 'shadow_h_offset',	
	'type' => 'number',
	'val' => isset( $param['shadow_h_offset'] ) ? $param['shadow_h_offset'] : '0',
	'option' => array (
		'min' => '-50',
		'max' => '50',
		'step' => '1',
		'placeholder' => '0',
	),
);

$shadow_h_offset_help = array (
	'text' => __('The horizontal offset of the shadow. A positive value puts the shadow on the right side of the box, a negative value puts the shadow on the left side of the box.', 'leadgeneration'),	
);

// Popup Shadow Vertical Position
$shadow_v_offset  = array(
	'id'   => 'shadow_v_offset',
	'name' => 'shadow_v_offset',	
	'type' => 'number',
	'val' => isset( $param['shadow_v_offset'] ) ? $param['shadow_v_offset'] : '0',	
	'option' => array (
		'min' => '-50',
		'max' => '50',
		'step' => '1',
		'placeholder' => '0',
	),
);

$shadow_v_offset_help = array (
	'text' => __('The vertical offset of the shadow. A positive value puts the shadow below the box, a negative value puts the shadow above the box.', 'leadgeneration'),	
);

// Popup Shadow Blur Radius
$shadow_blur  = array(
	'id'   => 'shadow_blur',
	'name' => 'shadow_blur',	
	'type' => 'number',
	'val' => isset( $param['shadow_blur'] ) ? $param['shadow_blur'] : '3',	
	'option' => array (
		'min' => '0',
		'max' => '100',
		'step' => '1',
		'placeholder' => '0',
	),
);

$shadow_blur_help = array (
	'text' => __('The blur radius. The higher the number, the more blurred the shadow will be.', 'leadgeneration'),	
);

// Popup Shadow Spread
$shadow_spread  = array(
	'id'   => 'shadow_spread',
	'name' => 'shadow_spread',	
	'type' => 'number',
	'val' => isset( $param['shadow_spread'] ) ? $param['shadow_spread'] : '0',	
	'option' => array (
		'min' => '-100',
		'max' => '100',
		'step' => '1',
		'placeholder' => '0',
	),
);

$shadow_spread_help = array (
	'text' => __('The spread radius. A positive value increases the size of the shadow, a negative value decreases the size of the shadow.', 'leadgeneration'),	
);

// Popup Shadow Color
$shadow_color  = array(
	'id'   => 'shadow_color',
	'name' => 'shadow_color',	
	'type' => 'color',
	'val' => isset( $param['shadow_color'] ) ? $param['shadow_color'] : '#020202',
	'option' => array (	
		'placeholder' => '#020202',
	),
);

$shadow_color_help = array (
	'text' => __('The color of the shadow.', 'leadgeneration'),	
);

// Popup Title font size
$title_size = array(
	'id'   => 'title_size',
	'name' => 'title_size',	
	'type' => 'number',
	'val' => isset( $param['title_size'] ) ? $param['title_size'] : '32',	
	'option' => array (
		'min' => '8',
		'max' => '54',
		'step' => '1',
		'placeholder' => '32',
	),
);

// Popup Title font size helper
$title_size_help = array (
	'text' => __('Set the font size for popup content in px', 'leadgeneration'),
);

// Popup Title Line Height
$title_line_height = array(
	'id'   => 'title_line_height',
	'name' => 'title_line_height',	
	'type' => 'number',
	'val' => isset( $param['title_line_height'] ) ? $param['title_line_height'] : '36',	
	'option' => array (
		'min' => '8',
		'max' => '54',
		'step' => '1',
		'placeholder' => '36',
	),
);

// Popup Title Line Height helper
$title_line_height_help = array (
	'text' => __('The line-height property defines the amount of space above and below inline elements in px.', 'leadgeneration'),
);

// Popup Title Font Family
$title_font = array(
	'id'   => 'title_font',
	'name' => 'title_font',	
	'type' => 'select',
	'val' => isset( $param['title_font'] ) ? $param['title_font'] : 'inherit',	
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

// Popup Title Font Weight
$title_font_weight = array(
	'id'   => 'title_font_weight',
	'name' => 'title_font_weight',	
	'type' => 'select',
	'val' => isset( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'normal',	
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

// Popup Title Font Style
$title_font_style = array(
	'id'   => 'title_font_style',
	'name' => 'title_font_style',	
	'type' => 'select',
	'val' => isset( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal',	
	'option' => array (
		'normal' => 'Normal',
		'italic' => 'Italic',		
	),
);

// Popup Title Align
$title_align = array(
	'id'   => 'title_align',
	'name' => 'title_align',	
	'type' => 'select',
	'val' => isset( $param['title_align'] ) ? $param['title_align'] : 'center',	
	'option' => array (
		'left' => 'Left',
		'center' => 'Center',		
		'right' => 'Right',
	),
);

// Popup Title Color
$title_color = array(
	'id'   => 'title_color',
	'name' => 'title_color',	
	'type' => 'color',
	'val' => isset( $param['title_color'] ) ? $param['title_color'] : '#383838',	
	'option' => array (		
		'placeholder' => '#383838',
	),
);


$content_size = array(
	'id'   => 'content_size',
	'name' => 'content_size',	
	'type' => 'number',
	'val' => isset( $param['content_size'] ) ? $param['content_size'] : '16',	
	'option' => array (
		'min' => '8',
		'max' => '54',
		'step' => '1',
		'placeholder' => '16',
	),
);

$content_font = array(
	'id'   => 'content_font',
	'name' => 'content_font',	
	'type' => 'select',
	'val' => isset( $param['content_font'] ) ? $param['content_font'] : 'inherit',	
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