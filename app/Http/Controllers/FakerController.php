<?php

namespace App\Http\Controllers;

use App\inlogData;
use Faker\Factory as Faker;
use http\Env\Request;

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


    public function store(Request $request){
        $faker = Faker::create();

        $inlogGegevens = inlogData::firstOrCreate(['name' => $faker->name]);
        $inlogGegevens->email = $faker->email;
        $inlogGegevens->phone = $faker->phoneNumber;
        $inlogGegevens->job = $faker->jobTitle;
        $inlogGegevens->company = $faker->company;

        $inlogGegevens->save();
    }

    /**
     * Get fake name
     */
    public function name()
    {
        $faker = Faker::create();
        return $faker->name;
    }

    /**
     * Get fake phone number
     */
    public function phone()
    {
        $faker = Faker::create();
        return $faker->phoneNumber;
    }

    /**
     * Get fake email
     */
    public function email()
    {

        $faker = Faker::create();
        return $faker->email;
    }

    /**
     * Get fake job
     */
    public function jobdesc()
    {
        $faker = Faker::create();
        return $faker->jobTitle;
    }

    /**
     * Get fake company name
     */
    public function company()
    {
        $faker = Faker::create();
        return $faker->company;

    }

}
