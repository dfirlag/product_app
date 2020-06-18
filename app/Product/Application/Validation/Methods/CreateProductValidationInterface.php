<?php

declare(strict_types=1);

namespace App\Product\Application\Validation\Methods;

use App\Product\Application\Command\CreateProductCommand;

interface CreateProductValidationInterface
{
    public function validCreateProductCommand(CreateProductCommand $command);
}
