<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Auth;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedback = Feedback::get();   
        return response()->json(['status' => 200 , 'data' => FeedbackResource::collection($feedback) , 'message' => 'record retrived!']);
    }
    
    public function store(StoreFeedbackRequest $request)
    {
        $user = Auth::user();
        $user->feedback()->create($request->validated());
        return response()->json(['status' => 200 , 'message' => 'record saved!']);
        
    }

    
    public function show($id)
    {
        $feedback = Feedback::whereId($id)->first();
        return response()->json(['status' => 200 , 'data' => FeedbackResource::make($feedback) , 'message' => 'record retrived!']);
    }
    
    public function update(StoreFeedbackRequest $request ,$id)
    {
        $feedback = Feedback::whereId($id)->first();
        $feedback->update($request->validated());
        return response()->json(['status' => 200 , 'data' => FeedbackResource::make($feedback) , 'message' => 'record updated!']);
    }
    
    public function destroy($id)
    {
        $feedback = Feedback::whereId($id)->delete();
        return response()->json(['status' => 200 , 'message' => 'record deleted!']);
        
    }
}
