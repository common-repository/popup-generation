/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.1
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {
	jQuery('#postoptions').change(function() {
		preview_button();
		preview_badge();
	})
	$(".wp-color-picker-field").wpColorPicker( 
	'option',
  'change',
	function(event, ui) {
			preview_button();
			preview_badge();
		}
	);
	preview_button();
	preview_badge();
})

// Build button
function preview_button() {	
	var appearance = jQuery('#lg_appearance').val();
	var btn_text = jQuery('#lg_text').val();
	var icon = jQuery('#lg_icon').val();	
	var text_location = jQuery('#lg_text_location').val();
	var rotate_icon = jQuery('#lg_rotate_icon').val();
	var rotate_button = jQuery('#lg_rotate_button').val();
	
	
	var width = jQuery('#lg_width').val();
	var height = jQuery('#lg_height').val();
	var color = jQuery('#lg_color').val();
	var background = jQuery('#lg_background').val();
	
	
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
	
	
	var font_size = jQuery('#lg_font_size').val();	
	var font_family = jQuery('#lg_font_family').val();
	var font_weight = jQuery('#lg_font_weight').val();
	var font_style = jQuery('#lg_font_style').val();
	
	
	
	if ( shadow == 'none'  ) {
		var boxshadow = '';
		}
	else if (  shadow == 'outset' ) {
		var boxshadow = shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	else if (  shadow == 'inset' ) {
		var boxshadow = 'inset ' + shadow_h_offset + 'px ' + shadow_v_offset + 'px ' + shadow_blur + 'px ' + shadow_spread + 'px ' + shadow_color;
	}
	jQuery('#button-preview').css({
		'width' : width,
		'height' : height,
		'line-height' : height,
		'background' : background,
		'color' : color,
		'border-radius' : border_radius,
		'border-style' : border_style,
		'border-color' : border_color,
		'border-width' : border_width + 'px',		
		'box-shadow' : boxshadow,
		'font-size' : font_size + 'px',		
		'font-family' : font_family,
		'font-weight' : font_weight,
		'font-style' : font_style,
		'text-align' : 'center',
		'position' : 'relative',
		'transform' : 'rotate(' + rotate_button + ')',
	});


	if ( appearance == 'text' ) {
		jQuery('#button-preview .content').html(btn_text);
	}
	else if ( appearance == 'text_icon' ) {
		if ( text_location == 'after' ) {
			jQuery('#button-preview .content').html( '<i class="' + icon + ' ' + rotate_icon + '"></i> ' + btn_text );
		} 
		else {
			jQuery('#button-preview .content').html( btn_text + ' <i class="' + icon + ' ' + rotate_icon + '"></i>' );
		}
		
	}
	else if ( appearance == 'icon' ) {
		jQuery('#button-preview .content').html( '<i class="' + icon + ' ' + rotate_icon + '"></i>' );
	}
}

function preview_badge() {
	if (jQuery('#lg_enable_badge').is(':checked')){
		jQuery('#button-preview .badge').css('display', '');
	
	var content = jQuery('#lg_badge_content').val();
	
	var width = jQuery('#lg_badge_width').val();
	var height = jQuery('#lg_badge_height').val();
	var color = jQuery('#lg_badge_color').val();
	var background = jQuery('#lg_badge_background').val();
	
	var border_radius = jQuery('#lg_badge_border_radius').val();
	var border_style = jQuery('#lg_badge_border_style').val();
	var border_color = jQuery('#lg_badge_border_color').val();
	var border_width = jQuery('#lg_badge_border_width').val();
	
	var font_size = jQuery('#lg_badge_font_size').val();	
	var font_family = jQuery('#lg_badge_font_family').val();
	var font_weight = jQuery('#lg_badge_font_weight').val();
	var font_style = jQuery('#lg_badge_font_style').val();
	
	jQuery('#button-preview .badge').text(content);
	
	jQuery('#button-preview .badge').css({	
		'width' : width,
		'height' : height,
		'line-height' : height,
		'background' : background,
		'color' : color,
		'border-radius' : border_radius,
		'border-style' : border_style,
		'border-color' : border_color,
		'border-width' : border_width + 'px',	
		'font-size' : font_size + 'px',		
		'font-family' : font_family,
		'font-weight' : font_weight,
		'font-style' : font_style,
		'text-align' : 'center',
		'position' : 'absolute',
		'top' : '-10px',
		'right' : '-10px',		
	});
		
		
	}
	else {
		jQuery('#button-preview .badge').css('display', 'none');
		
	}
	
	
	
}
