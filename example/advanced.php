<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$options = [
    'from'  => [
        'name'          => 'John Smith',
        'shipperNumber' => 'yourShipperNumber',
        'city'          => 'Philadelphia',
        'state'         => 'PA',
        'zip'           => '19153',
    ],
    'to'   => [
        'name' => 'Jane Smith',
        'city'  => 'Reading',
        'state' => 'PA',
        'zip'   => '19610',
    ],
    'packages' => [
        [
            'weight' => 1,
            'type' => '03',
            'units' => 'KGS'
        ],
        [
            'weight' => 2.5,
            'type' => '02',
            'units' => 'LBS'
        ]
    ],
    'service'         => '02',
    'negotiatedRates' => true
];

$ups = new \KKiernan\Ups('yourUsername', 'yourPassword', 'yourApiKey');

$response = $ups->rates($options);
