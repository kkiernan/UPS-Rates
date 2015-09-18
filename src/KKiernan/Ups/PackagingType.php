<?php

namespace KKiernan\Ups;

class PackagingType
{
    use \KKiernan\Serializable;

    /**
     * @var string
     */
    protected $code;

    /**
     * Creates a new packaging type instance.
     * 
     * @param string $code
     */
    public function __construct($code = '02')
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
