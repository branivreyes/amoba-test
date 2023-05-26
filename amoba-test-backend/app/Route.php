<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Route extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'external_id',
        'invitation_code',
        'title',
        'start_timestamp',
        'end_timestamp',
    ];

    public function route_data(): HasOne {
        return $this->hasOne(RouteData::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }

    public function services(): HasMany {
        return $this->hasMany(Service::class, 'external_route_id', 'external_id');
    }
}
