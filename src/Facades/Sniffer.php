<?php

/*
 * This file is part of the snippetify package.
 *
 * (c) Evens Pierre <evenspierre@snippetify.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Snippetify\Sniptbot\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Snippetify\SnippetSniffer\SnippetSniffer
 */
class Sniffer extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sniptbot.sniffer';
    }
}
