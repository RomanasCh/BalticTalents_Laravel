<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Radar.
 */
class Radar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_at',
        'number',
        'distance',
        'time'
    ];
}
