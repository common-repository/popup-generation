jQuery(document).ready(function($) {	
	//* Include colorpicker
	$('.wp-color-picker-field').wpColorPicker();
	
	$('#leadgeneration .tab-nav li:first').addClass('select'); 
	$('#leadgeneration .tab-panels>div').hide().filter(':first').show();    
	$('#leadgeneration .tab-nav a').click(function(){
		$('#leadgeneration .tab-panels>div').hide().filter(this.hash).show(); 
		$('#leadgeneration .tab-nav li').removeClass('select');
		$(this).parent().addClass('select');
		return (false); 
	})	
	$('#leadgeneration input:checkbox:checked').each(function(){
		var str = $(this).attr("id");
		var check = str.replace("lg_", "");
		$( "input[name='param["+check+"]']" ).val(1);	
		});
	
	$('#leadgeneration input[type="checkbox"]').change(function () {
		var str = $(this).attr("id");
		var check = str.replace("lg_", "");
		if($(this).prop('checked')){			
			$( "input[name='param["+check+"]']" ).val(1);			
		}
		else {
			$( "input[name='param["+check+"]']" ).val(0);
		}
	});	
	
	lg_attach_tooltips($(".lg-help"));

});


function lg_attach_tooltips(selector) {
    selector.tooltip({
        content: function() {
            return jQuery(this).prop("title")
        },
        tooltipClass: "lg-ui-tooltip",
        position: {
            my: "center top",
            at: "center bottom+10",
            collision: "flipfit"
        },
        hide: {
            duration: 200
        },
        show: {
            duration: 200
        }
    })
}

function reset_counts( tool, tool_id ) {	var data = 'action=lg_count&count_type=reset&tool=' + tool + '&tool_id='+tool_id;				
	jQuery.post(lg_count.ajaxurl, data, function(msg) {
		var result = msg.result;
		if ( result == 'OK') {
			jQuery('#tool_view').html('0');
			jQuery('#tool_action').html('0');
			jQuery('#ñonversion').html('0%');
		}
	});
}