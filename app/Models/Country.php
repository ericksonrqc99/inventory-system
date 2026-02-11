<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'iso2',
        'phonecode',
        'capital',
        'currency',
        'currency_symbol',
        'native',
        'timezones',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, Region::class);
    }


    protected $casts = [
        'timezones' => 'array',
    ];
}
