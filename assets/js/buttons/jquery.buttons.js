function btnaction(id) {
	var data = 'action=lg_count&count_type=action&tool=button&tool_id='+id;				
	jQuery.post(lg_count.ajaxurl, data, function() {
		var url = jQuery('.lg-button-' + id).attr('data-url');
		if (url != '') {
			window.location.href = url;
		}
	});
}	
	