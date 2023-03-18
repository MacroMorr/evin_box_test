<?php

namespace App\Factories\Feedback;

interface IFeedback
{
    public function save(array $data): bool;
}
