<?php

namespace KKiernan\Factories;

use KKiernan\Ups\ShipTo;

class ShipToFactory
{
    /**
     * Creates a new ship to instance.
     *
     * @param array $shipTo
     *
     * @return \KKiernan\Ups\ShipTo
     */
    public static function create(array $shipTo)
    {
        $shipTo = static::setImplicitDefaults($shipTo);

        $address = AddressFactory::create($shipTo);

        return new ShipTo($shipTo['name'], $address);
    }

    /**
     * Sets default UPS values for attributes not explicitly set by the user.
     *
     * @param array $shipTo
     *
     * @return array
     */
    protected function setImplicitDefaults(array $shipTo)
    {
        if (!isset($shipTo['name'])) {
            $shipTo['name'] = '';
        }

        return $shipTo;
    }
}
