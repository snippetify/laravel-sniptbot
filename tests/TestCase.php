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

use Snippetify\Sniptbot\Facades\Crawler;
use Snippetify\Sniptbot\Facades\Sniffer;
use Snippetify\Sniptbot\SniptbotServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SniptbotServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Crawler' => Crawler::class,
            'Sniffer' => Sniffer::class
        ];
    }
}
