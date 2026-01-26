<?php

// config/auth.php
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'warga' => [
            'driver' => 'session',
            'provider' => 'warga',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'warga' => [
            'driver' => 'eloquent',
            'model' => App\Models\Warga::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => ,
        ],
    ],
];
