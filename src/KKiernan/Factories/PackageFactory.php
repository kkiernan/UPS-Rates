<?php

namespace KKiernan\Factories;

use KKiernan\Ups\Package;
use KKiernan\Ups\PackageWeight;
use KKiernan\Ups\PackagingType;
use KKiernan\Ups\UnitOfMeasure;

class PackageFactory
{
    /**
     * Creates a new package instance.
     * 
     * @param array $package
     * 
     * @return \KKiernan\Ups\Package
     */
    public static function create(array $package)
    {
        static::guardAgainstMissingRequirements($package);

        $package = static::setImplicitDefaults($package);

        $packagingType = new PackagingType($package['type']);

        $unitOfMeasure = new UnitOfMeasure($package['units']);

        $packageWeight = new PackageWeight($package['weight'], $unitOfMeasure);

        return new Package($packagingType, $packageWeight);
    }

    /**
     * Guards against required fields that are missing.
     *
     * @param array $package
     * 
     * @throws \Exception
     * 
     * @return void
     */
    protected function guardAgainstMissingRequirements(array $package)
    {
        if (!isset($package['weight'])) {
            throw new \Exception('Package weight is required');
        }
    }

    /**
     * Sets default UPS values for attributes not explicitly set by the user.
     * 
     * @param array $package
     *
     * @return array
     */
    protected function setImplicitDefaults(array $package)
    {
        if (!isset($package['units'])) {
            $package['units'] = 'LBS';
        }

        if (!isset($package['type'])) {
            $package['type'] = '02';
        }

        return $package;
    }
}
