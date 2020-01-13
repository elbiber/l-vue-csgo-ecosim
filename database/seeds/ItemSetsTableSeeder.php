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
        factory(App\ItemSet::class, 100)->create();

    }
}
