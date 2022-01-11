<?php

namespace App\Http\Resources\Property;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city_name' => $this->name,
            'state' => $this->state->name,
            'country' => $this->country->name,
        ];
    }
}
