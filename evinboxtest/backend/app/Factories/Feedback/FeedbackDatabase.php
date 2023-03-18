<?php

namespace App\Factories\Feedback;

use App\Models\Feedback;

class FeedbackDatabase implements IFeedback
{
    /**
     * Save data to database
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        $feedback = new Feedback($data);
        return $feedback->save();
    }
}
