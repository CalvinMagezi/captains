<?php

namespace App\Http\Requests;

use App\Models\Section;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSectionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('section_edit'),
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
                'required',
                'unique:sections,name,' . request()->route('section')->id,
            ],
            'slug' => [
                'string',
                'required',
                'unique:sections,slug,' . request()->route('section')->id,
            ],
            'items' => [
                'string',
                'nullable',
            ],
            'assigned_to_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'total_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'today_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
