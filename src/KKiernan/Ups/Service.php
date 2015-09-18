<?php

namespace KKiernan\Ups;

class Service
{
    use \KKiernan\Serializable;
    
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * Creates a new service instance.
     * 
     * @param string $code
     * @param string $description
     */
    public function __construct($code = '01', $description = '')
    {
        $this->code = $code;
        $this->description = $description;
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

    /**
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
