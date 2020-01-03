<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;


$suffix = [
    'Villa',
    'House',
    'Cottage',
    'Luxury Villas',
    'Cheap House',
    'Rooms',
    'Cheap Rooms',
    'Luxury Rooms',
    'Fancy Rooms'
];
$factory->define(Item::class, function (Faker $faker) use ($suffix) {
    return [
/*         'title' => $faker->city . ' ' . Arr::random($suffix),
        'description' => $faker->text() */
        'name' => 'AWP',
        'type' => 'rifle',
        'price' => 4750,
        'kill_award' => 100,
        'restricted_to' => 'none'
    ];
});
