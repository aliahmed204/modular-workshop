<?php

namespace Modules\Order\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Http\Resources\OrderResource;
use Modules\Order\Models\Order;

class OrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::query()->latest("orders.created_at")->where('user_id', $request->user_id)->paginate();

        return OrderResource::collection($orders);
    }
}
