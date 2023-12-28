<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_name' => $this->product->name,
            'price' =>  number_format($this->product->price, 2) ,
            'description' => $this->product->description,
            'created_at' => $this->created_at
        ];
    }
}
