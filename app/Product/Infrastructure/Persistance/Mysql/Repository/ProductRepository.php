<?php

declare(strict_types=1);

namespace App\Product\Infrastructure\Persistance\Mysql\Repository;

use App\Product\Domain\Model\Repository\ProductRepositoryInterface;
use App\Product\Domain\Product;
use App\Product\Infrastructure\Persistance\Mysql\Product as ProductModel;

class ProductRepository implements ProductRepositoryInterface
{
    public function createProduct(Product $product): void
    {
        $productModel = new ProductModel();
        $productModel->setName($product->getProductName()->getName());
        $productModel->setPrice($product->getPrice()->getAmount());
        $productModel->setCurrency($product->getPrice()->getCurrency()->getCode());
        $productModel->save();
    }
}
