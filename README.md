# Laravel Sniptbot

This repository implements a simple [ServiceProvider](https://laravel.com/docs/master/providers) that makes the instances of the Snippet **Crawler** and **Sniffer** easily accessible via a [Facade](https://laravel.com/docs/master/facades) in [Laravel](http://laravel.com). See [@Snippetify/Snippet-sniffer](https://github.com/snippetify/snippet-sniffer) for more information about the PHP Snippet sniffing and its interfaces.

## What it does

This library allows you 

1. To get code snippets using search engine api (Google)
2. To get code snippets from any web page by crawling url seeds.

## How to use it

```bash
$ composer require snippetify/laravel-sniptbot
```

```php
php artisan vendor:publish --provider="Snippetify\Sniptbot\SniptbotServiceProvider"
```

##### Configuration

Open the created file in the `config/sniptbot.php` and customize the configuration options to your liking.

```php
return [
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
```

##### Sniffing from search engine api

```php
use Snippetify\Sniptbot\Facades\Sniffer;

// Important: You must set your search engine keys before using it
// @return Snippetify\SnippetSniffer\Common\Snippet[]
$snippets = Sniffer::fetch('js array contains value');
```

##### Crawl url seeds

```php
use Snippetify\Sniptbot\Facades\Crawler;

// @return Snippetify\SnippetSniffer\Common\MetaSnippetCollection[]
$snippets = Crawler::fetch(['your urls']);
```



## Changelog

Please see [CHANGELOG](https://github.com/snippetify/laravel-sniptbot/blob/master/CHANGELOG.md) for more information what has changed recently.

## Testing

 You must set the **PROVIDER_NAME**, **PROVIDER_CX**, **PROVIDER_KEY**, **CRAWLER_URI**, keys in phpunit.xml file before running tests.

**Important:** Those links must contains at least one snippet otherwise the tests will failed.

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](https://github.com/snippetify/laravel-sniptbot/blob/master/CONTRIBUTING.md) for details.

## Credits

1. [Evens Pierre](https://github.com/pierrevensy)

## License

The MIT License (MIT). Please see [License File](https://github.com/snippetify/laravel-sniptbot/blob/master/LICENSE.md) for more information.

