<?php

use Illuminate\Database\Seeder;
use App\Set;
use App\Item;

class ItemsSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemSetIds = Set::all()->pluck('id')->toArray();

        $rifleIds = Item::all()->where('type', 'rifle')->pluck('id')->toArray();
        array_push($rifleIds, null);        
        
        $pistolIds = Item::all()->where('type', 'pistol')->pluck('id')->toArray();

        $grenadeIds = Item::all()->where('type', 'grenade')->pluck('id')->toArray();
        array_push($grenadeIds, null);

        $kevlarIds = Item::all()->whereIn('name', ['Kevlar', 'Kevlar Helmet'])->pluck('id')->toArray();
        array_push($kevlarIds, null);

        $defuseKitIds = Item::all()->where('name', 'Defuse Kit')->pluck('id')->toArray();
        array_push($defuseKitIds, null);

        foreach ($itemSetIds as $id) {
       
            $itemSet = Set::find($id);

            $rifle = Item::find(Arr::random($rifleIds));
            if($rifle) $itemSet->items()->save($rifle);

            $pistol = Item::find(Arr::random($pistolIds));
            $itemSet->items()->save($pistol);

            $grenade = Item::find(Arr::random($grenadeIds));
            if($grenade) $itemSet->items()->save($grenade);

            $kevlar = Item::find(Arr::random($kevlarIds));
            if($kevlar) $itemSet->items()->save($kevlar);

            $defuseKit = Item::find(Arr::random($defuseKitIds));
            if($defuseKit) $itemSet->items()->save($defuseKit);            

        }
    }
}
