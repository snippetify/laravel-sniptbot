<?php

/*
 * This file is part of the snippetify package.
 *
 * (c) Evens Pierre <evenspierre@snippetify.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snippetify\Sniptbot\Tests;

use Snippetify\SnippetSniffer\WebCrawler;
use Snippetify\SnippetSniffer\SnippetSniffer;

class SniptbotServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function has_registered_services()
    {
        $this->assertTrue($this->app->bound('sniptbot.crawler'));
        $this->assertTrue($this->app->bound('sniptbot.sniffer'));

        $this->assertInstanceOf(WebCrawler::class, $this->app->make('sniptbot.crawler'));
        $this->assertInstanceOf(SnippetSniffer::class, $this->app->make('sniptbot.sniffer'));
    }

    /**
     * @test
     */
    public function has_registered_aliases()
    {
        $this->assertTrue($this->app->isAlias(WebCrawler::class));
        $this->assertTrue($this->app->isAlias(SnippetSniffer::class));
        $this->assertEquals('sniptbot.crawler', $this->app->getAlias(WebCrawler::class));
        $this->assertEquals('sniptbot.sniffer', $this->app->getAlias(SnippetSniffer::class));
    }

    /**
     * @test
     */
    public function has_registered_package_config()
    {
        $config = $this->app->make('config');

        $this->assertEquals($config->get('sniptbot.app'), [
            'name' => 'Sniptbot',
            'version' => '1.0.0',
        ]);
    }

    /**
     * @test
     */
    public function does_not_provide_singleton_instance()
    {
        $this->assertNotSame($this->app->make('sniptbot.crawler'), $this->app->make('sniptbot.crawler'));
        $this->assertNotSame($this->app->make('sniptbot.sniffer'), $this->app->make('sniptbot.sniffer'));
    }

    /**
     * @test
     */
    public function does_sniffer_contains_results()
    {
        $data = $this->app->make('sniptbot.sniffer')->fetch('js array contains', [ 'page' => 1, 'limit' => 10 ]);

        $this->assertGreaterThan(0, count($data));
    }

    /**
     * @test
     */
    public function does_crawler_contains_results()
    {
        $data = $this->app->make('sniptbot.crawler')->fetch([$_SERVER['CRAWLER_URI']]);

        $this->assertGreaterThan(0, count($data));
    }
}
