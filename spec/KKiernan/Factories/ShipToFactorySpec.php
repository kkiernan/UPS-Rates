<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShipToFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\ShipToFactory');
    }

    public function it_provides_a_default_value_for_company_name()
    {
        $shipTo = [
            'city'    => 'Philadelphia',
            'state'   => 'PA',
            'zip'     => '19153',
            'country' => 'US',
        ];

        $shipTo = $this->create($shipTo);

        $shipTo->getCompanyName()->shouldBe('');
    }

    public function it_creates_a_ship_to_with_a_given_array_of_options()
    {
        $shipTo = [
            'name'        => 'John Smith',
            'city'        => 'Philadelphia',
            'state'       => 'PA',
            'zip'         => '19153',
            'country'     => 'US',
            'residential' => false,
        ];

        $shipTo = $this->create($shipTo);

        $shipTo->getCompanyName()->shouldBe('John Smith');

        $address = $shipTo->getAddress();

        $address->getCity()->shouldBe('Philadelphia');
        $address->getStateProvinceCode()->shouldBe('PA');
        $address->getPostalCode()->shouldBe('19153');
        $address->getCountryCode()->shouldBe('US');
        $address->getResidentialAddressIndicator()->shouldBe(false);
    }
}
