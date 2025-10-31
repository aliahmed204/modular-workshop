<?php

namespace Modules\Order\Services;

use Exception;
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
                throw new Exception(__('Discount cannot be greater than total amount.'));
            }

            $total -= $discount;

            $order = Order::query()->create([
                "user_id" => $data['user_id'],
                "total" => $total,
                "address" => $data['address'] ?? null,
                "discount" => $discount,
            ]);

            $this->createOrderItems($order, $data['items']);

            return $order->refresh();
        });
    }

    private function calculateTotal(array $items): float
    {
        return collect($items)->sum(function ($item) {
            $product = Product::query()->find($item['product_id']);
            if (is_null($product)) {
                throw new Exception(__('Product not found: ID ') . $item['product_id']);
            }
            return $product->price * ($item['quantity'] ?? 1);
        });
    }

    private function createOrderItems(Order $order, array $items): void
    {
        foreach ($items as $item) {
            $product = Product::query()->find($item['product_id']);
            $order->orderLines()->create([
                'product_id' => $product->id,
                'quantity' => $item['quantity'] ?? 1,
                'price' => $product->price,
            ]);
        }
    }
}
