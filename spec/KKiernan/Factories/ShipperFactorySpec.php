<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShipperFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\ShipperFactory');
    }

    public function it_provides_a_default_value_for_name()
    {
        $shipper = [
            'city'          => 'Philadelphia',
            'state'         => 'PA',
            'zip'           => '19153',
            'country'       => 'US',
        ];

        $shipper = $this->create($shipper);

        $shipper->getName()->shouldBe('');
    }

    public function it_provides_a_default_value_for_shipperNumber()
    {
        $shipper = [
            'city'          => 'Philadelphia',
            'state'         => 'PA',
            'zip'           => '19153',
            'country'       => 'US',
        ];

        $shipper = $this->create($shipper);

        $shipper->getShipperNumber()->shouldBe('');
    }

    public function it_creates_a_shipper_with_a_given_array_of_options()
    {
        $shipper = [
            'name'          => 'John Smith',
            'shipperNumber' => '123456',
            'city'          => 'Philadelphia',
            'state'         => 'PA',
            'zip'           => '19153',
            'country'       => 'US',
            'residential'   => true,
        ];

        $shipper = $this->create($shipper);

        $shipper->getName()->shouldBe('John Smith');
        $shipper->getShipperNumber()->shouldBe('123456');

        $address = $shipper->getAddress();

        $address->getCity()->shouldBe('Philadelphia');
        $address->getStateProvinceCode()->shouldBe('PA');
        $address->getPostalCode()->shouldBe('19153');
        $address->getCountryCode()->shouldBe('US');
        $address->getResidentialAddressIndicator()->shouldBe(true);
    }
}
