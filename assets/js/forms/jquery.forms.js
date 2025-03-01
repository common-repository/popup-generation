/* ========= INFORMATION ============================
	- document:  LeadGeneration!
	- author:    Dmytro Lobov 
	- version:   1.0
	- url:       https://wordpress.org/plugins/leadgeneration/

==================================================== */

jQuery(document).ready(function($) {	
	$( ".lg-form" ).submit(function( event ) {
		event.preventDefault();
		var id = this.id.split("-")[2];
		var dataform   = $('#' + this.id).serialize();	
		var dataform = 'action=lg_send_form&'+dataform+'&form_id='+id;			
		$( '#lg-form-' +id +' #lg-response').remove();
		$.post(lg_send_form.ajaxurl, dataform, function(response) {			
			if ( response.failed == 'true' ) {
				$( '#lg-form-' +id ).append('<div id="lg-response" class="lg-col-el lg-col-12">' + response.message + '</div>');
			}
			else {
				if( response.sending == 1 ) {
					$( '#lg-form-' +id ).html( response.message );					
					if ( response.close == 'true' ) {					
						setTimeout(function() {
							$( '#lg-form-' +id ).toggle();
							if ( response.close_popup == 'true' ) {
								var popup = $( '#lg-form-' +id ).closest( '[id^="lg-popup-"]').attr('id');
								$( '#' + popup + ' .lg-popup-close-btn' ).click();								
							}			
							
						}, response.timer * 1000);
					}
				}
				else {
					window.location.href = response.redirect;
				}				
			}			
		});				
	});	
})
