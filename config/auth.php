<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    'guards' => [
        // Guard untuk admin (default)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard untuk pelanggan
        'customers' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
    ],

    'providers' => [
        // Provider untuk admin
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Provider untuk pelanggan
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class, // Ganti dengan model pelanggan
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [
            'provider' => 'customers',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
