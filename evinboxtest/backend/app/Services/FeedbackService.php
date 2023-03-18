<?php

namespace App\Services;

use App\Enum\MemoryEnum;
use App\Exceptions\SaveDataException;
use App\Exceptions\ValidationException;
use App\Factories\Feedback\FeedbackFactory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FeedbackService
{
    /**
     * @param Request $request
     * @param string $saveTo
     * @return bool
     * @throws SaveDataException|ValidationException|Exception
     */
    public function save(Request $request, string $saveTo = MemoryEnum::DATABASE): bool
    {
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'phone' => 'required|max:12',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            throw new ValidationException('Ошибка валидации данных');
        }

        // create a factory
        $feedbackFactory = new FeedbackFactory();
        if (!$feedbackFactory->getFeedback($saveTo)->save($data)) {
            throw new SaveDataException('Произошла ошибка при сохранении обратной связи');
        }

        return true;
    }
}
