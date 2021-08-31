<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
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
            'id' => $this->id,
            'url' => $this->url,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'date' => $this->date,
            'title' => $this->title,
            'href' => $this->href,
            'address' => $this->address,
            'room' => $this->room,
            'description' => $this->description,
            'metro' => $this->metro,
            'area' => $this->area,
            'application' => $this->application,
        ];
    }
}
