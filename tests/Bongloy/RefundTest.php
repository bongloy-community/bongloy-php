<?php

namespace Bongloy;

use \PHPUnit\Framework\TestCase;
use Stripe\Charge;
use Stripe\Refund;
use Stripe\Token;

final class RefundTest extends TestCase
{
    use TestHelper;

    public function testCreatable()
    {
      $charge = Charge::create([
          'amount' => 1000,
          'currency' => 'USD',
          'source' => $this->token()->id,
      ]);

      $refund = Refund::create([
        'charge' => $charge->id
      ]);

      $this->assertEquals($refund->amount, 1000);
      $this->assertEquals($refund->charge, $charge->id);
    }

    public function testCanPartialRefund()
    {
      $charge = Charge::create([
          'amount' => 1000,
          'currency' => 'USD',
          'source' => $this->token()->id,
      ]);

      $refund = Refund::create([
        'charge' => $charge->id,
        'amount' => 800
      ]);

      $this->assertEquals($refund->amount, 800);
    }

    public function testIsRetrievable()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
        ]);

        $refund = Refund::create(['charge' => $charge->id]);
        $result = Refund::retrieve($refund->id);

        $this->assertEquals($result->id, $refund->id);
    }

    public function testIsListable()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
        ]);

        $refund = Refund::create(['charge' => $charge->id]);

        $refunds = Refund::all(['limit' => 30]);

        $this->assertArrayHasKey($refund->id, array_column($refunds->data, 'amount', 'id'));
    }

    private function token()
    {
        $token = Token::create([
            'card' => [
              'number' => '6200000000000005',
              'exp_month' => 2,
              'exp_year' => 2021,
              'cvc' => '123',
            ],
        ]);

        return $token;
    }
}
