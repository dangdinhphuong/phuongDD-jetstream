<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Buihuycuong\Vnfaker\VNFaker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'name' => vnfaker()->fullname(),
                'email' => vnfaker()->email(['gmail.com']),
                'address' => vnfaker()->city($array = false),
                'password' => Hash::make("phuong0398"),
                'phone' => vnfaker()->fixedLineNumber($numbers = 12),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
