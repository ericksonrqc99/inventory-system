<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'state_id',
        'native',
        'type',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
