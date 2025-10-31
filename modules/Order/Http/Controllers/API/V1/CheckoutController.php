<?php

namespace Modules\Order\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Exception;
use Modules\Order\Http\Requests\API\V1\CheckoutRequest;
use Modules\Order\Services\OrderService;

class CheckoutController extends Controller
{
    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function __invoke(CheckoutRequest $request)
    {
        try {

            $order =  $this->orderService->processOrder($request->validated());

            return  response()->json([
                'message' => 'Order created successfully.',
                'order' => [
                    "id" => $order->id,
                    "total" => $order->total,
                ]
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred during checkout.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
