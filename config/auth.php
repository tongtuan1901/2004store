<?php

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
        'user_staff' => [
            'driver' => 'session',
            'provider' => 'user_staff', 
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'user_staff' => [
            'driver' => 'eloquent',
            'model' => App\Models\UserStaff::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'user_staff' => [
            'provider' => 'user_staff',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

    'password_broker' => [
        'users' => [
            'provider' => 'users',
        ],
        'user_staff' => [
            'provider' => 'user_staff',
        ],
    ],
];
