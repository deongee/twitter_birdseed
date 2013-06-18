<?php
/**
 * @package Befive
 */
/*
Plugin Name: Twitter Birdsheed
Description: Twitter / seaofclouds WordPress plugin Sample. Based on mod by Stan Scates. Compatible with WordPress v 3.5 + (possibly 3.2 +)
Version: 1.0
Author: Shu Miyao
License: 
*/

/*
	important : for production release, 
	
		1. replace "Befive" to a proper vendor code in this file as well as in birdseed
		2. ensure that the mode switch is set to the theme add-on mode (this also works as a plugin).
		3. remove this message.
*/

/**
	create your API key @ https://dev.twitter.com/apps
*/
	$consumer_key = '';
	$consumer_secret = '';
	$user_token = '';
	$user_secret = '';

// !Constants defined
	// define Befive_ajax_search_ROOT_PATH where this plugin is located.
	define('Befive_birdseed_ROOT_PATH', dirname(__FILE__));
	
	// this is the URL where resouces (css / js) are located 
	define('Befive_birdseed_RESOURCE_URI', plugins_url('', __FILE__) );
	
	/* use the following if you like to integrate this plugin in your wordpress theme
	 note: you need to place the twitter_birdseed in the root directory of your theme */
	// define('Befive_birdseed_RESOURCE_URI', get_template_directory_uri().'/twitter_birdseed' );

// EzTweet Class
	include(Befive_birdseed_ROOT_PATH.'/class/EzTweet.php');
	
//	For shortcode
	include(Befive_birdseed_ROOT_PATH.'/class/Birdseed.php');
	
	// use shortcode
	$Birdseed = new Birdseed (
		Befive_birdseed_ROOT_PATH.'/class/lib/',
		Befive_birdseed_ROOT_PATH.'/cache/',
		array (
			'consumer_key'=>$consumer_key,
			'consumer_secret'=>$consumer_secret,
			'user_token'=>$user_token,
			'user_secret'=>$user_secret,
		),
		array ()
	);
	
	// shortcode disabled - do not set anything in the 4th argument
/*
	$Birdseed = new Birdseed (
		Befive_birdseed_ROOT_PATH.'/class/lib/',
		Befive_birdseed_ROOT_PATH.'/cache/',
		array (
			'consumer_key'=>'rA1s8coKPStZwA8Y07n2w',
			'consumer_secret'=>'0s5daI4U8GUwcRnp9hgW76pxJGzEEZW6m5Tmr43k',
			'user_token'=>'551825181-7JGi896EEDn6o3g331a7N5s4vYNQ6ZkjLy9WAAuN',
			'user_secret'=>'njN0nhq7xamlYB2De3KlrkiEg0CahgY3hFqyHC54xQM',
		)
	);
*/