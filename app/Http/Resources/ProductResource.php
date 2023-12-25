<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'image' => $this->image,
            'price' => number_format($this->price, 2),
            'description'=> $this->description,
            'category' => $this->category->name,
            'unit' => $this->unit->name,
            'brand' => $this->brand->name
        ];
    }
}
