<?php

namespace App;

require_once 'Coffee.php';

/**
 * Class CoffeeTransport
 */
class CoffeeTransport
{
    private const TARGET_URL = 'http://developer-test.engagednation.com/api/coffee/type';

    /**
     * @var resource
     */
    private $ch;

    /**
     * @var CoffeeSerializer
     */
    private $coffeeSerializer;

    /**
     * CoffeeTransport constructor.
     */
    public function __construct()
    {
        $this->coffeeSerializer = new CoffeeSerializer();
    }

    /**
     * @param Coffee $coffee
     * @return bool|string
     */
    public function postCoffee(Coffee $coffee)
    {
        $serializedCoffee = $this->coffeeSerializer->serializeCoffee($coffee, Coffee::POST_METHOD);

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, self::TARGET_URL);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $serializedCoffee);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec($this->ch);

        curl_close($this->ch);

        return $response;
    }

    /**
     * @param Coffee $coffee
     * @return bool|string
     */
    public function putCoffee(Coffee $coffee)
    {
        $serializedCoffee = $this->coffeeSerializer->serializeCoffee($coffee, Coffee::PUT_METHOD);

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, self::TARGET_URL);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: ' . strlen($serializedCoffee)]);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $serializedCoffee);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec($this->ch);

        curl_close($this->ch);

        return $response;
    }

    /**
     * @param Coffee $coffee
     * @return bool|string
     */
    public function deleteCoffee(Coffee $coffee)
    {
        $serializedCoffee = $this->coffeeSerializer->serializeCoffee($coffee, Coffee::DELETE_METHOD);

        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, self::TARGET_URL);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $serializedCoffee);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec($this->ch);

        curl_close($this->ch);

        return $response;
    }
}