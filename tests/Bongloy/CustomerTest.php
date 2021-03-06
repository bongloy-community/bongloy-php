<?php
namespace Bongloy;

use \PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    use TestHelper;

    public function testCreatable()
    {
        $customer = Customer::create([
            'email' => "user@example.com",
            'description' => 'Bongloy customer',
            'source' => $this->token()->id
        ]);

        $this->assertEquals($customer->email, "user@example.com");
        $this->assertEquals($customer->description, "Bongloy customer");
    }

    public function testIsRetrievable()
    {
        $customer = Customer::create([
            'email' => "user@example.com",
            'description' => 'Bongloy customer',
            'source' => $this->token()->id
        ]);
        $result = Customer::retrieve($customer->id);

        $this->assertEquals($customer->id, $result->id);
    }

    public function testIsListable()
    {
        $customer = Customer::create([
            'email' => "user@example.com",
            'description' => 'Bongloy customer',
            'source' => $this->token()->id
        ]);

        $customers = Customer::all(['limit' => 30]);

        $this->assertArrayHasKey($customer->id, array_column($customers->data, 'email', 'id'));
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
