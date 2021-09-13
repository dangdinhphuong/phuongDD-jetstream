<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();
        $this->call(CategoriesSeed::class);
        $this->call(ItemSeed::class);
        $this->call(UserSeed::class);
        Model::reguard();
    }
}
