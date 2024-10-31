<?php
	/**
		* The free plugins from Dmytro Lobov
		*
		* @package WordPress
		* @subpackage MyStem
		* @since MyStem 1.0
	*/
?>
<style>
	.height_screen{height:210px; background:#fff;}
	.height_screen img{max-width:100%;}
	.height_screen span{padding: 10px; font-size:16px; font-weight:500; display:block;}
	.height_screen a{color:#000; text-decoration:none;}
	.themes {overflow:hidden;}
	.themes h2 {text-align: left;}
	
</style>
<h3>The Popup Generation is good for using with the next free WordPress plugins</h3>

	<div class="theme-browser">
		<div class="themes">			
			<?php lg_plugins_add_get_feed(); ?>			
		</div>
	</div>



<?php
	function lg_plugins_add_get_feed() {			
		$image = plugin_dir_url( __FILE__ ) . 'image/';		
		$plugins = array(	
		
		0 => array('Lead Generation', 'Convert your website visitors into leads with the most feature-rich tools for marketing: Popups, Forms, Floating Buttons and other.', 'leadgeneration.png', 'https://wordpress.org/plugins/leadgeneration/'),	
		
		1 => array('Popup Generation', 'Create unique custom popups with any content. Easily insert popups in any place what you want. The popup content support shortcodes.', 'popup-generation.png', 'https://wordpress.org/plugins/popup-generation/'),
		
		2 => array('Form Generation', 'Create beautiful contact forms with just a few clicks. Analytics for each contact form. Save and manage Contact Form messages.', 'form-generation.png', 'https://wordpress.org/plugins/form-generation/'),
		
		3 => array('Button Generation', 'Create unique custom buttons with icons. Easily insert button in any place what you want. Create standard and floating buttons with statistics. ', 'button-generation.png', 'https://wordpress.org/plugins/button-generation/'),
		
		);	
		foreach ($plugins as $key => $value) { ?>
		
		<div class="theme">
			<div class="height_screen">
				<a target="_blank" href="<?php echo esc_url( $value[3] ); ?>" target="_blank"><img src="<?php echo esc_url( $image.$value[2] ); ?>" />
					<span><?php echo esc_attr( $value[1] ); ?></span>
				</a>
			</div>
			<div class="theme-author"></div>
			<div class="theme-id-container">
				<h2 class="theme-name"><span><?php echo esc_attr( $value[0] ); ?></span></h2>	
				<div class="theme-actions">
					<a class="button button-primary load-customize hide-if-no-customize" href="<?php echo esc_url( $value[3] ); ?>" target="_blank">Get It Now</a>						
				</div>
			</div>
		</div>
		<?php } 
	}
?>
