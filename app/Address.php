<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $with = [
        'country'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
