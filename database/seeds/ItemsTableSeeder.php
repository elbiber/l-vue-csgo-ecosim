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
                'name' => 'Desert Eagle',
                'type' => 'pistol',
                'price' => 700,
                'kill_award' => 300,
                'restricted_to' => 'none',
                'image_filename' => 'desert_eagle.png'
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
            
            Item::create([
                'name' => 'XM1014',
                'type' => 'heavy',
                'price' => 2000,
                'kill_award' => 900,
                'restricted_to' => 'none',
                'image_filename' => 'xm1014.png'
            ]);
            
            Item::create([
                'name' => 'Nova',
                'type' => 'heavy',
                'price' => 1050,
                'kill_award' => 900,
                'restricted_to' => 'none',
                'image_filename' => 'nova.png'
            ]);
            
            Item::create([
                'name' => 'MAG-7',
                'type' => 'heavy',
                'price' => 1300,
                'kill_award' => 900,
                'restricted_to' => 'ct',
                'image_filename' => 'mag_7.png'
            ]);
            
            Item::create([
                'name' => 'Sawed-Off',
                'type' => 'heavy',
                'price' => 1100,
                'kill_award' => 900,
                'restricted_to' => 't',
                'image_filename' => 'sawed_off.png'
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
            
            Item::create([
                'name' => 'M4A1-S',
                'type' => 'rifle',
                'price' => 3100,
                'kill_award' => 300,
                'restricted_to' => 'ct',
                'image_filename' => 'm4a1_s.png'
            ]);
            
            Item::create([
                'name' => 'FAMAS',
                'type' => 'rifle',
                'price' => 2250,
                'kill_award' => 300,
                'restricted_to' => 'ct',
                'image_filename' => 'famas.png'
            ]);
            
            Item::create([
                'name' => 'Galil AR',
                'type' => 'rifle',
                'price' => 2000,
                'kill_award' => 300,
                'restricted_to' => 't',
                'image_filename' => 'galil_ar.png'
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
            
            Item::create([
                'name' => 'High Explosive',
                'type' => 'grenade',
                'price' => 300,
                'kill_award' => 0,
                'restricted_to' => 'none',
                'image_filename' => 'high_explosive.png'
            ]);
            
            Item::create([
                'name' => 'Decoy',
                'type' => 'grenade',
                'price' => 50,
                'kill_award' => 0,
                'restricted_to' => 'none',
                'image_filename' => 'decoy.png'
            ]);
            
            Item::create([
                'name' => 'Incendiary',
                'type' => 'grenade',
                'price' => 600,
                'kill_award' => 0,
                'restricted_to' => 'ct',
                'image_filename' => 'incendiary.png'
            ]);
            
            Item::create([
                'name' => 'Molotov',
                'type' => 'grenade',
                'price' => 400,
                'kill_award' => 0,
                'restricted_to' => 't',
                'image_filename' => 'molotov.png'
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
            
            Item::create([
                'name' => 'C4 Explosive',
                'type' => 'equipment',
                'price' => 0,
                'kill_award' => 0,
                'restricted_to' => 't',
                'image_filename' => 'c4_explosive.png'
            ]);
            
            Item::create([
                'name' => 'Kevlar',
                'type' => 'equipment',
                'price' => 600,
                'kill_award' => 0,
                'restricted_to' => 'none',
                'image_filename' => 'kevlar.png'
            ]);
            
            Item::create([
                'name' => 'Defuse Kit',
                'type' => 'equipment',
                'price' => 400,
                'kill_award' => 0,
                'restricted_to' => 'ct',
                'image_filename' => 'defuse_kit.png'
            ]);
        }
}
