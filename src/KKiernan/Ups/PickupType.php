<?php

namespace KKiernan\Ups;

class PickupType
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
     * Creates a new pickup type instance.
     * 
     * @param string $code
     * @param string $description
     */
    public function __construct($code = '01', $description = '')
    {
        $this->code = $code;
        $this->description = $description;
    }
}
