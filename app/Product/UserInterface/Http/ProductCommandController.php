<?php

namespace App\Product\UserInterface\Http;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\Validation\Exception\InvalidProductCurrencyException;
use App\Product\Application\Validation\Exception\InvalidProductNameException;
use App\Product\Application\Validation\Exception\InvalidProductPriceException;
use App\Shared\UserInterface\Http\AbstractController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class ProductCommandController extends AbstractController
{
    /**
     * @var CommandBusInterface
     */
    private $bus;


    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function createProduct(Request $request): JsonResponse
    {
        $command = new CreateProductCommand(
            $request->get('name', ''),
            $request->get('price', ''),
            $request->get('currency', '')
        );

        try {
            $this->bus->dispatch($command);
        } catch (InvalidProductNameException $e) {
            return $this->getErrorJsonResponse($e->getMessage());
        } catch (InvalidProductPriceException $e) {
            return $this->getErrorJsonResponse($e->getMessage());
        } catch (InvalidProductCurrencyException $e) {
            return $this->getErrorJsonResponse($e->getMessage());
        }

        return response()->json(['created' => true], 201);
    }
}
