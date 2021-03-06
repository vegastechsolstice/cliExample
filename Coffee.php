<?php

namespace App;

/**
 * Class Coffee
 */
class Coffee
{

    public const GET_METHOD    = 1;
    public const POST_METHOD   = 2;
    public const PUT_METHOD    = 3;
    public const DELETE_METHOD = 4;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $syrup;

    /**
     * @var bool
     */
    private $sugar;

    /**
     * @var bool
     */
    private $milk;

    public function __construct(string $name, int $size, string $syrup, bool $hasSugar, bool $hasMilk, int $id = null)
    {
        $this->name  = $name;
        $this->size  = $size;
        $this->syrup = $syrup;
        $this->sugar = $hasSugar;
        $this->milk  = $hasMilk;
        $this->id    = $id;
    }

    public function toArray(int $requestType): array
    {
        switch($requestType) {
            case self::POST_METHOD:
                return $this->serializeForPost();
                break;

            case self::PUT_METHOD:
                return $this->serializeForPut();
                break;

            case self::DELETE_METHOD:
                return $this->serializeForDelete();
                break;

            default:
                return [];
        }
    }

    //Todo: Create PostCoffee, PutCoffee, DeleteCoffee types as implementing JsonSerializable
    private function serializeForPost(): array
    {
        return [
            "applicant_name" => 'Alex Solis',
            "name"           => $this->name,
            "size"           => $this->size,
            "syrup"          => $this->syrup,
            "sugar"          => $this->sugar,
            "milk"           => $this->milk,
        ];
    }

    private function serializeForPut(): array
    {
        return [
            "id"             => $this->id,
            "applicant_name" => 'Alex Solis',
            "name"           => $this->name,
            "size"           => $this->size,
            "syrup"          => $this->syrup,
            "sugar"          => $this->sugar,
            "milk"           => $this->milk,
        ];
    }

    private function serializeForDelete(): array
    {
        return [
            "id"             => $this->id,
            "applicant_name" => 'Alex Solis',
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getSyrup(): string
    {
        return $this->syrup;
    }

    /**
     * @return bool
     */
    public function hasSugar(): bool
    {
        return $this->sugar;
    }

    /**
     * @return bool
     */
    public function hasMilk(): bool
    {
        return $this->milk;
    }

    /**
     * @param bool $booleanValue
     * @return string
     */
    static public function toString(bool $booleanValue): string
    {
        if ($booleanValue === true) {
            return 'Yes';
        }

        return 'No';
    }
}