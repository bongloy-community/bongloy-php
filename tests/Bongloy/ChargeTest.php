<?php

namespace Bongloy;

use \PHPUnit\Framework\TestCase;
use Stripe\Charge;
use Stripe\Token;

final class ChargeTest extends TestCase
{
    use TestHelper;

    public function testCreatable()
    {
        $charge = Charge::create([
            'amount' => 10000,
            'currency' => 'USD',
            'source' => $this->token()->id,
        ]);
        $this->assertEquals($charge->amount, 10000);
        $this->assertEquals($charge->currency, "USD");
        $this->assertEquals($charge->status, "succeeded");
    }

    public function testIsRetrievable()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
        ]);
        $result = Charge::retrieve($charge->id);

        $this->assertEquals($charge->id, $result->id);
    }

    public function testIsListable()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
        ]);

        $charges = Charge::all();

        $this->assertIsArray($charges->data);
        $this->assertEquals($charges->data[0]->id, $charge->id);
    }

    public function testCanCapture()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
            'capture' => false,
        ]);

        $charge_capture = $charge->capture();

        $this->assertEquals($charge_capture->captured, true);
        $this->assertEquals($charge_capture->status, "succeeded");
        $this->assertEquals($charge_capture->amount, 1000);
    }

    public function testCanPartialCapture()
    {
        $charge = Charge::create([
            'amount' => 1000,
            'currency' => 'USD',
            'source' => $this->token()->id,
            'capture' => false,
        ]);

        $charge_capture = $charge->capture(['amount' => 800]);

        $this->assertEquals($charge_capture->captured, true);
        $this->assertEquals($charge_capture->amount_refunded, 200);
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
