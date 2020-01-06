<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pistols
        Item::create([
            'name' => "USP-S",
            'type' => "pistol",
            'price' => 200,
            'kill_award' => 300,
            'restricted_to' => "ct",
            'image_filename' => "usp_s.png"
        ]);
        Item::create([
            'name' => 'Glock-18',
            'type' => 'pistol',
            'price' => 200,
            'kill_award' => 300,
            'restricted_to' => 't',
            'image_filename' => 'glock_18.png'
        ]);
        Item::create([
            'name' => 'Dual Berettas',
            'type' => 'pistol',
            'price' => 400,
            'kill_award' => 300,
            'restricted_to' => 'none',
            'image_filename' => 'dual_berettas.png'
        ]);
        Item::create([
            'name' => 'Zeus x27',
            'type' => 'pistol',
            'price' => 200,
            'kill_award' => 0,
            'restricted_to' => 'none',
            'image_filename' => 'zeus_x27.png'
        ]);
        // Heavys
        Item::create([
            'name' => 'Negev',
            'type' => 'heavy',
            'price' => 1700,
            'kill_award' => 300,
            'restricted_to' => 'none',
            'image_filename' => 'negev.png'
        ]);
        Item::create([
            'name' => 'M249',
            'type' => 'heavy',
            'price' => 5200,
            'kill_award' => 300,
            'restricted_to' => 'none',
            'image_filename' => 'm249.png'
        ]);
        // SMGS
        Item::create([
            'name' => 'P90',
            'type' => 'smg',
            'price' => 2300,
            'kill_award' => 300,
            'restricted_to' => 'none',
            'image_filename' => 'p90.png'
        ]);
        // Rifles
        Item::create([
            'name' => 'AWP',
            'type' => 'rifle',
            'price' => 4750,
            'kill_award' => 100,
            'restricted_to' => 'none',
            'image_filename' => 'awp.png'
        ]);
        Item::create([
            'name' => 'AK-47',
            'type' => 'rifle',
            'price' => 2700,
            'kill_award' => 300,
            'restricted_to' => 't',
            'image_filename' => 'ak_47.png'
        ]);
        // Grenades
        Item::create([
            'name' => 'Smoke',
            'type' => 'grenade',
            'price' => 300,
            'kill_award' => 0,
            'restricted_to' => 'none',
            'image_filename' => 'smoke.png'
        ]);
        Item::create([
            'name' => 'Flashbang',
            'type' => 'grenade',
            'price' => 200,
            'kill_award' => 0,
            'restricted_to' => 'none',
            'image_filename' => 'flashbang.png'
        ]);
        // Equipment
        Item::create([
            'name' => 'Kevlar Helmet',
            'type' => 'equipment',
            'price' => 1000,
            'kill_award' => 0,
            'restricted_to' => 'none',
            'image_filename' => 'kevlar_helmet.png'
        ]);
    }
}
