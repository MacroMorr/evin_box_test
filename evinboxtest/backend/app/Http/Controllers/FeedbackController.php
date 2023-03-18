<?php

namespace App\Http\Controllers;

use App\Enum\MemoryEnum;
use App\Exceptions\SaveDataException;
use App\Exceptions\ValidationException;
use App\Services\FeedbackService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class FeedbackController extends BaseController
{
    public function feedback(Request $request, JsonResponse $response): JsonResponse
    {
        $feedbackService = new FeedbackService();

        try {
            $feedbackService->save($request, MemoryEnum::FILE);
        } catch (ValidationException|SaveDataException $e) {
            return $response->setStatusCode(Response::HTTP_BAD_REQUEST)->setData(['message' => $e->getMessage()]);
        }

        return $response->setData(['message' => 'OK']);
    }
}
