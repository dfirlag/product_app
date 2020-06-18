<?php

declare(strict_types=1);

namespace App\Product\Domain;

use App\Product\Domain\ValueObject\ProductName;
use Money\Money;

class Product
{
    /**
     * @var ProductName
     */
    private $productName;

    /**
     * @var Money
     */
    private $price;


    public function __construct(ProductName $productName, Money $price)
    {
        $this->productName = $productName;
        $this->price = $price;
    }

    public function getProductName(): ProductName
    {
        return $this->productName;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}
