<?php

namespace App\Factories\Feedback;

use Illuminate\Support\Facades\Storage;

class FeedbackFile implements IFeedback
{
    /**
     * Save data to file
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        return Storage::append('feedback.txt', json_encode($data));
    }
}
