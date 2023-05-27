<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteData extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "route_id" => $this->route_id,
            "calendar_id" => $this->calendar_id,
            "vinculation_route" => $this->vinculation_route,
            "route_circular" => $this->route_circular,
            "date_init" => $this->date_init,
            "date_finish" => $this->date_finish,
            "out_of_frequency_week_days" => $this->out_of_frequency_week_days,
            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
        ];
    }
}
