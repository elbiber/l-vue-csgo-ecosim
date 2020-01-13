<?php

use Illuminate\Database\Seeder;

class ItemSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Set::class, 100)->create();

    }
}
