<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShipmentFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\ShipmentFactory');
    }

    public function it_takes_exception_with_missing_from()
    {
        $options = [
            'to'   => [],
            'packages' => [],
        ];

        $this->shouldThrow('\Exception')->duringCreate($options);
    }

    public function it_takes_exception_with_missing_to()
    {
        $options = [
            'from'  => [],
            'packages' => [],
        ];

        $this->shouldThrow('\Exception')->duringCreate($options);
    }

    public function it_provides_a_default_values()
    {
        $options = [
            'from'  => [
                'name'          => 'John Smith',
                'shipperNumber' => '123456',
                'city'          => 'Philadelphia',
                'state'         => 'PA',
                'zip'           => '19153',
                'country'       => 'US',
            ],
            'to'   => [
                'name'    => 'Jane Smith',
                'city'    => 'Reading',
                'state'   => 'PA',
                'zip'     => '19610',
                'country' => 'US',
            ],
            'packages' => [
                [
                    'weight' => 5,
                    'units'  => 'LBS',
                    'type'   => '02',
                ]
            ]
        ];

        $shipment = $this->create($options);

        $shipment->getDescription()->shouldBe('Rate');
        $shipment->getService()->getCode()->shouldBe('01');
        $shipment->getRateInformation()->getNegotiatedRatesIndicator()->shouldBe(false);
    }
}
