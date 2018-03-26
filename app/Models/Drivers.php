<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Drivers.
 */
class Drivers extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'city'
    ];

    public $timestamps = false;
}
