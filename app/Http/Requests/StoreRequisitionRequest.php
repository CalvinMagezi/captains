<?php

namespace App\Http\Requests;

use App\Models\Requisition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequisitionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('requisition_create'),
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
            'name' => [
                'string',
                'nullable',
            ],
            'for_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'specifics' => [
                'string',
                'nullable',
            ],
            'requisition.latest_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'requisition.completed_on' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'approved_by' => [
                'string',
                'nullable',
            ],
            'requisition.approved_on' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
