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
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
        if(file_exists(__DIR__.'/.env')){
          $dotenv->load();
        }

        $this->origApiKey = Bongloy::getApiKey();

        Bongloy::setApiKey($_ENV['BONGLOY_SECRET_KEY']);
    }

    /** @after */
    protected function tearDown(): void
    {
        Bongloy::setApiKey($this->origApiKey);
    }
}
