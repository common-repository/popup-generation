/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {
	$( "#lg-form-builder" ).sortable({
		stop: function( event, ui ) {
			add_content();
		}
	});
  $( "#lg-form-builder" ).disableSelection();
	
	$('#lg-form-trash').droppable({			
		drop: function(event, ui) {
			$(ui.helper).remove();
			add_content();
		}
	});
	
	var form_html = $('#lg-form-builder').html();		
	$("#form-content").val(form_html);
	
		
	$("body").on("click",".lg-insert-form",function(e){	
		var type = $('#field_type').val();
		var width = $('#field_width').val();
		
		if ( $('#field_required').is(':checked') ){
			var required = ' data-required="required"';
		}
		else {
			var required = '';
		}
		
		var label = $('#field_label').val();
		var label = label != '' ? '<div class="lg-field-title">'+ label + '</div>' : '';
		
		var name = $('#field_name').val();
		if ( name != '') {
			var name = ' name="' + name + '"';
		}
		else {
			var name_el = field_count();
			var name = ' name="' + name_el + '"';
		}
		
		var id = $('#field_id').val();
		var id = id != '' ? ' id="' + id + '"' : '';		
		
		var clas = $('#field_class').val();		
		var clas = clas != '' ? ' class="' + clas + '"' : '';
		
		var placeholder = $('#field_placeholder').val();
		var placeholder = placeholder != '' ? ' placeholder="' + placeholder + '"' : '';
		
		var value = $('#field_value').val();
		var value = value != '' ? ' value="' + value + '"' : '';
		
		var min = $('#field_min').val();
		var min = min != '' ? ' min="' + min + '"' : '';
		
		var max = $('#field_max').val();
		var max = max != '' ? ' max="' + max + '"' : '';
		
		var step = $('#field_step').val();
		var step = step != '' ? ' step="' + step + '"' : '';
		
		var date_min = $('#field_date_min').val();
		var date_min = date_min != '' ? ' min="' + date_min + '"' : '';
		
		
		var date_max = $('#field_date_max').val();
		var date_min = date_max != '' ? ' max="' + date_max + '"' : '';
		
		
		if( type == 'text') {
			var field = label + '<input type="text"' + name + id + clas + placeholder + value + required +'>';
		}
		else if ( type == 'email' ) {
			var field = label + '<input type="email"' + name + id + clas + placeholder + value + required +'>';
		}
		else if ( type == 'url' ) {
			var field = label + '<input type="url"' + name + id + clas + placeholder + value + required +'>';
		}
		else if ( type == 'tel' ) {
			var field = label + '<input type="tel"' + name + id + clas + placeholder + value + required +'>';
		}
		else if ( type == 'number' ) {
			var field = label + '<input type="number"' + name + id + clas + placeholder + value + min + max + step + required +'>';
		}
		else if ( type == 'date' ) {
			var field = label + '<input type="date"' + name + id + clas + placeholder + value + date_min + date_max + required +'>';
		}
		else if ( type == 'hidden' ) {
			var label = label != '' ? '<div style="visibility: hidden">'+ label + '</div>' : '';
			var field = label + '<input type="hidden"' + name + id + clas + placeholder + value +'>';
		}		
		else if ( type == 'submit' ) {			
			var field = '<input type="submit"' + name + id + clas + value + ' >';
		}
		else if ( type == 'textarea' ) {
			var rows = $('#field_rows').val();		
			var rows = rows != '' ? ' rows="' + rows + '"' : 'rows="10"';
			var value = $('#field_value').val();			
			var field = '<textarea' + name + id + clas + placeholder + rows + required +'>' + value + '</textarea>';
		}
		else if ( type == 'select' ) {
			if (jQuery('#field_multiple').is(':checked')){
				var multiple = ' multiple';
				var name = $('#field_name').val();
				if ( name != '') {
					var name = ' name="' + name + '[]"';
				}
				else {
					var name_el = field_count();
					var name = ' name="' + name_el + '[]"';
				}				
			}
			else {
				var multiple = '';
			}
			
			
			
			var field = '<select' + name + id + clas + multiple +'>';
			var options = $('#lg-options').val();		
			var arr = options.split('\n');
			for (var i = 0; i < arr.length; i++) {
				var elem = arr[i].split('|');
				if (elem[0].search( /\*/ ) != -1 ) {
					var sel = ' selected="selected"';
					elem[0] = elem[0].substr(1);
				}
				else {
					var sel = '';
				}
				if (elem.length == 1 && elem[0] != '') {
					var field = field + '<option' + sel + '>' + elem[0] + '</option>';
				}
				else if (elem.length == 2) {
					var field = field + '<option value="' + elem[1] + '"' + sel + '>' + elem[0] + '</option>';
				}					
			}
			var field = field + '</select>';
		}
		else if ( type == 'radio' ) {
			var field = '';
			var options = $('#lg-options').val();		
			var arr = options.split('\n');
			for (var i = 0; i < arr.length; i++) {
				var elem = arr[i].split('|');
				if (elem[0].search( /\*/ ) != -1 ) {
					var sel = ' checked';
					elem[0] = elem[0].substr(1);
				}
				else {
					var sel = '';
				}
				if (elem.length == 1 && elem[0] != '') {
					var field = field + '<label> ';
					if (jQuery('#field_label_first').is(':checked')){ 
						var field = field + elem[0];
						var field = field + '<input type="radio"' + name + id + clas + sel+ ' value="' + elem[0] + '">';
					}
					else {
						var field = field + '<input type="radio"' + name + id + clas + sel+ ' value="' + elem[0] + '">';
						var field = field + elem[0];
					}					
					var field = field + ' </label>';
				}
				else if (elem.length == 2) {
					var field = field + '<label> ';
					if (jQuery('#field_label_first').is(':checked')){ 
						var field = field + elem[0];
						var field = field + ' <input type="radio"' + name + id + clas + sel+ ' value="' + elem[1] + '">';
					}
					else {
						var field = field + '<input type="radio"' + name + id + clas + sel+ ' value="' + elem[1] + '"> ';
						var field = field + elem[0];
					}					
					var field = field + ' </label>';				
				}					
			}
			
		}
		
		else if ( type == 'checkbox' ) {
			var field = '';
			var name = $('#field_name').val();
			if ( name != '') {
				var name = ' name="' + name + '[]"';
			}
			else {
				var name_el = field_count();
				var name = ' name="' + name_el + '[]"';
			}			
			var options = $('#lg-options').val();		
			var arr = options.split('\n');
			for (var i = 0; i < arr.length; i++) {
				var elem = arr[i].split('|');
				if (elem[0].search( /\*/ ) != -1 ) {
					var sel = ' checked';
					elem[0] = elem[0].substr(1);
				}
				else {
					var sel = '';
				}
				if (elem.length == 1 && elem[0] != '') {
					var field = field + '<label> ';
					if (jQuery('#field_label_first').is(':checked')){ 
						var field = field + elem[0];
						var field = field + '<input type="checkbox"' + name + id + clas + sel+ ' value="' + elem[0] + '">';
					}
					else {
						var field = field + '<input type="checkbox"' + name + id + clas + sel+ ' value="' + elem[0] + '">';
						var field = field + elem[0];
					}					
					var field = field + ' </label>';
				}
				else if (elem.length == 2) {
					var field = field + '<label> ';
					if (jQuery('#field_label_first').is(':checked')){ 
						var field = field + elem[0];
						var field = field + ' <input type="checkbox"' + name + id + clas + sel+ ' value="' + elem[1] + '">';
					}
					else {
						var field = field + '<input type="checkbox"' + name + id + clas + sel+ ' value="' + elem[1] + '"> ';
						var field = field + elem[0];
					}					
					var field = field + ' </label>';				
				}					
			}
			
		}
		else if ( type == 'recaptcha' ) {
			var key = $('#field_site_key').val();
			var them = $('#field_captcha_them').val();
			var size = $('#field_captcha_size').val();
			var field = '<div class="g-recaptcha" data-theme="' + them + '" data-size="' + size + '" data-sitekey="' + key + '"></div>';
		}
		
		if ( type == 'submit' ) {			
			var field = '<div class="lg-col-el lg-col-' + width + ' lg-button">' + field + '</div>';
		}
		else {
			var field = '<div class="lg-col-el lg-col-' + width + '">' + field + '</div>';
		}
		
		$("#lg-form-builder").append(field);
		add_content();
		preview_form();
		all_atrr_name();
		tb_remove();		
	});	
	
	lg_edit();
	border();
	shadow();
	field_type();	
	field_border();
	field_shadow();
	users_roles();
	max_screen_enable();
	min_screen_enable();
	language_enable();
	all_atrr_name();
	adminmail();
	usermail();
	savemail();
	recaptcha();
	sending();
	sendingclosetext();
	responsive();
})

