<?php

if (! function_exists('payment_gateway')) {
    function payment_gateway()
    {
        return app('payment-gateway');
    }
}
