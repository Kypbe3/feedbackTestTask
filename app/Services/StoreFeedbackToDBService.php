<?php


namespace App\Services;

use App\Interfaces\StoreFeedbackServiceInterface;
use App\Models\Feedback;

class StoreFeedbackToDBService implements StoreFeedbackServiceInterface
{
    public function store(array $array)
    {
        Feedback::create($array);
    }
}