function all_atrr_name() {
	var arrkey = [];	
	jQuery("#lg-form-builder").find('input:not([type=submit]), textarea, select').each( function(){
		var tmp = jQuery(this).attr("name");
		var tmpr = tmp.replace(/\[\]/,"");
		var tmprs = ' {' + tmpr + '}';
		arrkey.push(tmprs);		
	});
	
	var obj = {};
  for (var i = 0; i < arrkey.length; i++) {
    var str = arrkey[i];
    obj[str] = true; 
  }	
	var form_key = Object.keys(obj);	
	jQuery(".mail-tags").text(form_key);
}	

function lg_edit( type ) {
	jQuery("#lg-ctrl-el-visual").addClass('active');
	jQuery(".lg-ctrl-visual").css('display', 'block');
	jQuery(".lg-ctrl-text").css('display', 'none');
	if (type == 'text') {
		jQuery("#lg-ctrl-el-text").addClass('active');
	jQuery(".lg-ctrl-visual").css('display', 'none');
	jQuery(".lg-ctrl-text").css('display', 'block');		
	}
	else {
		var newHTML = jQuery("#form-content").val();
		jQuery("#lg-form-builder").html(newHTML);
		preview_form();		
		all_atrr_name();
	}
}

function add_content() {
	var form_html = jQuery('#lg-form-builder').html();
	var new_form_html = form_html.replace(/style.+?;"/g,"");
	var new_form_html = new_form_html.replace(/ui-sortable-handle/g,"");	
	jQuery("#form-content").val(new_form_html);
}

function add_item() {
	var name_el = field_count();	
	jQuery("#field_name").val(name_el);
	tb_show( '', '/?TB_inline&inlineId=lg-field-generator&width=700&height=500' );
}

function field_type() {	
	jQuery('.lg-attribute').css('display', 'block');
	jQuery('#lg-recaptcha').css('display', 'none');
	jQuery('.lg-text').css('display', 'none');
	jQuery('.lg-textarea').css('visibility', 'hidden');
	jQuery('.lg-number').css('display', 'none');
	jQuery('.lg-date').css('display', 'none');
	jQuery('.lg-selected').css('display', 'none');	
	jQuery('.lg-select').css('display', 'none');
	jQuery('.lg-required').css('display', 'none');	
	jQuery('.lg-radio').css('display', 'none');		
	var type = jQuery('#field_type').val();	
	if( type == 'text' || type == 'email' || type == 'url' || type == 'tel' || type == 'hidden' ) { 
		jQuery('.lg-submit').css('visibility', 'visible');
		jQuery('.lg-text').css('display', 'block');		
		jQuery('.lg-required').css('display', 'block');	
	}
	else if ( type == 'number') {
		jQuery('.lg-submit').css('visibility', 'visible');
		jQuery('.lg-text').css('display', 'block');	
		jQuery('.lg-number').css('display', 'block');
		jQuery('.lg-required').css('display', 'block');
	}
	else if ( type == 'date') {
		jQuery('.lg-submit').css('visibility', 'visible');
		jQuery('.lg-text').css('display', 'block');	
		jQuery('.lg-date').css('display', 'block');
		jQuery('.lg-required').css('display', 'block');
	}
	else if ( type == 'submit') {		
		jQuery('.lg-submit').css('visibility', 'hidden');
		jQuery('.lg-text').css('display', 'block');
		jQuery('.lg-number').css('display', 'none');
		jQuery('.lg-date').css('display', 'none');
	}
	else if ( type == 'select') {	
		jQuery('.lg-selected').css('display', 'block');
		jQuery('.lg-select').css('display', 'block');
	}
	else if ( type == 'radio') {	
		jQuery('.lg-selected').css('display', 'block');
		jQuery('.lg-radio').css('display', 'block');
	}
	else if ( type == 'checkbox') {	
		jQuery('.lg-selected').css('display', 'block');
		jQuery('.lg-radio').css('display', 'block');
	}
	else if ( type == 'textarea') {			
		jQuery('.lg-text').css('display', 'block');
		jQuery('.lg-textarea').css('visibility', 'visible');
		jQuery('.lg-submit').css('visibility', 'visible');
		jQuery('.lg-required').css('display', 'block');
	}
	else if ( type == 'recaptcha') {			
		jQuery('.lg-attribute').css('display', 'none');
		jQuery('#lg-recaptcha').css('display', 'block');
	}
}

function field_count() {
	var els = jQuery("#lg-form-builder").find('input, textarea, select' );
	var countel = els.length+1;	
	var next_el = 'element-' + countel;	
	var count_el = jQuery("#lg-form-builder [name='" + next_el + "']").length;
	if ( count_el ) {
		var next_el = 'element-' + countel + '-1';
	}
	return next_el;
}

function border(){
	var border = jQuery('#lg_border_style').val();
	if (border == 'none') {
		jQuery('.border').css('display', 'none');
		}	else {
		jQuery('.border').css('display', 'block');
	}
}

function shadow() {	
	var shadow = jQuery('#lg_field_shadow').val();
	if (shadow == 'none') {
		jQuery('.shadow').css('visibility', 'hidden');
		jQuery('#shadow').css('display', 'none');
		}	else {
		jQuery('.shadow').css('visibility', 'visible');
		jQuery('#shadow').css('display', 'block');		
	}
}

function field_border(){
	var border = jQuery('#lg_field_border_style').val();
	if (border == 'none') {
		jQuery('.field-border').css('display', 'none');
		}	else {
		jQuery('.field-border').css('display', 'block');
	}
}

function field_shadow() {	
	var shadow = jQuery('#lg_field_shadow').val();
	if (shadow == 'none') {
		jQuery('.field-shadow').css('visibility', 'hidden');
		jQuery('#field-shadow').css('display', 'none');
		}	else {
		jQuery('.field-shadow').css('visibility', 'visible');
		jQuery('#field-shadow').css('display', 'block');		
	}
}

function users_roles() {	
	var users = jQuery('input[name="param[users]"]:checked').val();	
	if (users == 'authorized'){
		jQuery('#lg_users_roles').css('display', '');
	}
	else{
		jQuery('#lg_users_roles').css('display', 'none');
	}
}

//* Show screen
function max_screen_enable(){
	if (jQuery('#lg_max_screen_enable').is(':checked')){
		jQuery('#lg_max_screen').css('display', '');
	}
	else {
		jQuery('#lg_max_screen').css('display', 'none');
	}
}

function min_screen_enable(){
	if (jQuery('#lg_min_screen_enable').is(':checked')){
		jQuery('#lg_min_screen').css('display', '');
	}
	else {
		jQuery('#lg_min_screen').css('display', 'none');
	}
}

function language_enable() {
	if (jQuery('#lg_language_enable').is(':checked')){
		jQuery('#lg_language').css('display', '');
	}
	else {
		jQuery('#lg_language').css('display', 'none');
	}
}

function adminmail() {
	if (jQuery('#lg_admin_mail').is(':checked')){
		jQuery('#admin_mail').css('display', '');
	}
	else {
		jQuery('#admin_mail').css('display', 'none');
	}
}

function usermail() {
	if (jQuery('#lg_user_mail').is(':checked')){
		jQuery('#user_mail').css('display', '');
	}
	else {
		jQuery('#user_mail').css('display', 'none');
	}
}

function savemail() {
	if (jQuery('#lg_save_mail').is(':checked')){
		jQuery('#save_mail').css('display', '');
	}
	else {
		jQuery('#save_mail').css('display', 'none');
	}
}

function recaptcha() {
	if (jQuery('#lg_recaptcha_enable').is(':checked')){
		jQuery('.recaptcha').css('display', '');
	}
	else {
		jQuery('.recaptcha').css('display', 'none');
	}
}

function sending() {
	jQuery('.lg-sending-1').css('display', 'none');
	jQuery('.lg-sending-2').css('display', 'none');
	var sending = jQuery('[name="param[sending_options]"]:checked').val();	
	if ( sending == 1 ) {
		jQuery('.lg-sending-1').css('display', 'block');
	}
	else {
		jQuery('.lg-sending-2').css('display', 'block');
	}
}

function sendingclosetext() {
	if (jQuery('#lg_sending_close_text').is(':checked')){
		jQuery('#lg_sending_close_time').css('visibility', 'visible');	
		jQuery('.close-popup').css('visibility', 'visible');
	}
	else {
		jQuery('#lg_sending_close_time').css('visibility', 'hidden');	
		jQuery('.close-popup').css('visibility', 'hidden');
	}
}

function responsive() {
	if (jQuery('#lg_responsive').is(':checked')){
		jQuery('#lg_responsive_breakpoint').css('visibility', 'visible');		
	}
	else {
		jQuery('#lg_responsive_breakpoint').css('visibility', 'hidden');		
	}
}

