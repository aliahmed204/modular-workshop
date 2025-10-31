<?php

namespace Modules\Order\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function rules()
    {
        return [
            "user_id" => "required|integer|exists:users,id",
            "discount" => "nullable|integer|min:0",
            "address" => "required|string|max:255",
            "items" => "required|array|min:1",
            "items.*.product_id" => "required|integer|exists:products,id",
            "items.*.quantity" => "required|integer|min:1",
            "payment_method" => "required|string|in:paybuddy"
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            "user_id.required" => "The user_id field is required.",
            "user_id.integer" => "The user_id must be an integer.",
            "user_id.exists" => "The selected user_id is invalid.",
            "discount.integer" => "The discount must be an integer.",
            "discount.min" => "The discount must be at least 0.",
            "items.required" => "The items field is required.",
            "items.array" => "The items field must be an array.",
            "items.min" => "At least one item is required.",
            "items.*.product_id.required" => "Each item must have a product_id.",
            "items.*.product_id.integer" => "The product_id must be an integer.",
            "items.*.product_id.exists" => "The selected product_id is invalid.",
            "items.*.quantity.required" => "Each item must have a quantity.",
            "items.*.quantity.integer" => "The quantity must be an integer.",
        ];
    }
}
