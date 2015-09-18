# UPS Rates

A package for retrieving rates from the UPS Web Service API.

## Simple Example

```
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
```

## Additional Options Example

```
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
            'units' => 'KGS'
            'type' => '03',
        ],
        [
            'weight' => 2.5,
            'units' => 'LBS'
            'type' => '02',
        ]
    ],
    'service'         => '02',
    'negotiatedRates' => true
];

$ups = new \KKiernan\Ups('yourUsername', 'yourPassword', 'yourApiKey');

$response = $ups->rates($options);

```

## UPS Codes

### Service

The following are valid values for the `service` attribute.

Code | Value                          | Location
---- | ------------------------------ | -------------
14   | Next Day Air Early AM          | Domestic     
01   | Next Day Air                   | Domestic     
13   | Next Day Air Saver             | Domestic     
59   | 2nd Day Air AM                 | Domestic     
02   | 2nd Day Air                    | Domestic     
12   | 3 Day Select                   | Domestic     
03   | Ground                         | Domestic     
70   | UPS Access Point™ Economy      | Domestic     
11   | Standard                       | International
07   | Worldwide Express              | International
54   | Worldwide Express Plus         | International
08   | Worldwide Expedited            | International
65   | Saver                          | International
82   | UPS Today Standard             | Poland       
83   | UPS Today Dedicated Courier    | Poland       
84   | UPS Today Intercity            | Poland       
85   | UPS Today Express              | Poland       
86   | UPS Today Express Saver        | Poland       
96   | UPS World Wide Express Freight | Poland       


### Package Types

The following are valid values for the packages `type` attribute.

Code | Value
---- | ------------------
00   | UNKNOWN
01   | UPS Letter
02   | Package
03   | Tube
04   | Pak
21   | Express Box
24   | 25KG Box
25   | 10KG Box
30   | Pallet
2a   | Small Express Box
2b   | Medium Express Box
2c   | Large Express Box

### Package Weight Units

The following are valid values for the packages `units` attribute.

Code | Value
---- | ---------
LBS  | Pounds
KGS  | Kilograms
