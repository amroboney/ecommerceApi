<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'serial' => $this->serial,
            'status' => $this->status,
            'total_amount' => number_format((float) $this->total_amount, 2,) ,
            'date' => $this->date,
            'discount' => $this->discount,
            'created_at' => $this->created_at,
            'items' => OrderItemResouce::collection($this->orderDetails)
        ];
    }
}
