<?php
declare(strict_types=1);

namespace App\Product\Domain\ValueObject;

class ProductName
{
    /**
     * @var string
     */
    private $name;


    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
