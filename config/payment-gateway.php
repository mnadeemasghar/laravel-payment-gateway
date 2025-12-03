<?php

return [
    'default' => env('PAYMENT_GATEWAY_DEFAULT', 'example'),

    'gateways' => [
        'example' => [],
        // add driver-specific configs here, e.g. stripe => [...]
    ],
];
