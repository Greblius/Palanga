<?php

namespace payAndDrive\models\Clients;

class Client
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $email;

    /** @var  float */
    private $budget;

    /** @var  int */
    private $maxOdometerValue;

    /** @var  bool */
    private $defective;

    /** @var  bool */
    private $economical;

    /** @var  bool */
    private $hasCar;

    /**
     * @return boolean
     */
    public function isHasCar()
    {
        return $this->hasCar;
    }

    /**
     * @param boolean $hasCar
     */
    public function setHasCar($hasCar)
    {
        $this->hasCar = $hasCar;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param float $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return int
     */
    public function getMaxOdometerValue()
    {
        return $this->maxOdometerValue;
    }

    /**
     * @param int $maxOdometerValue
     */
    public function setMaxOdometerValue($maxOdometerValue)
    {
        $this->maxOdometerValue = $maxOdometerValue;
    }

    /**
     * @return boolean
     */
    public function isDefective()
    {
        return $this->defective;
    }

    /**
     * @param boolean $defective
     */
    public function setDefective($defective)
    {
        $this->defective = $defective;
    }

    /**
     * @return mixed
     */
    public function isEconomical()
    {
        return $this->economical;
    }

    /**
     * @param mixed $economical
     */
    public function setEconomical($economical)
    {
        $this->economical = $economical;
    }

    /**
     * Client constructor.
     * @param $name
     * @param $email
     * @param $budget
     * @param $odometer
     * @param $defective
     * @param $economical
     */
    public function __construct($name, $email, $budget, $odometer, $defective, $economical)
    {
        $this->name = $name;
        $this->email = $email;
        $this->budget = $budget;
        $this->maxOdometerValue = $odometer;
        $this->defective = $defective;
        $this->economical = $economical;
    }
}
