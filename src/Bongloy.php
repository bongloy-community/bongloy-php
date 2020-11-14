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

class Token extends \Stripe\Token {}
class Charge extends \Stripe\Charge {}
class Customer extends \Stripe\Customer {}
class Refund extends \Stripe\Refund {}
class PaymentIntent extends \Stripe\PaymentIntent {}
