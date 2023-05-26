<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarDisabledDay extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
		'calendar_id',
		'day',
		'enabled',
		'updated_at',
		'created_at',
    ];

    public function calendar(): BelongsTo {
        return $this->belongsTo(Calendar::class);
    }
}
