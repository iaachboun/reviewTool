<?php

namespace App\Http\Controllers;
use App\inlogData;
use Illuminate\Http\Request;
use App\Http\Resources\inloggenRecourse;
use App\review;

class puppeteerData extends Controller
{
    /**
     * gives fake data to ..
     */
    public function inlogData(Request $request)
    {
        $inlogData = inlogData::all();
        return inloggenRecourse::collection($inlogData);
    }

    /**
     * gives fake data to ..
     */
    public function reviewData(Request $request)
    {
        $reviewData = review::all();
        return inloggenRecourse::collection($reviewData);
    }
}
