<?php
namespace App;

require_once 'CoffeeSerializer.php';
require_once 'CoffeeTransport.php';

if (!isset($argv[1])) {
    exit(1);
}

if (!$handle = fopen($argv[1], 'r')) {
    exit(2);
}

$serializer = new CoffeeSerializer();
$transport  = new CoffeeTransport();

while (false !== $line = fgetcsv($handle, 0, "\t")) {
    try {
        $coffee = $serializer->deserializeCoffee($line);
    } catch (\Throwable $t) {
        echo "Bad data found from TSV";
        echo $t->getMessage();
        continue;
    }

    $response = $transport->postCoffee($coffee);
}