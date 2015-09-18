<?php

namespace KKiernan\Ups;

class RatingServiceSelectionRequest
{
    use \KKiernan\Serializable;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var PickupType
     */
    protected $pickupType;

    /**
     * @var Shipment
     */
    protected $shipment;

    /**
     * Creates a new rating service selection request.
     * 
     * @param Request    $request
     * @param PickupType $pickupType
     * @param Shipment   $shipment
     */
    public function __construct(Request $request, PickupType $pickupType, Shipment $shipment)
    {
        $this->request = $request;
        $this->pickupType = $pickupType;
        $this->shipment = $shipment;
    }
}
