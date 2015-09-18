<?php

namespace KKiernan\Ups;

class Address
{
    use \KKiernan\Serializable;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $stateProvinceCode;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var boolean
     */
    protected $residentialAddressIndicator;

    /**
     * Creates a new address instance.
     * 
     * @param string  $city
     * @param string  $stateProvinceCode
     * @param string  $postalCode
     * @param string  $countryCode
     * @param boolean $residentialAddressIndicator
     */
    public function __construct($city, $stateProvinceCode, $postalCode, $countryCode = 'US', $residentialAddressIndicator = false)
    {
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->stateProvinceCode = $stateProvinceCode;
        $this->countryCode = $countryCode;
        $this->residentialAddressIndicator = $residentialAddressIndicator;
    }

    /**
     * Gets the value of city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Gets the value of postalCode.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Gets the value of stateProvinceCode.
     *
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->stateProvinceCode;
    }

    /**
     * Gets the value of countryCode.
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Gets the value of residentialAddressIndicator.
     *
     * @return boolean
     */
    public function getResidentialAddressIndicator()
    {
        return $this->residentialAddressIndicator;
    }
}
