<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function address()
    {
        return $this->morphTo();
    }
    public function type(string $type)
    {
        $types = config('address.types');
        // You can add only types specified in configuration file
        if (!in_array($type, $types)) {
            return false;
        }
        return $this->update(compact($type));
    }
}
