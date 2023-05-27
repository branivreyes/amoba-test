<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Route extends JsonResource
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
            "external_id" => $this->external_id,
            "invitation_code" => $this->invitation_code,
            "title" => $this->title,
            "start_timestamp" => $this->start_timestamp,
            "end_timestamp" => $this->end_timestamp,
            "route_data" => new RouteData($this->whenLoaded("route_data")),
        ];
    }
}
