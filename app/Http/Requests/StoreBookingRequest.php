<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('booking_create'),
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
            'unique_key' => [
                'string',
                'required',
                'unique:bookings,unique_key',
            ],
            'booked_by' => [
                'string',
                'required',
            ],
            'booking.booked_for' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'table_booked_id' => [
                'integer',
                'exists:tables,id',
                'nullable',
            ],
            'specifics' => [
                'string',
                'nullable',
            ],
        ];
    }
}
