<?php

namespace payAndDrive\src\BuyCarModule\Models\Clients;

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

    /** @var  ClientRequirements */
    private $carRequirements;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
     */
    public function __construct($name, $email, $budget)
    {
        $this->id = $this->generateClientId();
        $this->name = $name;
        $this->email = $email;
        $this->budget = $budget;
    }

    /**
     * @return int
     */
    private function generateClientId()
    {
        return rand(0, 99999999);
    }
}
