<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPlan extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'currency_id',
        'start_timestamp',
        'end_timestamp',
        'renewal_timestamp',
        'renewal_price',
        'language',
        'company_id',
        'created',
        'modified',
    ];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}
