<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Close Button style
		*
		* @package     Lead_Generation
		* @subpackage  Add-new
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include_once ( 'settings/stylebtn.php' );	
?>

<div class="lg-container">
	<div class="lg-element">
		<label for="lg_overlay"><?php _e('Close Button type', 'popupgeneration'); ?></label><br/>
		<span id="overlay_background"><?php echo apply_filters( 'lg_create_option', $close_type ); ?></span>
	</div>
	<div class="lg-element">		
	</div>
	<div class="lg-element">				
	</div>	
</div>

<fieldset>
	<legend><?php _e('Location', 'popupgeneration'); ?></legend>
	<div class="lg-container">	
		<div class="lg-element">		
			<label><?php _e('Location', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $close_location_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $close_location ); ?>
		</div>	
		<div class="lg-element close-top-bottom">
			<div id="lg-close-top">
				<label><?php _e('Top', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_close_top_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_close_top ); ?>
			</div>			
			<div id="lg-close-bottom">
				<label><?php _e('Bottom', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_close_bottom_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_close_bottom ); ?>			
			</div>		
		</div>
		<div class="lg-element close-left-right">
			<div id="lg-close-left">
				<label><?php _e('Left', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_close_left_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_close_left ); ?>
			</div>			
			<div id="lg-close-right">
				<label><?php _e('Right', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_close_right_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_close_right ); ?>			
			</div>		
		</div>
	</div>
</fieldset>

<div class="lg-container">
	<div class="lg-element btn-text">	
		<label><?php _e('Text', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_text_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_text ); ?>
	</div>
	<div class="lg-element btn-text">	
		<label><?php _e('Padding', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_text_padding_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_text_padding ); ?>
	</div>
	<div class="lg-element btn-icon">
		<label><?php _e('Box Size', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_box_size_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_box_size ); ?>
	</div>	
</div>

<div class="lg-container">
	<div class="lg-element">
		<label><?php _e('Font Size', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_size_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_size ); ?>
	</div>
	<div class="lg-element">	
		<label><?php _e('Font Family', 'popupgeneration'); ?></label><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_font ); ?>
	</div>
	<div class="lg-element">	
		<label><?php _e('Font Weight', 'popupgeneration'); ?></label><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_font_weight ); ?>
	</div>	
</div>

<div class="lg-container">
	<div class="lg-element">
		<label><?php _e('Font Style', 'popupgeneration'); ?></label><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_font_style ); ?>
	</div>
	<div class="lg-element">	
		<label><?php _e('Radius', 'popupgeneration'); ?></label><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_border_radius ); ?>
	</div>
	<div class="lg-element">	
		<label><?php _e('Color', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_color_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_color ); ?>
	</div>
		
</div>

<div class="lg-container">
	<div class="lg-element">	
		<label><?php _e('Hover Color', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_color_hover_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_color_hover ); ?>
	</div>
	<div class="lg-element">
		<label><?php _e('Background', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_background_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_background ); ?>
	</div>
	<div class="lg-element">	
		<label><?php _e('Hover Background', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $btn_background_hover_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $btn_background_hover ); ?>
	</div>
		
</div>

