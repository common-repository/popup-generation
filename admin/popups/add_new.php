<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Add new Popup
		*
		* @package     Lead_Generation
		* @subpackage  Popups
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	include_once ( 'include-data.php' );
	
	include_once ( 'add-new/settings/main.php' );	
?>

<form action="admin.php?page=<?php echo $toolpage;?>" method="post" name="post" id="leadgeneration">
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content" style="position: relative;">
				<div id="titlediv">
					<div id="titlewrap">
						<label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label>
						<input type="text" name="title" size="30" value="<?php echo $title; ?>" id="title" placeholder="<?php _e( 'Register a popup name', 'popupgeneration' ); ?>">
						<p class="lg-desc"><?php echo apply_filters( 'lg_create_option', $popup_title ); ?> <label for="lg_popup_title">Used title as Popup Title.</label></p>
						
					</div>
				</div>
				
				<div id="postdivrich" class="postarea wp-editor-expand">
					<?php echo apply_filters( 'lg_create_option', $content ); ?>
					
				</div>
				
				
			</div>
			<div id="postbox-container-1" class="postbox-container">
				<?php include_once ('add-new/targeting.php'); ?>
				<div id="submitdiv" class="postbox ">
					<h2 class="hndle ui-sortable-handle"><span>Publish</span> </h2>
					
					<div class="inside">					
						<div class="lg-container">
							<div class="lg-element">								
								<?php echo apply_filters( 'lg_create_option', $show ); ?>
								<?php echo apply_filters( 'lg_create_option', $taxonomy_select ); ?>
								<?php echo apply_filters( 'lg_create_option', $show_id ); ?>
								<span id="lg-shortcode"><code>[Popup id="<?php echo $tool_id; ?>"]</code></span><p/>
								<?php if ($act == "update") : ; ?>								
								<span class="preview button open-popup"><?php _e('Preview', 'popupgeneration'); ?></span>
								<em><?php _e('You can preview the changed settings after the click "Update".','popupgeneration'); ?></em>
								<?php endif; ?>
							</div>
						</div>
						<div class="submitbox" id="submitpost">							
							<div id="major-publishing-actions">
								<div id="delete-action">
									<?php if( !empty( $id ) ){
										echo '<a class="submitdelete deletion" href="admin.php?page=' . $toolpage . '&info=delete&did=' . $id . '">' . __( 'Delete', 'popupgeneration' ) . '</a>';
									}; ?>									
								</div>
								
								<div id="publishing-action">
									<span class="spinner"></span>									
									<input name="submit" id="submit" class="button button-primary button-large" value="<?php echo $btn; ?>" type="submit">
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>	
				
			</div>
			
			<div id="postbox-container-2" class="postbox-container">
				<div id="postoptions" class="postbox ">					
					<div class="inside">
						<div class="tab-box">
							<ul class="tab-nav">
								<?php 
									$tab_menu = array(
									'popup'      => __( 'Popup Settings', 'popupgeneration' ),
									'close'      => __( 'Close Settings', 'popupgeneration' ),									
									'style'      => __( 'Popup Style', 'popupgeneration' ),
									'stylebtn'   => __( 'Close Button Style ', 'popupgeneration' ),															
									);						
									$i = 1;
									foreach ($tab_menu as $menu => $val){							
										echo '<li><a href="#t' . $i . '">' . $val . '</a></li>';
										$i++;
									}
								?>						
							</ul>
							<div class="tab-panels">
								<?php
									$t = 1;
									foreach ($tab_menu as $menu => $val){							
										echo '<div id="t' . $t . '">';
										include_once ('add-new/'.$menu.'.php');
										echo '</div>';
										$t++;
									}					
								?>					
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</div>
	<input type="hidden" name="tool_id" value="<?php echo $tool_id; ?>" id="tool_id" />
	<input type="hidden" name="param[time]" value="<?php echo time(); ?>" />
	<input type="hidden" name="add" value="<?php echo $hidval; ?>" />    
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="data" value="<?php echo $data; ?>" />
	<input type="hidden" name="page" value="<?php echo $toolpage;?>" />	
	<input type="hidden" name="plugdir" value="<?php echo $toolpage;?>" />		
	<input type="hidden" name="tool" value="<?php echo $page_tool[1];?>" />
	<?php wp_nonce_field('popup_generation_action','popup_generation_nonce_field'); ?>	
</form>

<?php 
	if ($act == "update") {
		include_once ('preview/preview.php');
	}
?>