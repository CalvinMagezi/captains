<?php

namespace App\Http\Requests;

use App\Models\Sms;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSmsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('sms_create'),
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
            'placed_by' => [
                'string',
                'required',
            ],
            'unique_key' => [
                'string',
                'required',
                'unique:sms,unique_key',
            ],
            'keyword_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'sms.time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'table_id' => [
                'integer',
                'exists:tables,id',
                'nullable',
            ],
            'requested_waiter_id' => [
                'integer',
                'exists:staff,id',
                'nullable',
            ],
        ];
    }
}
