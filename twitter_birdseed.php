<?php
/**
 * @package Befive
 */
/*
Plugin Name: Twitter Birdseed
Description: Twitter / seaofclouds WordPress plugin Sample. Based on mod by Stan Scates. Compatible with WordPress v 3.5 + (possibly 3.2 +)
Version: 1.0
Author: Shu Miyao
License: 
*/

/**
	create your API key @ https://dev.twitter.com/apps
*/
	$consumer_key = ''; // YOUR_CONSUMER_KEY
	$consumer_secret = ''; // YOUR_CONSUMER_SECRET
	$user_token = ''; // YOUR_ACCESS_TOKEN
	$user_secret = ''; // YOUR_ACCESS_TOKEN_SECRET

// !Constants defined
	// define Befive_ajax_search_ROOT_PATH where this plugin is located.
	define('Befive_birdseed_ROOT_PATH', dirname(__FILE__));
	
	// this is the URL where resouces (css / js) are located 
	define('Befive_birdseed_RESOURCE_URI', plugins_url('', __FILE__) );
	
	/* use the following if you like to integrate this plugin in your wordpress theme
	 note: you need to place the twitter_birdseed folder in the root directory of your theme.
	 then include twitter_birdseed.php from your functions.php
	 Do not forget removing the enqueue of the old jquery.tweet.js which used to work for Twitter API v. 1.
	  */
	// define('Befive_birdseed_RESOURCE_URI', get_template_directory_uri().'/twitter_birdseed' );


// EzTweet Class
	include(Befive_birdseed_ROOT_PATH.'/class/EzTweet.php');
	
// Birdseed Class
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
			'consumer_key'=>'',
			'consumer_secret'=>'',
			'user_token'=>'',
			'user_secret'=>'',
		)
	);
*/