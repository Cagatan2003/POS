<?php

return [

'guards' => [
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'cashier' => [
        'driver' => 'session',
        'provider' => 'cashiers',
    ],
],

'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'cashiers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Cashier::class,
    ],
],

];
