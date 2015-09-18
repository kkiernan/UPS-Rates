<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$options = [
    'from'  => [
        'city'  => 'Philadelphia',
        'state' => 'PA',
        'zip'   => '19153',
    ],
    'to'   => [
        'city'  => 'Reading',
        'state' => 'PA',
        'zip'   => '19610',
    ],
    'packages' => [
        [
            'weight' => 1
        ]
    ]
];

$ups = new \KKiernan\Ups('yourUsername', 'yourPassword', 'yourApiKey');

$response = $ups->rates($options);
