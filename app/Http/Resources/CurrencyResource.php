<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
   
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'title' => $this->title,
            'symbol' => $this->symbol,
        ];


        if(!$request->is('api/properties*')){
            $result['slug'] = $this->slug;
        }
        return $result;
    }
}
