<?php


namespace App\Factories;


use App\Services\StoreFeedbackToDBService;

class StoreFeedbackServicesFactory
{
    public function getDBService() {
        return new StoreFeedbackToDBService();
    }
}