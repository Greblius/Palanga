<?php

namespace payAndDrive\src\BuyCarModule\Models\Clients;

class ClientRequirements
{
    /** @var  string */
    private $clientId;

    /** @var  int */
    private $maxOdometerValue;

    /** @var  bool */
    private $defective;

    /** @var  bool */
    private $economical;

    public function __construct($clientId, $odometerValue, $defective, $economical)
    {
        $this->clientId = $clientId;
        $this->maxOdometerValue = $odometerValue;
        $this->defective = $defective;
        $this->economical = $economical;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return int
     */
    public function getMaxOdometerValue()
    {
        return $this->maxOdometerValue;
    }

    /**
     * @return boolean
     */
    public function isDefective()
    {
        return $this->defective;
    }

    /**
     * @return mixed
     */
    public function isEconomical()
    {
        return $this->economical;
    }
}