<?php

use Illuminate\Database\Seeder;

class ContactAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Contact::class, 10)->create()->each(function ($contact) {
            factory(\App\Address::class, 5)->create(['contact_id'=>$contact->id]);
        });
    }
}
