<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'quantity' => $this->quantity,
            'price' => number_format((float) $this->price, 2,) ,
            'name' => $this->product->name,
            'description' => $this->product->description,
            'image' => $this->product->image,
            
        ];;
    }
}
