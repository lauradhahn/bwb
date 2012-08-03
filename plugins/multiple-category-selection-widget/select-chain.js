jQuery(document).ready( function($) {
	$('.wpmcsw select').change( function() {
		
		var select = $(this);
		
		var id = $(this).val();
		var ex_cats = $('.ex_cats').val();
		
		var data = {
			action: 'show_chain',
			cat_id: id,
			ex_cats: ex_cats
		};
		
    var ajaxurl = $('.ajax_url').val();     		
		
		jQuery.post(ajaxurl, data, function(response) {
			select.parent().find('.callback').remove();
			
			if (response)
			{
		    select.attr('name', 'parent');
			  select.parent().append(response);
			}
		});
	});
});