<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* About Page
		*
		* @package    Lead_Generation
		* @subpackage  
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
?>

<style>
	.feature-section.one-col p {
		font-size: 16px;
	}
	.lg-thank-you {
		color: #777;
	}
	.feature-section pre {		
		box-sizing: border-box;
		width: 100%;	
		margin: 0;
		overflow: auto;
		overflow-y: hidden;
		font-size: 12px;
		line-height: 20px;
		background: #fff !important;
		border: 1px solid #777;		
		padding: 10px;
		color: #333;
	}
#accordion {	
	background: #f7f7f7;
	font-family: "Courier 10 Pitch", Courier, monospace;
	color: #555;
	font-size: 13px;
	line-height: 1.6;
	padding: 5px 16px;
	border: 3px solid #eaeaea;
	border-radius: 4px 4px 0 0;
	margin-bottom: 0;
	max-height: 300px;
	overflow: auto;
	white-space:pre-line;
	}
	.about-wrap .changelog {
	margin-bottom: 0;
	}
	
	.about-wrap .changelog{
	background: #eaeaea;
	font-size: 18px;
	padding: 4px 10px 4px 20px;
	border-radius: 0 0 4px 4px;
	font-size: 16px;
	font-weight: 700;
	max-width: 150px;
	cursor: pointer;
	}
	.lg-accordion {
	position: relative;
	}
	.changelog {
	position: absolute;
	bottom: 0;
	}
</style>
<script>
	jQuery(document).ready(function($) {
		changlog = 1;
		$('.about-wrap #accordion').css('display', 'none');
		$('.about-wrap').find('.changelog').click(function(){ $(this).siblings('#accordion').toggle(400, function(){
			
      if ( changlog == '1' ) {			
				$('.about-wrap .changelog').text('Hide Changelog');
				changlog = 2;					
			}
			else {
				$('.about-wrap .changelog').text('Show Changelog');
				changlog = 1;				
			}
		});});
		
	})
</script>


<div class="feature-section one-col">
	<div class="col">				
		<p>Popup Generation - the simple and functional WordPress plugin for creating pop-ups. With the popup plugin, you can easily create modal windows, pop-ups and lightboxes for your own needs as you wish and then insert anywhere place on the site.</p>		
	</div>
	
</div>
<div class="feature-section one-col lg-accordion">	
	
	<div id="accordion">
		= 1.1 = 
		* Added: save time page
		* Fixed: saving the popup
		* Fixed: deleting popups from database
		
		= 1.0 = 
		* Initial release
	</div>
	<div class="changelog">Show Changelog</div>
	
</div>
<p class="lg-thank-you">
	Thank you for choosing 'Popup Generation',
<br>Dmyto Lobov</p>