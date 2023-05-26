<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_plan_id',
        'route_id',
        'track_id',
        'reservation_start',
        'reservation_end',
        'route_stop_origin_id',
        'route_stop_destination_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user_plan(): BelongsTo {
        return $this->belongsTo(UserPlan::class);
    }

    public function route(): BelongsTo {
        return $this->belongsTo(Route::class);
    }
}
