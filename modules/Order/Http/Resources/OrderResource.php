<?php

namespace Modules\Order\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Order\Models\Order;

/**
 * @property-read Order $resource
 */
class OrderResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "id" => $this->resource->id,
            "address" => $this->resource->address,
            "items" => $this->resource->orderlines->map(function ($line) {
                return [
                    "product_id" => $line->product_id,
                    "quantity" => $line->quantity,
                    "price" => $line->price,
                ];
            }),
            "user_id" => $this->resource->user_id,
            "total" => $this->resource->total,
            "discount" => $this->resource->discount,
            "created_at" => $this->resource->created_at,
            "updated_at" => $this->resource->updated_at,
        ];
    }
}
