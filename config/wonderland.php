<?php

return [
    'start_time' => '10:00',
    'end_time' => '20:00',
    'notify_period' => 2880, // 48 hours prior,
    'mail' => [
        'admin' => [
            'address' => env('MAIL_ADMIN_ADDRESS', 'admin@wonderlandpicnics.co.ke'),
            'name' => env('MAIL_ADMIN_NAME', 'Admin'),
        ],
        'marketing' => [
            'address' => env('MAIL_MARKETING_ADDRESS', 'admin@wonderlandpicnics.co.ke'),
            'name' => env('MAIL_MARKETING_NAME', 'Admin'),
        ],
    ],
];
