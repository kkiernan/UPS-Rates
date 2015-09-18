<?php

namespace spec\KKiernan\Factories;

use KKiernan\Ups\Address;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\AddressFactory');
    }

    public function it_takes_exception_with_missing_city()
    {
        $this->shouldThrow('\Exception')->duringCreate(['state' => 'PA', 'zip' => '19144']);
    }

    public function it_takes_exception_with_missing_state()
    {
        $this->shouldThrow('\Exception')->duringCreate(['zip' => '19144', 'city' => 'Philadelphia']);
    }

    public function it_takes_exception_with_missing_zip()
    {
        $this->shouldThrow('\Exception')->duringCreate(['city' => 'Philadelphia', 'state' => 'PA']);
    }

    public function it_provides_a_default_value_for_country_code()
    {
        $address = [
            'city'  => 'Philadelphia',
            'state' => 'PA',
            'zip'   => '19144',
        ];

        $address = $this->create($address);

        $address->getCountryCode()->shouldBe('US');
    }

    public function it_provides_a_default_value_for_residential_address_indicator()
    {
        $address = [
            'city'  => 'Philadelphia',
            'state' => 'PA',
            'zip'   => '19144',
        ];

        $address = $this->create($address);

        $address->getResidentialAddressIndicator()->shouldBe(false);
    }

    public function it_creates_an_address_with_a_given_array_of_options()
    {
        $address = [
            'city'        => 'London',
            'state'       => '',
            'zip'         => 'SW1A 2DY',
            'country'     => 'UK',
            'residential' => true,
        ];

        $address = $this->create($address);

        $address->getCity()->shouldBe('London');
        $address->getStateProvinceCode()->shouldBe('');
        $address->getPostalCode()->shouldBe('SW1A 2DY');
        $address->getCountryCode()->shouldBe('UK');
        $address->getResidentialAddressIndicator()->shouldBe(true);
    }
}
