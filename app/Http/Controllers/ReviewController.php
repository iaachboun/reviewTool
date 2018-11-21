<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use illuminate\Database\Connection;


use App\review;
use Response;


/**
 * Class FakerController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function review(Request $request)
    {
        $data = $request->all();
        $source = 'Robohost';

        $sources = array("Robohost","iXLhosting","HostingNet","Domeinwinkel","Hosting2Go","Mijndomein","SoHosted","Antagonist","Hostnet","Versio");

        $source = $sources[0];

        for ($o = 0; $o < 10 ; $o++) {

            for ($i = 0; $i <= 18 ; $i++) {
                var_dump($data[$source][$i]);

                DB::table('review')->insert([
                    ['review' => $data[$source][$i]],
                    ['source' => $source]
                ]);
            }
            $source = $sources[$o];

        }

    }

    public function test()
    {
    }
}
