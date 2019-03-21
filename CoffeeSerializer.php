<?php

namespace App;

require_once 'Coffee.php';

/**
 * Class CoffeeSerializer
 */
class CoffeeSerializer
{
    /**
     * @param Coffee $coffee
     * @param int $method
     * @return string
     */
    public function serializeCoffee(Coffee $coffee, int $method = 2): string
    {
        return json_encode($coffee->toArray($method));
    }

    /**
     * @param array $fields
     * @return Coffee
     */
    public function deserializeCoffee(array $fields): Coffee
    {
        return new Coffee($fields[1], $fields[2], $fields[3], $fields[4], $fields[5], $fields[0]);
    }

    /**
     * @param string $coffeeJson
     * @return array
     */
    public function deserializeCoffees(string $coffeeJson): array
    {
        $coffeeArray = json_decode($coffeeJson);
        $coffees     = [];

        /** @var Coffee $coffee */
        foreach ($coffeeArray->data as $coffeeData) {
            $coffees[] = new Coffee($coffeeData->name, $coffeeData->size, $coffeeData->syrup, $coffeeData->sugar, $coffeeData->milk, $coffeeData->id);
        }

        return $coffees;
    }
}