<?php

namespace App\Http\Controllers;

use App\Http\Resources\inloggenRecourse;
use App\inlogData;
use App\review;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


/**
 * Class FakerController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $data = $request->getContent();
        $dataex = json_decode($data, true);
/*        //model
        $review = new review();
        $review->name = $dataex["name"];
        $review->password = $dataex["password"];
        $review->save();*/
        return $dataex;
    }
}
