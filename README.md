twitter_birdseed
================

A demo remix of tweet seaofclouds com based on StanScates / Tweet.js-Mod. For Twitter API 1.1, which has been converted into a WordPress plugin.

This WordPress plugin was made partly in response to a recent complete shut down of the old Twitter version API 1.

In short, we now need to get authorization to get tweet feeds from the Twitter. Our favorite jquery plugin sea of clouds tweet is not compatible with the newer way of getting tweets from twitter. Then Stan Scates found and shared a work around to use php scripts as an intermediary "layer" in between all the parties involved.

Put aside the older jquery.tweet.js script file and activate this plugin. Your tweet should now work again as it used to before the twitter version 1.0 was completely shut down.

The twitter_birdseed also comes with a shortcode for testing purposes. Edit the css to customize the appearance.

A brief tour of twitter_birdseed
================

###Installation

Install the zip archive to WordPress just as you normally do for plugin installation.

Now you need to get your API keys from https://dev.twitter.com/apps

* Consumer key
* Consumer secret
* User token
* User secret

Open up twitter_birdseed.php with your text editor. Set the following variables accordingly.
<pre><code>	$consumer_key = '';
$consumer_secret = '';
$user_token = '';
$user_secret = '';
</code></pre>

###Using the sample shortcode

This plugin comes with a shortcode to test how the modified Tweet.js-Mod works.

To try the shortcode and the modified version of Tweet.js-Mod, insert the following shortcode in the page content of WordPress.

<pre><code>[birdseed]</code></pre>

By default feeds of the official twitter account will be shown. To specify your account, use the username attribute.

<pre><code>[birdseed username="your_username"]</code></pre>

Occasionally you might want to specify an ID to the HTML element this shortcode generates. To specify the id, use the id attribute. For example:
<pre><code>[birdseed id="feed1" username="your_username"]</code></pre>

* Note: Except for the id attribute, all other attribute names and values are compatible with those of optional settings of the seaofclouds / tweet jQuery plugin.

NOTICE
================
This WordPress plugin is supposed to be a demo. It basically has only basic features inheritted from the original sources. So it has been made for you to modify to suit your own needs.

The plugin allows the tweet.js to retrieve data from twitter. However you will still need to customize the ui and appearance to meet the guideline required by twitter, which is not included in this package. For details of the requirement, please refer to https://dev.twitter.com/terms/display-requirements

Please feel free to engage in what ever behavior you wish with the codes as long as it does not harm others.

Preparing now. Please wait till I set up my local git repo on my mac by 18 June 2013.

References 
================
All the codes remixed in the twitter_birdseed WordPress plugin came from:

StanScates / Tweet.js-Mod
https://github.com/StanScates/Tweet.js-Mod

seaofclouds / tweet
https://github.com/seaofclouds/tweet
