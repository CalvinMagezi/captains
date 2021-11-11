<?php

namespace App\Http\Requests;

use App\Models\OrderDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('order_detail_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'order_key_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'product_key_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'unit_price' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'discount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'dispatched_to' => [
                'string',
                'nullable',
            ],
            'ready' => [
                'nullable',
                'in:' . implode(',', array_keys(OrderDetail::READY_RADIO)),
            ],
            'specifics' => [
                'string',
                'nullable',
            ],
            'priority' => [
                'string',
                'nullable',
            ],
        ];
    }
}
