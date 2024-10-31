<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Popup style
		*
		* @package     Lead_Generation
		* @subpackage  Add-new
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include_once ( 'settings/style.php' );
	
?>

<div class="lg-container">
	<div class="lg-element">
		<?php echo apply_filters( 'lg_create_option', $overlay ); ?><label for="lg_overlay"><?php _e('Overlay', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $overlay_help ); ?><br/>
		<span id="overlay_background"><?php echo apply_filters( 'lg_create_option', $overlay_background ); ?></span>
	</div>
	<div class="lg-element">
		<label><?php _e('Z-index', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $zindex_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $zindex ); ?>
	</div>
	<div class="lg-element">		
		<label><?php _e('Position', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $position_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $position ); ?>
	</div>	
</div>

<div class="lg-container">	
	<div class="lg-element">
		<label><?php _e('Width', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $width_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $width ); ?>
	</div>
	<div class="lg-element">
		<label><?php _e('Height', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $height_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $height ); ?>
	</div>
	<div class="lg-element">
		<label><?php _e('Background Color', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $background_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $background ); ?>			
	</div>
	
</div>

<div class="lg-container">	
	<div class="lg-element">
		<label><?php _e('Background Image URL', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $background_image_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $background_image ); ?>			
	</div>
	<div class="lg-element">
		<label><?php _e('Margin', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $margin_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $margin ); ?>	
	</div>
	<div class="lg-element">
		<label><?php _e('Padding', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $padding_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $padding ); ?>			
	</div>	
</div>

<fieldset>
	<legend><?php _e('Location', 'popupgeneration'); ?></legend>
	<div class="lg-container">	
		<div class="lg-element">		
			<label><?php _e('Location', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $location ); ?>
		</div>	
		<div class="lg-element top-bottom">
			<div id="lg-top">
				<label><?php _e('Top', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_top_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_top ); ?>
			</div>			
			<div id="lg-bottom">
				<label><?php _e('Bottom', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_bottom_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_bottom ); ?>			
			</div>		
		</div>
		<div class="lg-element left-right">
			<div id="lg-left">
				<label><?php _e('Left', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_left_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_left ); ?>
			</div>			
			<div id="lg-right">
				<label><?php _e('Right', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $location_right_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $location_right ); ?>			
			</div>		
		</div>
	</div>
</fieldset>

<fieldset>
	<legend><?php _e('Border', 'popupgeneration'); ?></legend>
	
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Radius', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $border_radius_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $border_radius ); ?>	
			
		</div>
		<div class="lg-element">
			<label><?php _e('Style', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $border_style_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $border_style ); ?>	
		</div>
		<div class="lg-element">
			<label></label><br/>
			
		</div>	
	</div>
	
	<div class="lg-container">
		<div class="lg-element border">
			<label><?php _e('Color', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $border_color ); ?>
		</div>
		<div class="lg-element border">
			<label><?php _e('Thickness', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $border_width ); ?>			
		</div>
		<div class="lg-element border">
			
		</div>	
	</div>
	
</fieldset>

<fieldset>
	<legend><?php _e('Drop Shadow', 'popupgeneration'); ?></legend>
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Shadow', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $shadow ); ?>
		</div>
		<div class="lg-element shadow">
			<label><?php _e('Horizontal Position', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_h_offset_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $shadow_h_offset ); ?>
		</div>
		<div class="lg-element shadow">
			<label><?php _e('Vertical Position', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_v_offset_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $shadow_v_offset ); ?>
		</div>	
	</div>
	
	<div id="shadow">
		<div class="lg-container">
			<div class="lg-element">
				<label><?php _e('Blur', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_blur_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $shadow_blur ); ?>
			</div>
			<div class="lg-element">
				<label><?php _e('Spread', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_spread_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $shadow_spread ); ?>
			</div>
			<div class="lg-element">
				<label><?php _e('Color', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $shadow_color_help ); ?><br/>
				<?php echo apply_filters( 'lg_create_option', $shadow_color ); ?>
			</div>	
		</div>
	</div>
</fieldset>

<fieldset id="lg-popup-title">
	<legend><?php _e('Title', 'popupgeneration'); ?></legend>
	
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Font Size', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $title_size_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $title_size ); ?>
		</div>
		<div class="lg-element">
			<label><?php _e('Line Height', 'popupgeneration'); ?></label><?php echo apply_filters( 'lg_help_tip', $title_line_height_help ); ?><br/>
			<?php echo apply_filters( 'lg_create_option', $title_line_height ); ?>
		</div>
		<div class="lg-element">
			<label><?php _e('Font Family', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $title_font ); ?>
		</div>	
	</div>
	
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Font Weight', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $title_font_weight ); ?>
		</div>
		<div class="lg-element">
			<label><?php _e('Font Style', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $title_font_style ); ?>
		</div>
		<div class="lg-element">
			<label><?php _e('Align', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $title_align ); ?>
		</div>	
	</div>
	
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Color', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $title_color ); ?>
		</div>
		<div class="lg-element">			
		</div>
		<div class="lg-element">			
		</div>	
	</div>
	
</fieldset>

<fieldset id="lg-popup-title">
	<legend><?php _e('Content', 'popupgeneration'); ?></legend>
	
	<div class="lg-container">
		<div class="lg-element">
			<label><?php _e('Font Size', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $content_size ); ?>
		</div>
		<div class="lg-element">
			<label><?php _e('Font Family', 'popupgeneration'); ?></label><br/>
			<?php echo apply_filters( 'lg_create_option', $content_font ); ?>
		</div>
		<div class="lg-element">			
		</div>	
	</div>
	
</fieldset>

