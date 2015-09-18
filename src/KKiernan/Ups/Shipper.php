<?php

namespace KKiernan\Ups;

class Shipper
{
    use \KKiernan\Serializable;
    
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $shipperNumber;

    /**
     * @var Address
     */
    protected $address;

    /**
     * Creates a new shipper instance.
     * 
     * @param string  $name
     * @param string  $shipperNumber
     * @param Address $address
     */
    public function __construct($name, $shipperNumber, Address $address)
    {
        $this->name = $name;
        $this->shipperNumber = $shipperNumber;
        $this->address = $address;
    }

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the value of shipperNumber.
     *
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * Gets the value of address.
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
