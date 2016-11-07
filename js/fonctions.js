var $= jQuery.noConflict();

$( document ).ready(function() {

	$("#addPlayerLink").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() {
		    $("#add_error").hide();
		}
	});
	
	$(".editPlayerLink").fancybox({
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() {
		}


	});	
	
});

