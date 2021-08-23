<?php

namespace App\Http\Resources;
use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;

class SuperheroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
            'real_name' => $this->real_name,
            'origin_description' => $this->origin_description,
            'superpowers' => $this->superpowers,
            'catch_phrase' => $this->catch_phrase,
            'image'=> ImageResource::collection(Image::all()->where('superhero_id', $this->id)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
