/**
	this is a sample script for initializing the jquery tweet plugin
	when you are integrating twitter birdseed with your WordPress theme
*/

jQuery(document).ready(function($){
	$('.tweet').tweet({
		username: 'twitter',
		'modpath': jQuery('input#twitter_modpath').val(), // set modpath (URL for ajax) - output in the wp footer
		'_ajax_nonce': jQuery('input#ajax_nonce_birdseed').val(), // set nonce - output in the wp footer
		'action' : 'birdseed' 
	});
});
