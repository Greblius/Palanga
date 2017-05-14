<?php

namespace payAndDrive\Models\Clients;

class Client
{
    /** @var  string */
    private $id;

    /** @var  string */
    private $name;

    /** @var  string */
    private $email;

    /** @var  float */
    private $budget;

    /** @var  bool */
    private $hasCar;

    /** @var  ClientRequirements */
    private $carRequirements;

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
     * @return ClientRequirements
     */
    public function getCarRequirements()
    {
        return $this->carRequirements;
    }

    /**
     * @param ClientRequirements $carRequirements
     */
    public function setCarRequirements(ClientRequirements $carRequirements)
    {
        $this->carRequirements = $carRequirements;
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
    public function __construct($id, $name, $email, $budget)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->budget = $budget;
    }


}
