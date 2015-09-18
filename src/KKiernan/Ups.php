<?php

namespace KKiernan;

use KKiernan\Factories\RatingServiceSelectionRequestFactory;
use KKiernan\Ups\AccessRequest;

class Ups
{
    /**
     * @var \KKiernan\Ups\AccessRequest
     */
    protected $accessRequest;

    /**
     * @var string
     */
    protected $lastRequest;

    /**
     * Creates a new UPS instance.
     *
     * @param string $userId
     * @param string $password
     * @param string $accessLicenseNumber
     */
    public function __construct($userId, $password, $accessLicenseNumber)
    {
        $this->accessRequest = new AccessRequest($userId, $password, $accessLicenseNumber);
    }

    /**
     * Fetches rates from the UPS api.
     * 
     * @param array $options
     * 
     * @return SimpleXMLElement
     */
    public function rates(array $options)
    {
        $request = $this->accessRequest->asXml() . RatingServiceSelectionRequestFactory::create($options)->asXml();

        $this->lastRequest = $request;

        return $this->send($request);
    }

    /**
     * Send an xml request to the UPS api via curl.
     * 
     * @param string $request
     * 
     * @return SimpleXMLElement
     */
    public function send($request)
    {
        $ch = curl_init('https://onlinetools.ups.com/ups.app/xml/Rate');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        $result = curl_exec($ch);
        curl_close($ch);
        return new \SimpleXMLElement(strstr($result, '<?'));
    }

    /**
     * Gets the value of accessRequest.
     *
     * @return \KKiernan\Ups\AccessRequest
     */
    public function getAccessRequest()
    {
        return $this->accessRequest;
    }

    /**
     * Gets the value of lastRequest.
     *
     * @return string
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }
}
