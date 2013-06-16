twitter_birdseed
================

A demo remix of tweet seaofclouds com based on StanScates / Tweet.js-Mod. For Twitter API 1.1, which has been converted into a WordPress plugin.

This WordPress plugin was made partly in response to a recent complete shut down of the old Twitter version API 1.

In short, we now need to get authorization to get tweet feeds from the Twitter. Our favorite jquery plugin sea of clouds tweet is not compatible with the newer way of getting tweets from twitter. Then Stan Scates found and shared a work around to use php scripts as an intermediary "layer" in between all the parties involved.

twitter_birdseed also comes with a shortcode for testing on your site. Edit the css to customize the appearance.

A brief tour of twitter_birdseed
================

###Installation

Install the zip archive to WordPress just as you normally do for plugin installation.

###Integrating the php scripts inside your WordPress themes

###Using the sample shortcode

This plugin comes with a shortcode to test how the Tweet.js-Mod works.

To try the shortcode and the Tweet.js-Mod, insert the following shortcode in the page content of WordPress.

<pre><code>[birdseed]</code></pre>

By default feeds of the official twitter account will be shown. To specify your account, use the username attribute.

<pre><code>[birdseed username="your_username"]</code></pre>

Occasionally you might want to specify an ID to the HTML element this shortcode generates. To specify the id, use the id attribute. For example:
<pre><code>[birdseed id="feed1" username="your_username"]</code></pre>

* Note: Except for the id attribute, most of attributes are compatible with the optional setting names of seaofclouds / tweet jQuery plugin.

NOTICE
================
This WordPress plugin is supposed to be a demo. It basically has only basic features inheritted from the original sources. So it has been made for you to modify to suit your own needs.

Please feel free to engage in what ever behavior you wish with the codes as long as it does not harm others.

Preparing now. Please wait till I set up my local git repo on my mac by 18 June 2013.

Respect
================
All the codes remixed in the twitter_birdseed WordPress plugin came from:

StanScates / Tweet.js-Mod
https://github.com/StanScates/Tweet.js-Mod

seaofclouds / tweet
https://github.com/seaofclouds/tweet
