<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'pincode',
        'city',
        'state',
        'country',
        'type',
        'contact_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function contact() {
        return $this->belongsTo('App\Contact');
    }
    function add($request){
        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        $address = Address::create([
            'contact_id' => $contact->id,
            'title' => $request->title,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'address_line_3' => (string)$request->address_line_3,
            'pincode' => (string)$request->pincode,
            'city' => (string)$request->city,
            'state' => (string)$request->state,
            'country' => (string)$request->country,
            'type' => (string)$request->type,
        ]);

        return $address;
    }

}
