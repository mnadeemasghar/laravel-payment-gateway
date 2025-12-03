<?php

namespace Mnadeemasghar\PaymentGateway;

use Mnadeemasghar\PaymentGateway\Contracts\PaymentGatewayInterface;
use Mnadeemasghar\PaymentGateway\Drivers\ExampleGateway;
use InvalidArgumentException;

class PaymentGatewayManager
{
    protected array $gateways = [];
    protected string $default;

    public function __construct()
    {
        $this->default = config('payment-gateway.default', 'example');
        // register built-in drivers
        $this->register('example', new ExampleGateway());
    }

    public function register(string $name, PaymentGatewayInterface $driver): void
    {
        $this->gateways[$name] = $driver;
    }

    public function driver(string $name = null): PaymentGatewayInterface
    {
        $name = $name ?: $this->default;

        if (! isset($this->gateways[$name])) {
            throw new InvalidArgumentException("Gateway '{$name}' not registered.");
        }

        return $this->gateways[$name];
    }

    public function __call($method, $arguments)
    {
        $driver = $this->driver();
        return $driver->{$method}(...$arguments);
    }
}
