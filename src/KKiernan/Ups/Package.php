<?php

namespace KKiernan\Ups;

class Package
{
    use \KKiernan\Serializable;

    /**
     * @var PackagingType
     */
    protected $packagingType;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var PackageWeight
     */
    protected $packageWeight;

    /**
     * Creates a new package instance.
     * 
     * @param PackagingType $packagingType
     * @param PackageWeight $packageWeight
     * @param string        $description
     */
    public function __construct(PackagingType $packagingType, PackageWeight $packageWeight, $description = 'Rate')
    {
        $this->packagingType = $packagingType;
        $this->packageWeight = $packageWeight;
        $this->description = $description;
    }

    /**
     * Gets the value of packagingType.
     *
     * @return PackagingType
     */
    public function getPackagingType()
    {
        return $this->packagingType;
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
     * Gets the value of packageWeight.
     *
     * @return PackageWeight
     */
    public function getPackageWeight()
    {
        return $this->packageWeight;
    }
}
