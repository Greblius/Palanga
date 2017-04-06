<?php

namespace solid\LSP\TransportTypes;

class Ship extends Vehicle
{
    /** @var bool */
    private $anchorLifted = false;

    private function liftAnchor()
    {
        $this->anchorLifted = true;
    }

    public function deliverFreight()
    {
        $this->liftAnchor();
        parent::deliverFreight();
    }
}