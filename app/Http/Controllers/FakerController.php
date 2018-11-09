<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;

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
     * Get fake phone number
     */
    public function email()
    {
        $faker = Faker::create();
        return $faker->email;
    }

    /**
     * Get fake phone number
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
