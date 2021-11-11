<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Table;
use Livewire\Component;

class Create extends Component
{
    public Booking $booking;

    public array $listsForFields = [];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.create');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();

        return redirect()->route('admin.bookings.index');
    }

    protected function rules(): array
    {
        return [
            'booking.unique_key' => [
                'string',
                'required',
                'unique:bookings,unique_key',
            ],
            'booking.booked_by' => [
                'string',
                'required',
            ],
            'booking.booked_for' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'booking.table_booked_id' => [
                'integer',
                'exists:tables,id',
                'nullable',
            ],
            'booking.specifics' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['table_booked'] = Table::pluck('table_number', 'id')->toArray();
    }
}
