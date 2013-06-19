<?php
/**
* Initializes twitter-seaofclouds and add ajax actions for twitter seaofclouds.
* @version 1.0
* @require 
* @author Shu Miyao
* @project twitter_birdseed
*/


class Birdseed {
	/*************************************** config ***************************************/
   // Your Twitter App Consumer Key
	private $consumer_key = '';

	// Your Twitter App Consumer Secret
	private $consumer_secret = '';

	// Your Twitter App Access Token
	private $user_token = '';

	// Your Twitter App Access Token Secret
	private $user_secret = '';
	
	// required vars
	private $library_path = '';
	
	// not required. leave this blank, cache is turned off.
	private $cache_dir = '';
	
	// note: you can set the default values when you creates a class instance. 
	// Set an array to use this variable for enabling the test shortcode support.
	private $birdseed_settings = false;
	
	private $call_count = 0;
	
	/**
		constructor
	*/
	public function __construct(
		$library_path,
		$cache_dir,
		$api_details = array (
				'consumer_key'=>'',
				'consumer_secret'=>'',
				'user_token'=>'',
				'user_secret'=>'',
			),
		$birdseed_settings = ''
		) {
		// $library_path / $api_details required
		if( !isset($library_path) || !isset($api_details) ) return false;

		// set lib / cahce path
		$this->library_path = $library_path;
		$this->cache_dir = $cache_dir;
		
		// this is where the api auth details are set 
		$this->consumer_key = $api_details['consumer_key'];
		$this->consumer_secret = $api_details['consumer_secret'];
		$this->user_token = $api_details['user_token']; 
		$this->user_secret = $api_details['user_secret'];
		
		// clone the settings if available

		if(isset($birdseed_settings)) {
			$this->birdseed_settings = $birdseed_settings;
		}
		
		// ajax actions
		// this is necessary for logged in users
		add_action('wp_ajax_birdseed', array($this, 'befive_birdseed_ajax') );
		// this is necessary for regular users
		add_action('wp_ajax_nopriv_birdseed', array($this, 'befive_birdseed_ajax') );
		
		if( !is_admin() ) {
			// uncomment below if you are loading jquery.tweet.js script and css by yourself
			add_action('wp_enqueue_scripts',  array($this, 'befive_shortcode_birdseed_enqueues') );

			if(!(
				isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
			)){
				add_action('wp_footer',  array($this, 'befive_birdseed_nonce_output') );
				if(is_array($this->birdseed_settings)) {
					// use shortcode
					add_shortcode('birdseed',  array($this, 'befive_shortcode_birdseed') );
				}
			}
		}
	}
	
	/* enqueue
		you can access this function from your themes
		usage example : <?php echo $your_instance->befive_shortcode_birdseed_enqueues(); ?> */
	public function befive_shortcode_birdseed_enqueues () {
		// set the last bit to true so that it works in generating the html (the enqueued styles  / scripts will be inserted at the wp footer).
		wp_enqueue_style( 'twitter_birdseed', Befive_birdseed_RESOURCE_URI.'/css/twitter_birdseed.css', true );
		wp_enqueue_script( 'tweet', Befive_birdseed_RESOURCE_URI.'/js/jquery.tweet.js' ,array('jquery'), "1.0", true );
	}
	
	public function befive_birdseed_ajax () {
		$ajax_response = array();
		
		if (!isset($this->library_path)) {
			$ajax_response += array('response' => false );
			$ajax_response += array('message' => 'Please make sure that library path is set.' );
			echo json_encode($ajax_response);
		} else if ( !empty($_POST) && check_ajax_referer('birdseed') ) {
			$EzTweet = new EzTweet(
				$this->library_path,
				$this->cache_dir,	
				array (
					'consumer_key'=>$this->consumer_key,
					'consumer_secret'=>$this->consumer_secret,
					'user_token'=>$this->user_token ,
					'user_secret'=>$this->user_secret
				)
			);
			$EzTweet->fetch();
		} else {
			$ajax_response += array('response' => false );
			$ajax_response += array('message' => 'Authentication failed.' );
			echo json_encode($ajax_response);
		}
		die();
	}

	public function befive_birdseed_nonce_output ($atts) {	
		wp_nonce_field( 'birdseed', 'ajax_nonce_birdseed', true, true ); ?>
		<input type="hidden" id="twitter_modpath" value="<?php echo admin_url('admin-ajax.php'); ?>" /><?php 
	}
	
	/**
		shortcode for testing purpose only
		usage : [birdseed id=""]
	*/
	public function befive_shortcode_birdseed ($atts) {
		$this->call_count ++;

		if(!is_array($atts)) {
			$atts = array('id' => 'birdseed_'.$this->call_count);
		} else if (is_array($atts) && !array_key_exists('id', $atts)) {
			$atts += array('id' => 'birdseed_'.$this->call_count);
		}
		
		if(!array_key_exists('username', $atts)) {
			$atts += array('username' => 'twitter');
		} else if ($atts['username'] === '') {
			$atts['username'] = 'twitter';
		}

		// enqueue
		$this->befive_shortcode_birdseed_enqueues();
		// returns the html and script
		return $this->befive_shortcode_birdseed_output($atts);
	}
		
	/**
		you can access this function from your themes
		usage example : <?php echo $your_instance->befive_shortcode_birdseed_output($id); ?> */
	public function befive_shortcode_birdseed_output ($atts) {		
		$output = '<div class="twitter_birdseed" id="'.$atts["id"].'"></div><script type="text/javascript">jQuery(document).ready(function() {jQuery("#'.$atts["id"].'").tweet({';
	    foreach($atts as $key => $value) {
		    if($value) $output .= "'{$key}' : '{$value}',\n";
	    }
		$output .= '"modpath": jQuery("input#twitter_modpath").val(),"_ajax_nonce": jQuery("input#ajax_nonce_birdseed").val(),"action" : "birdseed"});});</script>';
		return $output;
	}
}
