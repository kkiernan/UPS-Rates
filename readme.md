# UPS Rates

A package for retrieving rates from the UPS Web Service API.

- [Simple Example](#simple-example)
- [Additional Options Example](#additional-options-example)
- [UPS Codes](#ups-codes)
    - [Services](#services)
    - [Package Types](#package-types)
    - [Package Weight Units](#package-weight-units)
- [Requests](#requests)
- [Responses](#responses)

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
```

## UPS Codes

### Services

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

# Requests

This package helps you build an XML request that gets sent to the UPS API. If you'd like to view the XML string generated, you can call the `Ups::getLastRequest` method after sending your request. For example:

```
...

$ups = new \KKiernan\Ups('yourUsername', 'yourPassword', 'yourApiKey');

$response = $ups->rates($options);

echo $ups->getLastRequest();
```

# Responses

The reponse is a SimpleXMLElement object. It includes a lot of useful data from the UPS API. You can access properties on the object pretty easily. For example, you can access the total charge via `$response->RatedShipment->TotalCharges->MonetaryValue`. This is pretty verbose, and I may add helpers in the future, but I like being able to access the full response for now.

The following is an example response:

```
SimpleXMLElement Object
(
    [Response] => SimpleXMLElement Object
    (
        [TransactionReference] => SimpleXMLElement Object
        (
            [CustomerContext] => Rating and Service
            [XpciVersion] => 1.0
        )
        [ResponseStatusCode] => 1
        [ResponseStatusDescription] => Success
    )
    [RatedShipment] => SimpleXMLElement Object
    (
        [Service] => SimpleXMLElement Object
        (
            [Code] => 01
        )
        [RatedShipmentWarning] => Your invoice may vary from the displayed reference rates
        [BillingWeight] => SimpleXMLElement Object
        (
            [UnitOfMeasurement] => SimpleXMLElement Object
            (
                [Code] => LBS
            )
            [Weight] => 1.0
        )
        [TransportationCharges] => SimpleXMLElement Object
        (
            [CurrencyCode] => USD
            [MonetaryValue] => 26.09
        )
        [ServiceOptionsCharges] => SimpleXMLElement Object
        (
            [CurrencyCode] => USD
            [MonetaryValue] => 0.00
        )
        [TotalCharges] => SimpleXMLElement Object
        (
            [CurrencyCode] => USD
            [MonetaryValue] => 26.09
        )
        [GuaranteedDaysToDelivery] => 1
        [ScheduledDeliveryTime] => 10:30 A.M.
        [RatedPackage] => SimpleXMLElement Object
        (
            [TransportationCharges] => SimpleXMLElement Object
            (
                [CurrencyCode] => USD
                [MonetaryValue] => 26.09
            )
            [ServiceOptionsCharges] => SimpleXMLElement Object
            (
                [CurrencyCode] => USD
                [MonetaryValue] => 0.00
            )
            [TotalCharges] => SimpleXMLElement Object
            (
                [CurrencyCode] => USD
                [MonetaryValue] => 26.09
            )
            [Weight] => 1.0
            [BillingWeight] => SimpleXMLElement Object
            (
                [UnitOfMeasurement] => SimpleXMLElement Object
                (
                    [Code] => LBS
                )
                [Weight] => 1.0
            )
        )
    )
)
```