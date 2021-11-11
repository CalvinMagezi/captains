<?php

namespace App\Http\Requests;

use App\Models\SectionSale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSectionSaleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('section_sale_create'),
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
            'section_id' => [
                'integer',
                'exists:sections,id',
                'nullable',
            ],
            'todays_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'yesterdays_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'weeks_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'months_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'years_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
