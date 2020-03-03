<?php

namespace Bongloy;

use Bongloy\Bongloy;

/**
 * Helper trait for Stripe test cases.
 */
trait TestHelper
{
    /** @var string original API key */
    protected $origApiKey;

    /** @before */
    protected function setUp(): void
    {
        $this->origApiKey = Bongloy::getApiKey();

        Bongloy::setApiKey(getenv("BONGLOY_SECRET_KEY"));
    }

    /** @after */
    protected function tearDown(): void
    {
        Bongloy::setApiKey($this->origApiKey);
    }
}
