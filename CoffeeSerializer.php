<?php

namespace App;
//curl -X POST "http://developer-test.engagednation.com/api/coffee/type
//http://developer-test.engagednation.com/api/coffee/types/J
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
}