<?php

namespace App\Factories\Feedback;

use App\Enum\MemoryEnum;
use Exception;

class FeedbackFactory
{
    public function getFeedback(string $saveTo): IFeedback
    {
        switch ($saveTo) {
            case MemoryEnum::DATABASE:
                return new FeedbackDatabase();

            case MemoryEnum::FILE:
                return new FeedbackFile();

            default:
                throw new Exception(sprintf('Method "%s" not found in MemoryEnum::* class!', $saveTo));
        }
    }
}
