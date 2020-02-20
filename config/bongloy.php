<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bongloy publishable Keys
    |--------------------------------------------------------------------------
    |
    | The publishable key is typically used when interacting with
    | Bongloy.js while the "secret" key accesses private API endpoints.
    |
    */

    'publishable_key' => env('BONGLOY_PUBLISHABLE_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Bongloy Secret Keys
    |--------------------------------------------------------------------------
    |
    | The Bongloy secret key give you access to bongloy's API.
    |
    */

    'api_key' => env('BONGLOY_SECRET_KEY'),
];
