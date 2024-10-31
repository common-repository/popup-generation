/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

<?php
		/**
		* Popup Style generation
		*
		* @package     Lead_Generation
		* @subpackage  Generator
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	$id = $val->id;
	
	// Genral 
	$zindex = !empty( $param['zindex'] ) ? $param['zindex'] : '999';
	$animate_speed = !empty( $param['animate_speed'] ) ? $param['animate_speed'] : '0.4';
	// Style overlay
	$overlay_background = !empty( $param['overlay_background'] ) ? $param['overlay_background'] : 'rgba(0,0,0,.7)';
	// Popup Style
	$position = !empty( $param['position'] ) ? $param['position'] : 'fixed';
	$width = !empty( $param['width'] ) ? $param['width'] : '480px';
	$height = !empty( $param['height'] ) ? $param['height'] : '280px';
	$background = !empty( $param['background'] ) ? $param['background'] : '#ffffff';	
	$background_image = !empty( $param['background_image'] ) ? 'background-image: url(' . $param['background_image'] . '); background-size:cover;' : '';
	$margin = !empty( $param['margin'] ) ? $param['margin'] : '0';
	$padding = !empty( $param['padding'] ) ? $param['padding'] : '0';	
	$location = !empty( $param['location'] ) ? $param['location'] : 'center';
	$location_top = !empty( $param['location_top'] ) ? $param['location_top'] : '0';
	$location_bottom = !empty( $param['location_bottom'] ) ? $param['location_bottom'] : '0';
	$location_left = !empty( $param['location_left'] ) ? $param['location_left'] : '0';
	$location_right = !empty( $param['location_right'] ) ? $param['location_right'] : '0';
	switch( $location ) {
		case 'topLeft':
		$loc = 'top: ' . $location_top . 'px;';
		$loc .= 'left: ' . $location_left . 'px;';
		break;
		case 'topCenter':
		$loc = 'top: ' . $location_top . 'px;';		
		break;
		case 'topRight':
		$loc = 'top: ' . $location_top . 'px;';
		$loc .= 'right: ' . $location_right . 'px;';
		break;
		case 'bottomLeft':
		$loc = 'bottom: ' . $location_bottom . 'px;';
		$loc .= 'left: ' . $location_left . 'px;';
		break;
		case 'bottomCenter':
		$loc = 'bottom: ' . $location_bottom . 'px;';		
		break;
		case 'bottomRight':
		$loc = 'bottom: ' . $location_bottom . 'px;';
		$loc .= 'right: ' . $location_right . 'px;';
		break;
		case 'left':
		$loc = 'left: ' . $location_left . 'px;';		
		break;
		case 'right':
		$loc = 'right: ' . $location_right . 'px;';		
		break;
		default:
		$loc = '';
	}	
	$border_radius = !empty( $param['border_radius'] ) ? $param['border_radius'] . 'px' : '0';
	$border_style = !empty( $param['border_style'] ) ? $param['border_style'] : 'none';
	$border_color = !empty( $param['border_color'] ) ? $param['border_color'] : '#383838';
	$border_width = !empty( $param['border_width'] ) ? $param['border_width'] . 'px' : '0';	
	$shadow = !empty( $param['shadow'] ) ? $param['shadow'] : 'none';	
	$shadow_h_offset = !empty( $param['shadow_h_offset'] ) ? $param['shadow_h_offset'] . 'px' : '0';
	$shadow_v_offset = !empty( $param['shadow_v_offset'] ) ? $param['shadow_v_offset'] . 'px' : '0';
	$shadow_blur = !empty( $param['shadow_blur'] ) ? $param['shadow_blur'] . 'px' : '0';
	$shadow_spread = !empty( $param['shadow_spread'] ) ? $param['shadow_spread'] . 'px' : '0';
	$shadow_color = !empty( $param['border_color'] ) ? $param['border_color'] : '#020202';	
	switch( $shadow ) {					
			case 'none':
			$box_shadow = 'box-shadow: none;';
			break;
			case 'outset':
			$box_shadow = 'box-shadow: ' . $shadow_h_offset .' ' . $shadow_v_offset .' ' . $shadow_blur .' ' . $shadow_spread .' ' . $shadow_color .';';
			break;
			default:
			$box_shadow = 'box-shadow: inset ' . $shadow_h_offset .' ' . $shadow_v_offset .' ' . $shadow_blur .' ' . $shadow_spread .' ' . $shadow_color .';';			
	}	
	
	// Popup Title style
	$title_font = !empty( $param['title_font'] ) ? $param['title_font'] : 'inherit';
	$title_size = !empty( $param['title_size'] ) ? $param['title_size'] : '32';
	$title_line_height = !empty( $param['title_line_height'] ) ? $param['title_line_height'] : '36';
	$title_font_weight = !empty( $param['title_font_weight'] ) ? $param['title_font_weight'] : 'normal';
	$title_font_style = !empty( $param['title_font_style'] ) ? $param['title_font_style'] : 'normal';
	$title_align = !empty( $param['title_align'] ) ? $param['title_align'] : 'center';
	$title_color = !empty( $param['title_color'] ) ? $param['title_color'] : '#383838';
	
	// Content Style
	$content_size = !empty( $param['content_size'] ) ? $param['content_size'] : '16';
	$content_font = !empty( $param['content_font'] ) ? $param['content_font'] : 'inherit';
	
	// Close Button Style
	$close_type = !empty( $param['close_type'] ) ? $param['close_type'] : 'text';	
	$close_location = !empty( $param['close_location'] ) ? $param['close_location'] : 'topRight';
	$location_close_top = !empty( $param['location_close_top'] ) ? $param['location_close_top'] : '0';
	$location_close_bottom = !empty( $param['location_close_bottom'] ) ? $param['location_close_bottom'] : '0';
	$location_close_left = !empty( $param['location_close_left'] ) ? $param['location_close_left'] : '0';
	$location_close_right = !empty( $param['location_close_right'] ) ? $param['location_close_right'] : '0';	
	switch( $close_location ) {
		case 'topLeft':
		$btn_loc = 'top: ' . $location_close_top . 'px;';
		$btn_loc .= 'left: ' . $location_close_left . 'px;';
		break;		
		case 'topRight':
		$btn_loc = 'top: ' . $location_close_top . 'px;';
		$btn_loc .= 'right: ' . $location_close_right . 'px;';
		break;
		case 'bottomLeft':
		$btn_loc = 'bottom: ' . $location_close_bottom . 'px;';
		$btn_loc .= 'left: ' . $location_close_left . 'px;';
		break;		
		case 'bottomRight':
		$btn_loc = 'bottom: ' . $location_close_bottom . 'px;';
		$btn_loc .= 'right: ' . $location_close_right . 'px;';
		break;		
		default:
		$btn_loc = '';
	}	
	$btn_text = !empty( $param['btn_text'] ) ? $param['btn_text'] : __( 'CLOSE', 'leadgeneration' );
	$btn_text_padding = !empty( $param['btn_text_padding'] ) ? $param['btn_text_padding'] : '6px 12px';
	$btn_box_size = !empty( $param['btn_box_size'] ) ? $param['btn_box_size'] : '0';
	$btn_size = !empty( $param['btn_size'] ) ? $param['btn_size'] : '0';
	$btn_font = !empty( $param['btn_font'] ) ? $param['btn_font'] : 'inherit';
	$btn_font_weight = !empty( $param['btn_font_weight'] ) ? $param['btn_font_weight'] : 'normal';
	$btn_font_style = !empty( $param['btn_font_style'] ) ? $param['btn_font_style'] : 'normal';
	$btn_color = !empty( $param['btn_color'] ) ? $param['btn_color'] : '#fff';
	$btn_color_hover = !empty( $param['btn_color_hover'] ) ? $param['btn_color_hover'] : '#000';
	$btn_background = !empty( $param['btn_background'] ) ? $param['btn_background'] : '#000';
	$btn_background_hover = !empty( $param['btn_background_hover'] ) ? $param['btn_background_hover'] : '#fff';
	$btn_border_radius = !empty( $param['btn_border_radius'] ) ? $param['btn_border_radius'] . 'px' : '0';
	
	if ( $close_type == 'text' ) {			
		$close_css = '
			content: "' . $btn_text .'";
			color: ' . $btn_color .';
			padding: ' . $btn_text_padding .';
			font-family: ' . $btn_font . ';
			font-size: ' . $btn_size . 'px;
			font-weight: ' . $btn_font_weight . ';
			font-style: ' . $btn_font_style . ';
			background: linear-gradient(to right, ' . $btn_background_hover .' 50%, ' . $btn_background .' 50%);
			background-size: 200% 100%;
			background-position: right bottom;
			border-radius: ' . $btn_border_radius . ';
		';
		$close_hover_css = '
			color: ' . $btn_color_hover .';
			background-position: left bottom;
		';	
	}
	else {
		$close_css = '
			content: "\00d7";	
			text-align: center;
			width: ' . $btn_box_size .'px;
			height: ' . $btn_box_size .'px;
			line-height: ' . $btn_box_size .'px;
			color: ' . $btn_color .';			
			font-family: ' . $btn_font . ';
			font-size: ' . $btn_size . 'px;
			font-weight: ' . $btn_font_weight . ';
			font-style: ' . $btn_font_style . ';
			background: ' . $btn_background .';	
			border-radius: ' . $btn_border_radius . ';
		';
		$close_hover_css = '
			color: ' . $btn_color_hover .';
			background: ' . $btn_background_hover .';
		';
		
	}
	
	$css = '';
	// Overlay
	$css .= '
	#lg-popup-' . $id . '.lg-popup-overlay {
		z-index: ' . $zindex . ';
		background-color: ' . $overlay_background . ';
		-webkit-animation-duration : ' . $animate_speed . 's;
		animation-duration : ' . $animate_speed . 's;
	}
	';
	// Popup location
	if ( !empty( $loc ) ){
		$css .= ' 
		#lg-popup-' . $id . ' .lg-popup.' . $location . ' {
			' . $loc . '
		}
		';
	}
	// Popup
	$css .= '
	#lg-popup-' . $id . ' .lg-popup {
		z-index: ' . $zindex . ';		
		background: ' . $background . ';
		-webkit-animation-duration : ' . $animate_speed . 's;
		animation-duration : ' . $animate_speed . 's;
		-webkit-animation-delay : ' . $animate_speed/2 . 's;
		animation-delay : ' . $animate_speed/2 . 's;
		margin: ' . $margin . ';
		padding: ' . $padding . ';
		border-radius: ' . $border_radius . ';
		border-style: ' . $border_style . ';
		border-color: ' . $border_color . ';
		border-width: ' . $border_width . ';
		width: ' . $width . ';
		height: ' . $height . ';
		position: ' . $position . ';
		' . $background_image . '
		' . $box_shadow . '
	}
	';
	// Title
	$css .= '
	#lg-popup-' . $id . ' .lg-title {
		font-family: ' . $title_font . ';
		font-size: ' . $title_size . 'px;
		font-weight: ' . $title_font_weight . ';
		font-style: ' . $title_font_style . ';
		line-height: ' . $title_line_height . 'px;
		text-align: ' . $title_align . ';
		color: ' . $title_color . ';
	
	}	
	';
	// Content 
	$css .= '
	#lg-popup-' . $id . ' .lg-popup {
		font-family: ' . $content_font . ';
		font-size: ' . $content_size . 'px;	
	}	
	';
	// Close Button 
	$css .= '
	#lg-popup-' . $id . ' .lg-popup-close-btn {
		' . $btn_loc . '
	}	
	';
	$css .= '
	#lg-popup-' . $id . ' .lg-popup-close-btn.' . $close_type . ':before {
		' . $close_css . '
	}	
	#lg-popup-' . $id . ' .lg-popup-close-btn.' . $close_type . ':hover:before {
		' . $close_hover_css . '
	}	
	';
	$css = trim(preg_replace('~\s+~s', ' ', $css));
	echo $css;