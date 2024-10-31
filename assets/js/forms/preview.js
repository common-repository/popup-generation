/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {
	jQuery('#postoptions').change(function() {
		preview_form();
	})
	$(".wp-color-picker-field").wpColorPicker( 
	'option',
  'change',
	function(event, ui) {
			preview_form();
		}
	);
	preview_form();
})

function preview_form() {
	preview_builder_form();
	preview_builder_field();
	preview_builder_button();
}

// Form
function preview_builder_form() {	
	var width = jQuery('#lg_width').val();
	var background = jQuery('#lg_background').val();
	var margin = jQuery('#lg_margin').val();
	var padding = jQuery('#lg_padding').val();
	
	var border_radius = jQuery('#lg_border_radius').val();
	var border_style = jQuery('#lg_border_style').val();
	var border_color = jQuery('#lg_border_color').val();
	var border_width = jQuery('#lg_border_width').val();
	
	
	var shadow = jQuery('#lg_shadow').val();
	var shadow_h_offset = jQuery('#lg_shadow_h_offset').val();
	var shadow_v_offset = jQuery('#lg_shadow_v_offset').val();
	var shadow_blur = jQuery('#lg_shadow_blur').val();
	var shadow_spread = jQuery('#lg_shadow_spread').val();
	var shadow_color = jQuery('#lg_shadow_color').val();
	
	
	var title_size = jQuery('#lg_title_size').val();	
	var title_font = jQuery('#lg_title_font').val();
	var title_font_weight = jQuery('#lg_title_font_weight').val();
	var title_font_style = jQuery('#lg_title_font_style').val();
	var title_align = jQuery('#lg_title_align').val();
	var title_color = jQuery('#lg_title_color').val();
	
	
	if ( shadow == 'none'  ) {
		var boxshadow = '';
		}
	else if (  shadow == 'outset' ) {
		var boxshadow = shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	else if (  shadow == 'inset' ) {
		var boxshadow = 'inset ' + shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	jQuery('#lg-form-builder').css({
		'max-width' : width,
		'margin' : margin,
		'padding' : padding,
		'background' : background,
		'border-radius' : border_radius,
		'border-style' : border_style,
		'border-color' : border_color,
		'border-width' : border_width + 'px',		
		'box-shadow' : boxshadow,
	});
	
	jQuery('.lg-field-title').css({
		'font-size' : title_size + 'px',		
		'font-family' : title_font,
		'font-weight' : title_font_weight,
		'font-style' : title_font_style,
		'text-align' : title_align,
		'color' : title_color,		
	});	
}

// Field
function preview_builder_field() {
	
	var margin = jQuery('#lg_field_margin').val();
	var padding = jQuery('#lg_field_padding').val();
	var background = jQuery('#lg_field_background').val();
	
	var size = jQuery('#lg_field_font_size').val();	
	var font = jQuery('#lg_field_font').val();
	var font_weight = jQuery('#lg_field_font_weight').val();
	var font_style = jQuery('#lg_field_font_style').val();
	var color = jQuery('#lg_field_font_color').val();
	var placeholdercolor = jQuery('#lg_field_placeholder_color').val();
	
	var border_radius = jQuery('#lg_field_border_radius').val();
	var border_style = jQuery('#lg_field_border_style').val();
	var border_color = jQuery('#lg_field_border_color').val();
	var border_width = jQuery('#lg_field_border_width').val();
	
	var shadow = jQuery('#lg_field_shadow').val();
	var shadow_h_offset = jQuery('#lg_field_shadow_h_offset').val();
	var shadow_v_offset = jQuery('#lg_field_shadow_v_offset').val();
	var shadow_blur = jQuery('#lg_field_shadow_blur').val();
	var shadow_spread = jQuery('#lg_field_shadow_spread').val();
	var shadow_color = jQuery('#lg_field_shadow_color').val();
	
	if ( shadow == 'none'  ) {
		var boxshadow = '';
		}
	else if (  shadow == 'outset' ) {
		var boxshadow = shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	else if (  shadow == 'inset' ) {
		var boxshadow = 'inset ' + shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	
	jQuery('#lg-form-builder input[type="text"], #lg-form-builder input[type="email"], #lg-form-builder input[type="url"], #lg-form-builder input[type="tel"], #lg-form-builder input[type="number"], #lg-form-builder input[type="date"], #lg-form-builder select, #lg-form-builder textarea').css({
		'font-size' : size + 'px',		
		'font-family' : font,
		'font-weight' : font_weight,
		'font-style' : font_style,		
		'color' : color,
		'padding' : padding,
		'line-height' : 'auto',
		'height' : 'auto',		
		'background' : background,
		'border-radius' : border_radius,
		'border-style' : border_style,
		'border-color' : border_color,
		'border-width' : border_width + 'px',		
		'box-shadow' : boxshadow,		
	});
	
	jQuery('.lg-col-el').css({		
		'padding' : margin,		
		
	});			
	jQuery('#lg-form-builder label').css({
		'font-size' : size + 'px',		
		'font-family' : font,
		'font-weight' : font_weight,
		'font-style' : font_style,		
		'color' : color,		
	});		
}

function preview_builder_button() { 
	var width = jQuery('#lg_button_width').val();
	var color = jQuery('#lg_button_color').val();
	var background = jQuery('#lg_button_background').val();
	var backgroundhover = jQuery('#lg_button_background_hover').val();
		
	var padding = jQuery('#lg_field_padding').val();
	var size = jQuery('#lg_field_font_size').val();	
	var font = jQuery('#lg_field_font').val();
	var font_weight = jQuery('#lg_field_font_weight').val();
	var font_style = jQuery('#lg_field_font_style').val();
	
	var button_align = jQuery('#lg_button_align').val();
	var button_text_align = jQuery('#lg_button_text_align').val();
	
	
	jQuery('#lg-form-builder input[type="submit"]').css({
		'width' : width,				
		'color' : color,		
		'background' : background,		
		'font-size' : size + 'px',		
		'font-family' : font,
		'font-weight' : font_weight,
		'font-style' : font_style,
		'line-height' : 'auto',
		'height' : 'auto',
		'padding' : padding,
		'text-align' : button_text_align,
	});
	
	jQuery('#lg-form-builder .lg-button').css({		
		'text-align' : button_align,
	});
	
	var scale = jQuery('#lg_scale_recaptcha').val();
	
	jQuery('#lg-form-builder .g-recaptcha').css({		
		'transform' : 'scale(' + scale + ')',
	});
	
	
	
}