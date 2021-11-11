<?php

namespace App\Http\Requests;

use App\Models\Discount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('discount_edit'),
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
            'type' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'percentage' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'discount.start' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'discount.end' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'repeat' => [
                'required',
                'in:' . implode(',', array_keys(Discount::REPEAT_RADIO)),
            ],
            'happy_hour' => [
                'nullable',
                'in:' . implode(',', array_keys(Discount::HAPPY_HOUR_RADIO)),
            ],
        ];
    }
}
