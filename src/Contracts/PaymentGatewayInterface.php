<?php

namespace Mnadeemasghar\PaymentGateway\Contracts;

interface PaymentGatewayInterface
{
    public function charge(array $payload);
    public function refund(string $transactionId, float $amount = null);
    public function verify(string $transactionId);
}
