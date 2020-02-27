<?php

namespace Bongloy;

use Stripe\Stripe;

Stripe::$apiBase = 'https://api.bongloy.com';
Stripe::$connectBase = 'https://www.bongloy.com';

class Bongloy extends Stripe
{
    /**
     * Sets the API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        parent::setApiKey($apiKey);
    }
}
