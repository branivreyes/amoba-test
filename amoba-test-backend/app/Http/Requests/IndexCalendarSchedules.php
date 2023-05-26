<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexCalendarSchedules extends FormRequest
{
    public function rules(): array
    {
        return [
            'start_day' => 'required_without:route_id|date',
            'end_day' => 'date',
            'route_id' => 'required_without:start_day|exists:routes,id',
        ];
    }
}
