<?php

namespace payAndDrive\src\BuyCarModule\Models\Clients;

class ClientFactory
{
    /**
     * @param string $id
     * @param string $name
     * @param string $email
     * @param float $budget
     * @param int $odometerValue
     * @param bool $defective
     * @param bool $economical
     * @return Client
     */
    public static function create($id, $name, $email, $budget, $odometerValue, $defective, $economical)
    {
        $client = new Client($id, $name, $email, $budget);
        $requirements = new ClientRequirements($id, $odometerValue, $defective, $economical);

        $client->setCarRequirements($requirements);

        return $client;
    }
}