<?php

namespace solid\LSP;

use solid\LSP\ShipmentDistributors\ShipmentProcessor;

$cargoWeight = 2000;

$shipmentProcessor = new ShipmentProcessor($cargoWeight);
$shipmentProcessor->initShipping();