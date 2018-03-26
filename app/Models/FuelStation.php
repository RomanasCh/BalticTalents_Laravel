<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelStation extends Model
{
    protected $fillable = [
        'created_at',
        'coordinate_x',
        'coordinate_y',
        'name',
        'state'
    ];

}
