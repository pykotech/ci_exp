$(document).ready( function() {

	$('div.showhide').hide();

	$('a.tog').click(
	function(e) { 
		e.preventDefault();
		$(this).next('div.showhide').toggle();
	});
});