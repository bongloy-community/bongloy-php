<?php

namespace Bongloy;

use \PHPUnit\Framework\TestCase;
use Stripe\PaymentIntent;

final class PaymentIntentTest extends TestCase
{
    use TestHelper;

    public function testCreatable()
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => 10000,
            'currency' => 'USD',
            'payment_method_types[]' => 'qr_code'
        ]);
        $this->assertEquals(10000, $paymentIntent->amount);
        $this->assertEquals('USD', $paymentIntent->currency);
        $this->assertEquals('requires_payment_method', $paymentIntent->status);
    }

    public function testUpdatable()
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => 10000,
            'currency' => 'USD',
            'payment_method_types[]' => 'qr_code'
        ]);

        $result = PaymentIntent::update(
            $paymentIntent->id,
            [
                'metadata' => ['key' => 'value']
            ]
        );
        $this->assertEquals('value', $result->metadata['key']);
    }

    public function testIsRetrievable()
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'USD',
            'payment_method_types[]' => 'qr_code'
        ]);
        $result = PaymentIntent::retrieve($paymentIntent->id);
        $this->assertEquals($paymentIntent->id, $result->id);
    }

    public function testIsListable()
    {
        $paymentIntent = PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'USD',
            'payment_method_types[]' => 'qr_code'
        ]);

        $paymentIntents = PaymentIntent::all(['limit' => 30]);
        $this->assertArrayHasKey($paymentIntent->id, array_column($paymentIntents->data, 'amount', 'id'));
    }
}
