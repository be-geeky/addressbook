<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function addresses() {
        return $this->hasMany('App\Address');
    }
}
