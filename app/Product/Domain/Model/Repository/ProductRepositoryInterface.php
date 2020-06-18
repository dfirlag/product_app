<?php

declare(strict_types=1);

namespace App\Product\Domain\Model\Repository;

use App\Product\Domain\Product;

interface ProductRepositoryInterface
{
    public function createProduct(Product $product);
}
