<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('transaction_edit'),
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
            'order_key' => [
                'string',
                'nullable',
            ],
            'paid_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'balance' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'handled_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'transaction.transac_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'transac_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
