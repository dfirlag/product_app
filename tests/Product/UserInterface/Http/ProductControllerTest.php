<?php
declare(strict_types=1);

namespace Tests\Product\UserInterface\Http;

use Tests\TestCase;

class ProductControllerTest extends TestCase
{

    public function testCreateProductActionReturnStatus201Created(): void
    {
        $response = $this
//            ->withHeader('Content-type', 'application/json')
             ->json('PUT', 'api/product/createProduct', [
                 'name' => 'Tested product name',
                 'price' => 12300,
                 'currency' => 'EUR'
             ]);

        $response
            ->assertStatus(201);
    }
}
