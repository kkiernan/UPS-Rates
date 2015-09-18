<?php

namespace KKiernan\Factories;

use KKiernan\Factories\PackageFactory;
use KKiernan\Factories\ShipToFactory;
use KKiernan\Factories\ShipperFactory;
use KKiernan\Ups\RateInformation;
use KKiernan\Ups\Service;
use KKiernan\Ups\Shipment;

class ShipmentFactory
{
    /**
     * Creates a new shipment instance.
     *
     * @param array $options
     *
     * @return \KKiernan\Ups\Shipment
     */
    public static function create(array $options)
    {
        static::guardAgainstMissingRequirements($options);

        $options = static::setImplicitDefaults($options);

        $packages = static::buildPackages($options);

        $shipper = ShipperFactory::create($options['from']);

        $shipTo = ShipToFactory::create($options['to']);

        $service = new Service($options['service']);

        $rateInformation = new RateInformation($options['negotiatedRates']);

        return new Shipment($options['description'], $shipper, $shipTo, $service, $rateInformation, $packages);
    }

    /**
     * Guards against required fields that are missing.
     *
     * @param array $options
     *
     * @throws \Exception
     * 
     * @return void
     */
    protected function guardAgainstMissingRequirements(array $options)
    {
        if (!isset($options['from'])) {
            throw new \Exception('From is required');
        }

        if (!isset($options['to'])) {
            throw new \Exception('To to is required');
        }
    }

    /**
     * Sets UPS default values for attributes not explicitly set by the user.
     * 
     * @param array $options
     *
     * @return array
     */
    protected function setImplicitDefaults(array $options)
    {
        if (!isset($options['description'])) {
            $options['description'] = 'Rate';
        }

        if (!isset($options['service'])) {
            $options['service'] = '01';
        }

        if (!isset($options['negotiatedRates'])) {
            $options['negotiatedRates'] = false;
        }

        return $options;
    }

    /**
     * Builds the packages array.
     * 
     * @param array $options
     * 
     * @return array
     */
    protected function buildPackages(array $options)
    {
        $packages = [];

        if (isset($options['packages'])) {
            foreach ($options['packages'] as $package) {
                $packages[] = PackageFactory::create($package);
            }
        }

        return $packages;
    }
}
