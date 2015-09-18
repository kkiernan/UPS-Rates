<?php

namespace KKiernan\Ups;

class UnitOfMeasure
{
    use \KKiernan\Serializable;

    /**
     * @var string
     */
    protected $code;

    /**
     * Creates a new unit of measure instance.
     * 
     * @param string $code
     */
    public function __construct($code = 'LBS')
    {
        $this->code = $code;
    }

    /**
     * Gets the value of code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
