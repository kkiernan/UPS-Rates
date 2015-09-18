<?php

namespace spec\KKiernan\Factories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('KKiernan\Factories\PackageFactory');
    }

    public function it_takes_exception_with_missing_weight()
    {
        $this->shouldThrow('\Exception')->duringCreate(['type' => '02', 'units' => 'LBS']);
    }

    public function it_provides_a_default_value_for_the_package_weight_unit_of_measure_code()
    {
        $package = $this->create(['weight' => 15]);

        $package->getPackageWeight()
                ->getUnitOfMeasure()
                ->getCode()
                ->shouldBe('LBS');
    }

    public function it_provides_a_default_value_for_the_packaging_type_code()
    {
        $package = $this->create(['weight' => 15]);

        $package->getPackagingType()
                ->getCode()
                ->shouldBe('02');
    }

    public function it_creates_a_package_with_a_given_array_of_options()
    {
        $package = [
            'weight' => 7,
            'units' => 'KGS',
            'type' => '03'
        ];

        $package = $this->create($package);

        $package->getPackageWeight()
                ->getWeight()
                ->shouldBe(7);

        $package->getPackageWeight()
                ->getUnitOfMeasure()
                ->getCode()
                ->shouldBe('KGS');

        $package->getPackagingType()
                ->getCode()
                ->shouldBe('03');
    }
}
