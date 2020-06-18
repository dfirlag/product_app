<?php

declare(strict_types=1);

namespace App\Product\Application\Command;

class CreateProductCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $currency;


    public function __construct(string $name, string $price, string $currency)
    {
        $this->name = $name;
        $this->price = $price;
        $this->currency = $currency;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
