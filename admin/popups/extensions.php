<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Extansion version
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
	.itembox {
	
	} 
	.faq-title{		
	cursor: pointer;				
	}	
	.faq-title:before{
	content: "\f132";
	font-family: Dashicons;
	vertical-align: bottom;
	margin-right: 8px;
	color: #e95645
	
	}	
	.toggleshow:before{
	content: "\f132";
	font-family: Dashicons;	
	color: #e95645
	}	
	.togglehide:before{
	content: "\f460";	
	font-family: Dashicons;
	}
	.item-title {
	margin: 1.25em 0 .6em;
	font-size: 1em;
	line-height: 1;
	color: #1e73be;
	}
	.items .inside {
	margin: 10px 10px 10px 20px;
	}
	.feature-section ul {
		margin-left: 10px;
	}
	.feature-section ul li:before {
		content: "\f147";
		font-family: Dashicons;
		margin-right: 5px;
		color: #e95645
	}
	.lg-btn {
	width: 50%;	
	display: inline-block;	
	height: 42px;
	background: #e95645;
	border-radius: 3px;
	line-height: 42px;
	text-align: center;
	color: #fff !important;
	text-decoration: none;
	font-size: 18px;
	font-weight: 500;
	cursor: pointer;
	border:none;	
}
.lg-btn:hover {
	background: #d45041;
}
	
</style>

<script>
	jQuery(document).ready(function($) {		
		$('.item-title').children('.faq-title').click(function(){
			var par = $(this).closest('.items');
			$(par).children(".inside").toggle(500);
			if($(this).hasClass('togglehide')){
				$(this).removeClass('togglehide');
				$(this).addClass( "toggleshow" );
				$(this).attr('title', 'Show');
			}
			else {
				$(this).removeClass('toggleshow');
				$(this).addClass( "togglehide" );
				$(this).attr('title', 'Hide');
			}			
		});		
	})
</script>
<div class="about-wrap">
	<div class="feature-section one-col">
		<div class="col">
			
			<p>GET MORE FEATURES WITH THE EXTENDED VERSION OF THE PLUGIN.</p> 
			
			<p><center><a href="https://wow-estore.com/lead-generation/#pro" target="_blank" class="lg-btn">Get Pro Version</a></center></p>		
			
			<p>ADDITIONAL OPTIONS IN PRO VERSION:</p>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Popup Triggers</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>The display of the popup depending on user actions.</p>
					<p>A flexible system of display triggers allows you to optimally customize the display of the popup depending on user actions:</p>
					<ul>
						<li>after loading the page;</li>
						<li>when clicking on a link or button;</li>
						<li>scroll the window;</li>	
						<li>when closing the page.</li>
						<li>when hovering on a link or button;</li>
						<li>when the user right-clicks on a page;</li>
						<li>when the user selects the text on the page.</li>						
					</ul>
					<p>Setting the triggers improves the efficiency of modifying the display of modal windows.</p>
					
				</div>
			</div>		
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Popup Animation</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Contains a large set of effects for dynamically displaying the appearance (Animate In) and closing (Animate Out) of a pop-up block. They are designed to attract the attention of visitors to a web resource to the content of the modal window.</p>

         <p>'Revive' the page will allow all sorts of:</p>
					<ul>
						<li>deployment;</li>
						<li>jumping;</li>
						<li>falls;</li>
						<li>division of the block into several parts;</li>
						<li>attenuation;</li>
						<li>pulsation;</li>
						<li>scaling and more.</li>
					<ul>
					<p>Changing the duration of the applied effect (Animation duration) will create the necessary impression and allow you to focus on a particular block. Animation is used to add dynamics to the page, improve the aesthetic display of the block.</p>
					
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Popup Closing Settings</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Close the content and prompt the user to action</p>
					<p>Allows you to completely hide the close button of the pop-up window, set the delay to show the close button, or set the timer to auto-close the modal window.</p>
				</div>
			</div> 
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Popup Youtube Support</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Set the controller for YouTube video</p>
					<p>Allows you to control Youtube video that is embedded in the content of the popup.</p>
					<p>The main features of the extension are the ability to autoplay video when the popup opening and stop it when the popup closing.</p>
					<p>You can insert the Youtube video in popup content via iframe</p>
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Popup Targeting</span>		
				</div>			
				<div class="inside" style="display: none;">
					You can configure all its display parameters in more detail 
					<ul>
						<li>the output of the pop-up block (Show for users) is set for all site visitors, as well as selectively: for authorized or unauthorized users on the site</li>
						<li>the function 'Show after popup' is used to set the parameters for displaying pop-up blocks one after another, if cookies were used</li>
						<li>in the drop-down list, set the filter by language on the page</li>					
					</ul>
					<p>The function 'Show after popup' allows you to customize the dependence of the sequential output of windows on the site.</p>
					
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Form Targeting</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Adds additional conditions for displaying the form to your users. Additional conditions for the form display:</p>
					<ul>
						<li>Mobile and Desktop Screens</li>
						<li>User role on the site</li>
						<li>Site language</li>					
					</ul>
					<p>Get more fine-tuning of the form for different groups of users and viewing conditions.</p>
					
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Form Integration with MailChimp</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>This integrates your Forms with MailChimp.</p>

					<p>You can automatically subscribe customers to specific lists.</p>

					<p>The core forms offer a lot of value for free. But if you use MailChimp you can take them to a whole new level.</p>
										
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Button Targeting</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Adds additional conditions for displaying the form to your users. Additional conditions for the form display:</p>
					<ul>
						<li>Mobile and Desktop Screens</li>
						<li>User role on the site</li>
						<li>Site language</li>					
					</ul>
					<p>Get more fine-tuning of the form for different groups of users and viewing conditions.</p>
					
				</div>
			</div>
			
			<div class="items itembox">	
				<div class="item-title">
					<span class="faq-title">Button Badge</span>		
				</div>			
				<div class="inside" style="display: none;">
					<p>Adds the ability to create an information badge for the button.</p>
					
					<p>When the notification badge is showing, the user can with more likely perform a click on the button to reveal a pop-up dialog that displays the notifications that currently exist or redirect on the page with notifications.</p>

					<p>The notification badge draws more attention to the button and the desire to click on it.</p>
					
				</div>
			</div>
			
		</div>
		
	</div>
</div>