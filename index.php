<?php
namespace App;

require_once 'CoffeeTransport.php';
require_once 'CoffeeSerializer.php';

// Initialized via php -S localhost:8000

$coffeeTransport = new CoffeeTransport();
$coffeeSerializer = new CoffeeSerializer();

$coffees = $coffeeSerializer->deserializeCoffees($coffeeTransport->getCoffees());

/** @var Coffee $coffee */
foreach ($coffees as $coffee) {
    echo $coffee->getName();
}
