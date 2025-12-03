<?php

namespace Mnadeemasghar\PaymentGateway;

use Illuminate\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/payment-gateway.php', 'payment-gateway');

        $this->app->singleton('payment-gateway', function ($app) {
            return new PaymentGatewayManager();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/payment-gateway.php' => config_path('payment-gateway.php'),
        ], 'config');
    }
}
