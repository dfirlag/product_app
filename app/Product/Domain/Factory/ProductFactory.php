<?php

declare(strict_types=1);

namespace App\Product\Domain\Factory;

use App\Product\Domain\Product;
use App\Product\Domain\ValueObject\ProductName;
use Money\Money;

class ProductFactory
{
    public static function createProduct(ProductName $productName, Money $price): Product
    {
        return new Product(
            $productName,
            $price
        );
    }
}
