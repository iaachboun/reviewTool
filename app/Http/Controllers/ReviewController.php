<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use illuminate\Database\Connection;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

use App\review;
use Response;


/**
 * Class FakerController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller{
    public function __construct(){
        $this->middleware('guest');
    }

    public function review(Request $request){
        $data = $request->all();

        $sources = array("Robohost", "iXLhosting", "HostingNet", "Domeinwinkel", "Hosting2Go", "Mijndomein", "SoHosted", "Antagonist", "Hostnet", "Versio");

        $source = $sources[0];

        for ($o = 0; $o < 9; $o++) {

            for ($i = 0; $i <= 17; $i++) {
                var_dump($data[$source][$i]);

                DB::table('review')->insert(
                    ['review' => $data[$source][$i]]
                );
                /*DB::table('review')->insert(
                    ['source' => $source]
                );*/
            }
            $source = $sources[$o];

        }
    }

    public function selectedreview(Request $request ){
        $client = new Client(['base_uri' => env('PUPPETEER_URL')]);
        $data = $request->all();
        //var_dump($data);
        $response = $client->post('echo/formInvullen', [
            'json' => ['data' => $data , 'user' => ['firstname' => 'naam']]
        ]);

        dd(json_decode($response->getBody()->getContents(), true));
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getReview(Request $request ){
        $client = new Client(['base_uri' => env('PUPPETEER_URL')]);

        $response = $client->post('echo/getReviews');
        return $response;
    }

}
