<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    /**
     * Table
     * @var string
     **/
    protected $table = 'consumptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'km', 'liters', 'driving_type', 'passenger'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passenger' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bike() {
        return $this->belongsTo(Bike::class, 'bike_id');
    }
}
