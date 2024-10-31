/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {
	popup_title();
	triggers();
	setCookie();
	autoClose();
	videoSupport();
	overlayEnable();	
	border();
	shadow();
	popup_location();
	close_location();
	close_type();
	users_roles();
	max_screen_enable();
	min_screen_enable();
	language_enable();
	after_popup_enable();
	show_option();
})

function popup_title(){
	if (jQuery('#lg_popup_title').is(':checked')){
		jQuery('#lg-popup-title').css('display', 'block');
	}
	else {
		jQuery('#lg-popup-title').css('display', 'none');
	}
}

function triggers(){	
	jQuery('.lg-open-notice').css('display', 'none');
	var trigger = jQuery('#lg_triggers').val();
	if (trigger == 'scrolled') {
		jQuery('.reach').css('visibility', 'visible');
	}	else {
		jQuery('.reach').css('visibility', 'hidden');
	}
	if (trigger == 'click' || trigger == 'hover') {
		jQuery('.lg-open-notice').css('display', 'block');
	}
}

function setCookie(){
	if (jQuery('#lg_set_cookie').is(':checked')){
		jQuery('#lg_cookie_time').css('visibility', 'visible');
	}
	else {
		jQuery('#lg_cookie_time').css('visibility', 'hidden');
	}
}

function autoClose(){
	if (jQuery('#lg_auto_close').is(':checked')){
		jQuery('#lg_auto_close_time').css('visibility', 'visible');
	}
	else {
		jQuery('#lg_auto_close_time').css('visibility', 'hidden');
	}
}

function videoSupport(){
	if (jQuery('#lg_video_support').is(':checked')){
		jQuery('.video').css('visibility', 'visible');
	}
	else {
		jQuery('.video').css('visibility', 'hidden');
	}
}

function overlayEnable() {
	if (jQuery('#lg_overlay').is(':checked')){
		jQuery('#overlay_background').css('visibility', 'visible');
	}
	else {
		jQuery('#overlay_background').css('visibility', 'hidden');
	}
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
	var shadow = jQuery('#lg_shadow').val();
	if (shadow == 'none') {
		jQuery('.shadow').css('visibility', 'hidden');
		jQuery('#shadow').css('display', 'none');
	}	else {
		jQuery('.shadow').css('visibility', 'visible');
		jQuery('#shadow').css('display', 'block');		
	}
}

function popup_location() {
	var loc = jQuery('#lg_location').val();
	jQuery('.top-bottom').css('visibility', 'visible');
	jQuery('.left-right').css('visibility', 'visible');
	jQuery('#lg-top').css('display', 'none');
	jQuery('#lg-bottom').css('display', 'none');
	jQuery('#lg-left').css('display', 'none');
	jQuery('#lg-right').css('display', 'none');
	if (loc == 'center') {
		jQuery('.top-bottom').css('visibility', 'hidden');
		jQuery('.left-right').css('visibility', 'hidden');
	}
	else if (loc == 'topLeft') {
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

function close_location() {
	var loc = jQuery('#lg_close_location').val();	
	jQuery('#lg-close-top').css('display', 'none');
	jQuery('#lg-close-bottom').css('display', 'none');
	jQuery('#lg-close-left').css('display', 'none');
	jQuery('#lg-close-right').css('display', 'none');
	
	if (loc == 'topLeft') {
		jQuery('#lg-close-top').css('display', 'block');
		jQuery('#lg-close-left').css('display', 'block');
	}	
	else if (loc == 'topRight') {
		jQuery('#lg-close-top').css('display', 'block');
		jQuery('#lg-close-right').css('display', 'block');
	}
	else if (loc == 'bottomLeft') {
		jQuery('#lg-close-bottom').css('display', 'block');
		jQuery('#lg-close-left').css('display', 'block');
	}	
	else if (loc == 'bottomRight') {
		jQuery('#lg-close-bottom').css('display', 'block');
		jQuery('#lg-close-right').css('display', 'block');
	}	
}

function close_type() { 
	var type = jQuery('#lg_close_type').val();
	jQuery('.btn-text').css('visibility', 'visible');
	jQuery('.btn-icon').css('visibility', 'visible');
	if (type == 'text') {
		jQuery('.btn-icon').css('visibility', 'hidden');
	}	
	else {
		jQuery('.btn-text').css('visibility', 'hidden');
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

function after_popup_enable() {
	if (jQuery('#lg_after_popup_enable').is(':checked')){
		jQuery('#lg_previous_popup').css('display', '');
	}
	else {
		jQuery('#lg_previous_popup').css('display', 'none');
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