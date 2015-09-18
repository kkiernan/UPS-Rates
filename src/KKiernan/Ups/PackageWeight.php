<?php

namespace KKiernan\Ups;

class PackageWeight
{
    use \KKiernan\Serializable;

    /**
     * @var int
     */
    protected $weight;

    /**
     * @var UnitOfMeasure
     */
    protected $unitOfMeasure;

    /**
     * Creates a new package weight instance.
     * 
     * @param string        $int
     * @param UnitOfMeasure $unitOfMeasure
     */
    public function __construct($weight, UnitOfMeasure $unitOfMeasure)
    {
        $this->weight = $weight;
        $this->unitOfMeasure = $unitOfMeasure;
    }

    /**
     * Gets the value of weight.
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Gets the value of unitOfMeasure.
     *
     * @return UnitOfMeasure
     */
    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }
}
