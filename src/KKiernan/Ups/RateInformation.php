<?php

namespace KKiernan\Ups;

class RateInformation
{
    use \KKiernan\Serializable;

    /**
     * @var boolean
     */
    protected $negotiatedRatesIndicator;

    /**
     * @var boolean
     */
    protected $cantBeEmpty = true;

    /**
     * Creates a new rate information instance.
     * 
     * @param boolean $negotiatedRatesIndicator
     */
    public function __construct($negotiatedRatesIndicator = false)
    {
        $this->negotiatedRatesIndicator = $negotiatedRatesIndicator;
    }

    /**
     * Gets the value of negotiatedRatesIndicator.
     *
     * @return boolean
     */
    public function getNegotiatedRatesIndicator()
    {
        return $this->negotiatedRatesIndicator;
    }
}
