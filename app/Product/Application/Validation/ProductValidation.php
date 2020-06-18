<?php

declare(strict_types=1);

namespace App\Product\Application\Validation;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\Validation\Exception\InvalidProductCurrencyException;
use App\Product\Application\Validation\Exception\InvalidProductNameException;
use App\Product\Application\Validation\Exception\InvalidProductPriceException;
use App\Product\Application\Validation\Methods\CreateProductValidationInterface;
use InvalidArgumentException;
use Money\Currency;
use Money\Money;

class ProductValidation implements CreateProductValidationInterface
{
    private const MAX_NAME_LENGTH = 255;

    /**
     * @param  CreateProductCommand  $command
     * @throws InvalidProductCurrencyException
     * @throws InvalidProductNameException
     * @throws InvalidProductPriceException
     */
    public function validCreateProductCommand(CreateProductCommand $command)
    {
        if (empty($command->getName())) {
            throw new InvalidProductNameException('Name cannot be empty');
        }

        if (strlen($command->getName()) > self::MAX_NAME_LENGTH) {
            throw new InvalidProductNameException('Maximum product length name is: ' . self::MAX_NAME_LENGTH);
        }

        try {
            $currency = new Currency($command->getCurrency());
        } catch (InvalidArgumentException $e) {
            throw new InvalidProductCurrencyException($e->getMessage());
        }

        try {
            new Money($command->getPrice(), $currency);
        } catch (InvalidArgumentException $e) {
            throw new InvalidProductPriceException($e->getMessage());
        }
    }
}
