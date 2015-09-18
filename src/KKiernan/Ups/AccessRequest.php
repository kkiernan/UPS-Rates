<?php

namespace KKiernan\Ups;

class AccessRequest
{
    use \KKiernan\Serializable;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $accessLicenseNumber;

    /**
     * Creates a new access request instance.
     * 
     * @param string $userId
     * @param string $password
     * @param string $accessLicenseNumber
     */
    public function __construct($userId, $password, $accessLicenseNumber)
    {
        $this->userId = $userId;
        $this->password = $password;
        $this->accessLicenseNumber = $accessLicenseNumber;
    }
}
