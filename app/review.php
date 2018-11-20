<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review';

    public function store(Request $request)
    {
        $review = new review;
        $review->name = $request->name;
        $review->save();
    }


}
