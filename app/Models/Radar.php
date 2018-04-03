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
        'time',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

