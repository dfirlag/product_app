<?php

declare(strict_types=1);

namespace App\Product\Application\CommandHandler;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\Validation\Exception\InvalidProductCurrencyException;
use App\Product\Application\Validation\Exception\InvalidProductNameException;
use App\Product\Application\Validation\Exception\InvalidProductPriceException;
use App\Product\Application\Validation\Methods\CreateProductValidationInterface;
use App\Product\Application\Validation\ProductValidation;
use App\Product\Domain\Factory\ProductFactory;
use App\Product\Domain\ValueObject\ProductName;
use App\Product\Infrastructure\Persistance\Mysql\Repository\ProductRepository;
use Money\Currency;
use Money\Money;

class CreateProductCommandHandler
{
    /**
     * @var CreateProductValidationInterface
     */
    private $validation;

    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(ProductValidation $validation, ProductRepository $productRepository)
    {
        $this->validation        = $validation;
        $this->productRepository = $productRepository;
    }

    /**
     * @param  CreateProductCommand $command
     * @throws InvalidProductCurrencyException
     * @throws InvalidProductNameException
     * @throws InvalidProductPriceException
     */
    public function handle(CreateProductCommand $command)
    {
        $this->validation->validCreateProductCommand($command);

        $this->productRepository->createProduct(
            ProductFactory::createProduct(
                new ProductName($command->getName()),
                new Money($command->getPrice(), new Currency($command->getCurrency()))
            )
        );
    }
}
