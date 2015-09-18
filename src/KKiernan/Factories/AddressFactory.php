<?php

namespace KKiernan\Factories;

use KKiernan\Ups\Address;

class AddressFactory
{
    /**
     * Creates a new address instance.
     *
     * @param array $address
     *
     * @return \KKiernan\Ups\Address
     */
    public static function create(array $address)
    {
        static::guardAgainstMissingRequirements($address);

        $address = static::setImplicitDefaults($address);

        return new Address(
            $address['city'],
            $address['state'],
            $address['zip'],
            $address['country'],
            $address['residential']
        );
    }

    /**
     * Guards against required fields that are missing.
     *
     * @param array $address
     *
     * @throws \Exception
     *
     * @return void
     */
    protected function guardAgainstMissingRequirements(array $address)
    {
        if (!isset($address['city'])) {
            throw new \Exception('City is required');
        }

        if (!isset($address['state'])) {
            throw new \Exception('State is required');
        }

        if (!isset($address['zip'])) {
            throw new \Exception('Zip is required');
        }
    }

    /**
     * Sets default UPS values for attributes not explicitly set by the user.
     *
     * @param array $address
     *
     * @return array
     */
    protected function setImplicitDefaults(array $address)
    {
        if (!isset($address['country'])) {
            $address['country'] = 'US';
        }

        if (!isset($address['residential'])) {
            $address['residential'] = false;
        }

        return $address;
    }
}
