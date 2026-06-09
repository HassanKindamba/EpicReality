<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | This controls which origins can access your Laravel API.
    | For Vue 3 (Vite) frontend running on localhost:5173
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:5173',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    /*
    | IMPORTANT:
    | If you are using Sanctum authentication (login/session),
    | set this to true. Otherwise leave false.
    */
    'supports_credentials' => true,

];