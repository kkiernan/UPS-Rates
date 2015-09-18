<?php

namespace KKiernan\Factories;

use KKiernan\Ups\Shipper;

class ShipperFactory
{
    /**
     * Creates a new shipper instance.
     *
     * @param array $shipper
     *
     * @return \KKiernan\Ups\Shipper
     */
    public static function create(array $shipper)
    {
        $shipper = static::setImplicitDefaults($shipper);

        $address = AddressFactory::create($shipper);

        return new Shipper($shipper['name'], $shipper['shipperNumber'], $address);
    }

    /**
     * Sets default UPS values for attributes not explicitly set by the user.
     *
     * @param array $shipper
     *
     * @return array
     */
    protected function setImplicitDefaults(array $shipper)
    {
        if (!isset($shipper['name'])) {
            $shipper['name'] = '';
        }

        if (!isset($shipper['shipperNumber'])) {
            $shipper['shipperNumber'] = '';
        }

        return $shipper;
    }
}
