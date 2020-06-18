<?php

declare(strict_types=1);

namespace App\Shared\UserInterface\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    public function getErrorJsonResponse(string $message): JsonResponse
    {
        return response()->json([
            'created' => false,
            'message' => $message
        ], 403);
    }
}
