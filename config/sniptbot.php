<?php

/*
 * This file is part of the snippetify package.
 *
 * (c) Evens Pierre <evenspierre@snippetify.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
     |-----------------------------------------------------------------------
     | Snippetify Sniptbot Configuration
     |-----------------------------------------------------------------------
     |
     | A collection of default options to apply to snippet sniffer objects
     |
     | @see {@link https://github.com/snippetify/snippet-sniffer}
     */

    // Search engine api configuration keys
  	'provider' 	=> [
      // Your google Search engine ID
      // https://developers.google.com/custom-search/v1/introduction
    	'cx' 	=> env('SNIPTBOT_PROVIDER_CX', ''),
      // Your google API key
      // https://developers.google.com/custom-search/v1/overview#api_key
    	'key' 	=> env('SNIPTBOT_PROVIDER_KEY', ''),
    	'name' 	=> env('SNIPTBOT_PROVIDER_NAME', 'google'), // provider name (google)
  	],
  	
  	// Optional
  	// Useful for adding meta information to each snippet
  	'app' => [
    	'name' 		=> env('SNIPTBOT_NAME', 'Sniptbot'), // your sniptbot name
    	'version' 	=> env('SNIPTBOT_VERSION', '1.0.0'), // your sniptbot version
  	],

  	// Optional
  	// Useful for logging
  	'logger' => [
    	'name' => env('SNIPTBOT_NAME', 'Sniptbot'), // logger name
    	'file' => storage_path('logs/sniptbot.log'), // logger file path
  	],

  	// Optional
  	// Useful for scraping
  	'html_tags' => [
    	'index' 	=> 'h1, h2, h3, h4, h5, h6, p, li', // Tags to index
    	'snippet' 	=> 'pre[class] code, div[class] code, .highlight pre, code[class]', // Tags to fetch snippets
  	],

  	// Optional
  	// Useful for adding new scrapers
  	// The name must be the website host without the scheme i.e. not https://foo.com but foo.com
  	'scrapers' => [
    	// 'scraper_name' 	 => ScraperClass::class, // You can add as many as you want
  	],

  	// Optional
  	// Useful for adding new providers
  	'providers' => [
    	// 'provider_name' 	=> ProviderClass::class, // You can add as many as you want
  	],

  	// Optional
  	// Useful for web crawling
  	// Please follow the link below for more information as we use Spatie crawler
  	// https://github.com/spatie/crawler
  	'crawler' => [
    	// 'langs' 				 => ['en'],
    	// 'profile' 				 => Snippetify\SnippetSniffer\Profiles\CrawlSubdomainsAndUniqueUri::class,
    	// 'user_agent' 			 => Snippetify\SnippetSniffer\Core::CRAWLER_USER_AGENT,
    	// 'concurrency' 			 => 10,
    	// 'ignore_robots' 		 => false,
    	// 'maximum_depth' 		 => null,
    	// 'execute_javascript' 	 => false,
    	// 'maximum_crawl_count' 	 => null,
    	// 'parseable_mime_types' 	 => ['text/html'],
    	// 'maximum_response_size'  => 1024 * 1024 * 3,
    	// 'delay_between_requests' => 250,
  	]
];
