<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Address::class, function (Faker $faker) {
    return [
        'title' => (string)$faker->randomElement(['Home','Work']),
        'address_line_1' => $faker->streetName,
        'address_line_2' => $faker->streetAddress,
        'address_line_3' => "Lane ". $faker->randomDigit,
        'pincode' => (string)$faker->postcode,
        'city' => (string)$faker->city,
        'state' => (string)$faker->state,
        'country' => (string)$faker->country,
        'type' => (string)$faker->randomElement(array_keys(config('address.types'))),
        'contact_id' => function() {
            return factory(App\Contact::class)->create()->id;
        },
    ];
});
