<?php

namespace KKiernan\Factories;

use KKiernan\Ups\PickupType;
use KKiernan\Ups\RatingServiceSelectionRequest;

class RatingServiceSelectionRequestFactory
{
    /**
     * Creates a new rating service selection request instance.
     * 
     * @param array $options
     * 
     * @return RatingServiceSelectionRequest
     */
    public static function create(array $options)
    {
        $request = RequestFactory::create();

        $shipment = ShipmentFactory::create($options);

        $pickupType = new PickupType();

        return new RatingServiceSelectionRequest($request, $pickupType, $shipment);
    }
}
