<?php

namespace App\Http\Controllers;

use App\Factories\StoreFeedbackServicesFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index() {
        return view('feedback.index');
    }

    public function ajaxStore(Request $request,StoreFeedbackServicesFactory $storeServiceFactory) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'telNumber' => 'required|string|max:255',
            'message' => 'required'
        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $service = $storeServiceFactory->getDBService();
        $service->store($request->all());
        return response()->json(['success' => true]);
    }
}
