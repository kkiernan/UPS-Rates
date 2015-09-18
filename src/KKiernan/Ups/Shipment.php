<?php

namespace KKiernan\Ups;

class Shipment
{
    use \KKiernan\Serializable;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Shipper
     */
    protected $shipper;

    /**
     * @var ShipTo
     */
    protected $shipTo;

    /**
     * @var Service
     */
    protected $service;

    /**
     * @var RateInformation
     */
    protected $rateInformation;

    /**
     * @var boolean
     */
    protected $shipmentServiceOptions = false;

    /**
     * @var array
     */
    protected $packages;

    /**
     * Creates a new shipment instance.
     * 
     * @param string          $description
     * @param string          $shipper
     * @param string          $shipTo
     * @param Service         $service
     * @param RateInformation $rateInformation
     * @param array           $packages
     */
    public function __construct(
        $description,
        Shipper $shipper,
        ShipTo $shipTo,
        Service $service,
        RateInformation $rateInformation,
        array $packages
    ) {
        $this->description = $description;
        $this->shipper = $shipper;
        $this->shipTo = $shipTo;
        $this->service = $service;
        $this->rateInformation = $rateInformation;
        $this->packages = $packages;
    }

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Gets the value of shipper.
     *
     * @return Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * Gets the value of shipTo.
     *
     * @return ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * Gets the value of service.
     *
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Gets the value of rateInformation.
     *
     * @return RateInformation
     */
    public function getRateInformation()
    {
        return $this->rateInformation;
    }

    /**
     * Gets the value of shipmentServiceOptions.
     *
     * @return boolean
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * Gets the value of packages.
     *
     * @return array
     */
    public function getPackages()
    {
        return $this->packages;
    }
}
