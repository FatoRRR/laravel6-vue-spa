<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $with = [
        'address'
    ];

    function address()
    {
        return $this->belongsTo(Address::class);
    }
}
