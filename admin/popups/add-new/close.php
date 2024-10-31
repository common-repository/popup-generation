<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Popup Close Button settings display
		*
		* @package     Lead_Generation
		* @subpackage  Add-new
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include_once ( 'settings/close.php' );
	
?>

<?php if( class_exists( 'LG_Popups_Close' ) ) {
	echo apply_filters( 'lg_popups_close_fields', $param ); 
	} else {
		echo '<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> ';
		printf( __( '<a href="%s" target="_blank">More advanced closen</a>','popupgeneration' ), esc_url( 'https://wow-estore.com/lead-generation/#pro' ) );
	}?>

<div class="lg-container">
	<div class="lg-element">
		<?php echo apply_filters( 'lg_create_option', $close_overlay ); ?> <label for="lg_close_overlay"><?php _e('Click Overlay to Close', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $close_overlay_help ); ?>
	</div>
	<div class="lg-element">
		<?php echo apply_filters( 'lg_create_option', $close_esc ); ?> <label for="lg_close_esc"><?php _e('Press ESC to Close', 'popupgeneration'); ?></label> <?php echo apply_filters( 'lg_help_tip', $close_esc_help ); ?>
	</div>		
	<div class="lg-element">						
	</div>
</div>

<fieldset>
	<legend style="color:red"><?php _e('Notice!', 'popupgeneration'); ?></legend>
	<div class="lg-container">
		<div class="lg-element">
			<?php _e('You can close popup via click to the element with:', 'popupgeneration'); ?>
			<ul>
				<li>&bull; Class 'close-popup-<?php echo $tool_id; ?>', like <code>&lt;span class="close-popup-<?php echo $tool_id; ?>"&gt;Close Popup&lt;/span&gt;</code></li>
				<li>&bull; ID 'close-popup-<?php echo $tool_id; ?>', like <code>&lt;span id="close-popup-<?php echo $tool_id; ?>"&gt;Close Popup&lt;/span&gt;</code></li>
				<li>&bull; URL '#close-popup-<?php echo $tool_id; ?>', like <code>&lt;a href="'#close-popup-<?php echo $tool_id; ?>'"&lt;Close Popup&lt;/a&gt;</code> </li>
			</ul>			
		</div>
	</div>
</fieldset>


