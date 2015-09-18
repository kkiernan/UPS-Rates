<?php

namespace KKiernan\Ups;

class ShipTo
{
    use \KKiernan\Serializable;
    
    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var Address
     */
    protected $address;

    /**
     * Creates a new ship to instance.
     * 
     * @param string  $companyName
     * @param Address $address
     */
    public function __construct($companyName, Address $address)
    {
        $this->companyName = $companyName;
        $this->address = $address;
    }

    /**
     * Gets the value of companyName.
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
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
