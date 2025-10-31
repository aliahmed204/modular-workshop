<?php

namespace Modules\Order\Services;

use Illuminate\Support\Facades\DB;
use Modules\Order\Models\Order;
use Modules\Product\Models\Product;

class OrderService
{
    public function processOrder(array $data = [])
    {
        return DB::transaction(function () use ($data) {

            $discount = $data['discount'] ?? 0;

            $total = $this->calculateTotal($data['items']);

            if ($discount > $total) {
                throw new \Exception(__('Discount cannot be greater than total amount.'));
            }

            $total -= $discount;

            return Order::query()->create([
                "user_id" => $data['user_id'],
                "total" => $total,
                "address" => $data['address'] ?? null,
                "items" => $data['items'],
                "discount" => $discount,
            ]);

        });
    }

    private function calculateTotal(array $items): float
    {
        return collect($items)->sum(function ($item) {
            $product = Product::query()->find($item['product_id']);
            return $product->price * ($item['quantity'] ?? 1);
        });
    }
}
