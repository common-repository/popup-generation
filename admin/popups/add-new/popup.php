<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Popup settings display
		*
		* @package     Lead_Generation
		* @subpackage  Add-new
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include_once ( 'settings/popup.php' );
?>

<div class="lg-container">
	<div class="lg-element">
		<label><?php _e('Triggers', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $triggers_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $triggers ); ?>		
	</div>	
	<?php 
		if( class_exists( 'LG_Popups_Triggers' ) ) {
			echo apply_filters( 'lg_popups_triggers_fields', $param ); 
		}
		else {
	?>
		<div class="lg-element">
			<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> <?php printf( __( '<a href="%s" target="_blank">More advanced triggers</a>','popupgeneration' ), esc_url( 'https://wow-estore.com/lead-generation/#pro' ) ); ?>
		</div>		
		
	<?php } ?>
</div>
<fieldset class="lg-open-notice">
	<legend style="color:red"><?php _e('Notice!', 'popupgeneration'); ?></legend>
	<div class="lg-container">
		<div class="lg-element">
			<?php _e('You can open popup via adding to the element:', 'popupgeneration'); ?>
			<ul>
				<li>&bull; Class 'open-popup-<?php echo $tool_id; ?>', like <code>&lt;span class="open-popup-<?php echo $tool_id; ?>"&gt;Open Popup&lt;/span&gt;</code></li>
				<li>&bull; ID 'open-popup-<?php echo $tool_id; ?>', like <code>&lt;span id="open-popup-<?php echo $tool_id; ?>"&gt;Open Popup&lt;/span&gt;</code></li>
				<li>&bull; URL '#open-popup-<?php echo $tool_id; ?>', like <code>&lt;a href="'#open-popup-<?php echo $tool_id; ?>'"&lt;Open Popup&lt;/a&gt;</code> </li>
			</ul>			
		</div>
	</div>
</fieldset>
<div class="lg-container">
	<div class="lg-element">
		<label><?php _e('Animate In', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $animate_in_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $animate_in ); ?>
	</div>
	<div class="lg-element">
		<label><?php _e('Animate Out', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $animate_out_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $animate_out ); ?>
	</div>		
	<div class="lg-element">	
		<label><?php _e('Animation Speed (sec)', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $animate_speed_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $animate_speed ); ?>		
	</div>	
</div>

<?php if( !class_exists( 'LG_Popup_Animation' ) ) {	 ?>
	<div class="lg-container">
	<div class="lg-element">
		<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> <?php printf( __( '<a href="%s" target="_blank">More advanced animations</a>','popupgeneration' ), esc_url( 'https://wow-estore.com/lead-generation/#pro' ) ); ?>
	</div>
	</div>
<?php 
	}
	?>

<div class="lg-container">
	<div class="lg-element">
		<?php echo apply_filters( 'lg_create_option', $set_cookie ); ?> <label for="lg_set_cookie"><?php _e('Set the cookie time', 'popupgeneration'); ?></label>	<?php echo apply_filters( 'lg_help_tip', $cookie_help ); ?><br/>
		<?php echo apply_filters( 'lg_create_option', $cookie_time ); ?>
	</div>
	<div class="lg-element">		
	</div>
	<div class="lg-element">			
	</div>	
</div>

<?php if( class_exists( 'LG_Popups_Youtube' ) ) {
	echo apply_filters( 'lg_popups_youtube_fields', $param ); 
	} else {
			echo '<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> ';
			printf( __( '<a href="%s" target="_blank">YouTube video Support</a>','popupgeneration' ), esc_url( 'https://wow-estore.com/lead-generation/#pro' ) );
	} ?>


