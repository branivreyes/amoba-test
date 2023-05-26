<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Calendar extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'calendar_id',
        'name',
        'updated_at',
        'created_at',
    ];

    public function calendar_disabled_days(): HasMany {
        return $this->hasMany(CalendarDisabledDay::class);
    }

    public function route_data(): HasMany {
        return $this->hasMany(RouteData::class);
    }
}
