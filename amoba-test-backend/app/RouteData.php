<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Resources\WeekDay;

class RouteData extends Model
{
    public $incrementing = false;

    public array $out_of_frequency_columns = [
        'mon' => WeekDay::MONDAY,
        'tue' => WeekDay::TUESDAY,
        'wed' => WeekDay::WEDNESDAY,
        'thu' => WeekDay::THURSDAY,
        'fri' => WeekDay::FRIDAY,
        'sat' => WeekDay::SATURDAY,
        'sun' => WeekDay::SUNDAY,
    ];

    protected $fillable = [
        'id',
        'route_id',
        'calendar_id',
        'vinculation_route',
        'route_circular',
        'date_init',
        'date_finish',
        'updated_at',
        'created_at',
    ];

    protected $appends = ['out_of_frequency_week_days'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = array_merge($this->fillable, array_keys($this->out_of_frequency_columns));
    }

    public function route(): BelongsTo {
        return $this->belongsTo(Route::class);
    }

    public function calendar(): BelongsTo {
        return $this->belongsTo(Calendar::class);
    }

    public function getOutOfFrequencyWeekDaysAttribute(): array {
        $week_days = [];

        foreach ($this->out_of_frequency_columns as $key => $week_day) {
            if ($this[$key]) $week_days[] = $week_day;
        }

        return $week_days;
    }
}
