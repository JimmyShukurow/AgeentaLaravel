<?php

namespace App\Http\Resources\Property;

use App\Http\Resources\CurrencyResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'location_id' => new CityResource($this->whenLoaded('city')),
            'number_bedroom' => $this->number_bedroom,
            'number_bathrooms' => $this->number_bathrooms,
            'number_floor' => $this->number_floor,
            'square' => $this->square,
            'price' => $this->price,
            'currency_id' => new CurrencyResource($this->whenLoaded('currency')),
            'period' => $this->period,
            'user_id' =>  new UserResource($this->whenLoaded('author')),
            'category_id' => $this->category_id,
            'is_featured' => $this->is_featured,
            'moderation_status' => $this->moderation_status,
            'expire_date' => $this->expire_date,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'type_id' => $this->type_id,

        ];
    }
}
