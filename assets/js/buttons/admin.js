/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.1
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {	
	$('#lg_icon').fontIconPicker({
		theme: 'fip-darkgrey',
		emptyIcon: false,
		allCategoryText: 'Show all'
	});	
	
	button_type();
	button_location();
	button_appearance();
	enable_badge();
	show_option();
	language_enable();
	users_roles();
	max_screen_enable();
	min_screen_enable();
})
function button_type() {
		var type = jQuery('#lg_type').val();
		jQuery('.button-floating').css('display', 'none');
		if ( type == 'floating' ) {
			jQuery('.button-floating').css('display', 'block');
		}
}
function button_location() {
	var loc = jQuery('#lg_location').val();
	jQuery('.top-bottom').css('visibility', 'visible');
	jQuery('.left-right').css('visibility', 'visible');
	jQuery('#lg-top').css('display', 'none');
	jQuery('#lg-bottom').css('display', 'none');
	jQuery('#lg-left').css('display', 'none');
	jQuery('#lg-right').css('display', 'none');
	if (loc == 'topLeft') {
		jQuery('#lg-top').css('display', 'block');
		jQuery('#lg-left').css('display', 'block');
	}
	else if (loc == 'topCenter') {
		jQuery('#lg-top').css('display', 'block');
		jQuery('.left-right').css('visibility', 'hidden');
	}
	else if (loc == 'topRight') {
		jQuery('#lg-top').css('display', 'block');
		jQuery('#lg-right').css('display', 'block');
	}
	else if (loc == 'bottomLeft') {
		jQuery('#lg-bottom').css('display', 'block');
		jQuery('#lg-left').css('display', 'block');
	}
	else if (loc == 'bottomCenter') {
		jQuery('#lg-bottom').css('display', 'block');
		jQuery('.left-right').css('visibility', 'hidden');
	}
	else if (loc == 'bottomRight') {
		jQuery('#lg-bottom').css('display', 'block');
		jQuery('#lg-right').css('display', 'block');
	}
	else if (loc == 'left') {
		jQuery('.top-bottom').css('visibility', 'hidden');
		jQuery('#lg-left').css('display', 'block');
	}
	else if (loc == 'right') {
		jQuery('.top-bottom').css('visibility', 'hidden');
		jQuery('#lg-right').css('display', 'block');
	}	
}

function button_appearance() {
	var type = jQuery('#lg_appearance').val();
	jQuery('.button-text').css('display', 'none');
	jQuery('.button-icon').css('display', 'none');
	jQuery('.text-location').css('visibility', 'hidden');
	if ( type == 'text' ) {
		jQuery('.button-text').css('display', 'block');
	}
	else if ( type == 'text_icon' ) {
		jQuery('.button-text').css('display', 'block');
		jQuery('.button-icon').css('display', 'block');
		jQuery('.text-location').css('visibility', 'visible');
	}
	else if ( type == 'icon' ) {		
		jQuery('.button-icon').css('display', 'block');
	} 
}

function enable_badge() {
	if (jQuery('#lg_enable_badge').is(':checked')){
		jQuery('#notification-bage').css('visibility', 'visible');
		jQuery('.notification-bage').css('display', 'block');
	}
	else {
		jQuery('#notification-bage').css('visibility', 'hidden');
		jQuery('.notification-bage').css('display', 'none');
	}
}

function show_option() {
	jQuery('#lg_taxonomy_select').css('display', 'none');
	jQuery('#lg_show_id').css('display', 'none');
	jQuery('#lg-shortcode').css('display', 'none');
	var show = jQuery('#lg_show').val();
	if (show == 'posts' || show == 'pages' || show == 'expost' || show == 'expage'|| show == 'taxonomy' || show == 'postsincat'){
		jQuery('#lg_show_id').css('display', 'block');
	}
	else if (show == 'taxonomy') {
		jQuery('#lg_taxonomy_select').css('display', 'block');
	}
	else if (show == 'shortcode') {
		jQuery('#lg-shortcode').css('display', 'block');
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

function language_enable() {
	if (jQuery('#lg_language_enable').is(':checked')){
		jQuery('#lg_language').css('display', '');
	}
	else {
		jQuery('#lg_language').css('display', 'none');
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