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
        'name'  => 'Jane Smith',
        'city'  => 'Reading',
        'state' => 'PA',
        'zip'   => '19610',
    ],
    'packages' => [
        [
            'weight' => 1,
            'units'  => 'KGS',
            'type'   => '03',
        ],
        [
            'weight' => 2.5,
            'units'  => 'LBS',
            'type'   => '02',
        ]
    ],
    'service'         => '02',
    'negotiatedRates' => true
];

$ups = new \KKiernan\Ups('yourUsername', 'yourPassword', 'yourApiKey');

$response = $ups->rates($options);
