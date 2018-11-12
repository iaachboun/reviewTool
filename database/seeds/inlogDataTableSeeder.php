<?php

use Illuminate\Database\Seeder;

class inlogDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//     maakt 33 fake data direct naar de database
        $faker = Faker\Factory::create();
        $limit = 1;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('inlogData')->insert([ //,
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'job' => $faker->jobTitle,
                'password' => $faker->password,
                'username' => $faker->userName,
                'email' => $faker->unique()->email,
                'company' => $faker->company

            ]);
        }
    }
}