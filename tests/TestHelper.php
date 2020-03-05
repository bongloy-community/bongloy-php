<?php

namespace Bongloy;

use Bongloy\Bongloy;

/**
 * Helper trait for Stripe test cases.
 */
trait TestHelper
{
    /** @before */
    protected function setUp()
    {
        Bongloy::setApiKey(getenv("BONGLOY_SECRET_KEY"));
    }
}
