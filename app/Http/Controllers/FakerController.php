<?php

namespace App\Http\Controllers;

use App\Http\Resources\inloggenRecourse;
use App\inlogData;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


/**
 * Class FakerController
 * @package App\Http\Controllers
 */
class FakerController extends Controller
{
    /**
     * Get fake name
     */
    public function combine($options)
    {
        $options = explode(",", $options);
        $result = [];
        foreach ($options as $option) {
            if (method_exists($this, $option)) {
                $result[$option] = $this->{$option}();
            }
        }
        return json_encode($result);
    }

    /**
     * saves fake data into database
     */
    public function store(Request $request)
    {
        $data = $request->getContent();
        $dataex = json_decode($data, true);
        //model
        $inlogData = new inlogData();
        $inlogData->name = $dataex["name"];
        $inlogData->password = $dataex["password"];
        $inlogData->save();
        return $dataex["name"];
    }

    public function test()
    {
        return "test01";

    }

    /**
     * gives fake data to ..
     */
    public function post(Request $request)
    {
        $inlogData = inlogData::all();
        return inloggenRecourse::collection($inlogData);


    }

    /**
     * Get fake name
     */
    public
    function name()
    {
        $faker = Faker::create('nl_NL');
        return $faker->name;
    }

    /**
     * Get fake username
     */

    public
    function username()
    {
        $faker = Faker::create('nl_NL');
        return $faker->userName;
    }

    /**
     * Get fake username
     */

    public
    function password()
    {
        $faker = Faker::create('nl_NL');
        return $faker->password;
    }

    /**
     * Get fake phone number
     */
    public
    function phone()
    {
        $faker = Faker::create('nl_NL');
        return $faker->phoneNumber;
    }

    /**
     * Get fake email
     */
    public
    function email()
    {

        $faker = Faker::create('nl_NL');
        return $faker->email;
    }

    /**
     * Get fake job
     */
    public
    function jobdesc()
    {
        $faker = Faker::create('nl_NL');
        return $faker->jobTitle;
    }

    /**
     * Get fake company name
     */
    public
    function company()
    {
        $faker = Faker::create('nl_NL');
        return $faker->company;

    }

}
