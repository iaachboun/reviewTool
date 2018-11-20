<?php

namespace App\Http\Controllers;
use App\inlogData;
use Illuminate\Http\Request;
use App\Http\Resources\inloggenRecourse;
use App\review;

class puppeteerData extends Controller{
    /**
     * gives fake data to ..
     */
    public function inlogData(Request $request)
    {
        $review = inlogData::all();
        return inloggenRecourse::collection($review);
    }

    /**
     * gives fake data to ..
     */
    public function reviewData(Request $request)
    {
        $reviewData = review::all();
        return inloggenRecourse::collection($reviewData);
    }

    public function postReview(Request $request){
        $data = $request->getContent();
        $dataex = json_decode($data, true);

        $review = new review();
        $review->review = $dataex["review"];
        $review->status = 0;
        $review->source = $dataex["source"];
        $review->save();
        
        return $dataex;
    }
}
