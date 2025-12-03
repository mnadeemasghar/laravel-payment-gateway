<?php

namespace Mnadeemasghar\PaymentGateway\Drivers;

use Mnadeemasghar\PaymentGateway\Contracts\PaymentGatewayInterface;

class ExampleGateway implements PaymentGatewayInterface
{
    public function charge(array $payload)
    {
        return [
            'status' => 'success',
            'transaction_id' => 'TXN-' . rand(100000, 999999),
            'payload' => $payload
        ];
    }

    public function refund(string $transactionId, float $amount = null)
    {
        return [
            'status' => 'refunded',
            'transaction_id' => $transactionId,
            'amount' => $amount
        ];
    }

    public function verify(string $transactionId)
    {
        return [
            'status' => 'verified',
            'transaction_id' => $transactionId
        ];
    }
}
