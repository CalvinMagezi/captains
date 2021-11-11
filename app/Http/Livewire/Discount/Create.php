<?php

namespace App\Http\Livewire\Discount;

use App\Models\Discount;
use Livewire\Component;

class Create extends Component
{
    public Discount $discount;

    public array $listsForFields = [];

    public function mount(Discount $discount)
    {
        $this->discount             = $discount;
        $this->discount->percentage = '0';
        $this->discount->repeat     = 'false';
        $this->discount->happy_hour = 'false';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.discount.create');
    }

    public function submit()
    {
        $this->validate();

        $this->discount->save();

        return redirect()->route('admin.discounts.index');
    }

    protected function rules(): array
    {
        return [
            'discount.type' => [
                'string',
                'nullable',
            ],
            'discount.status' => [
                'string',
                'nullable',
            ],
            'discount.percentage' => [
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
            'discount.repeat' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['repeat'])),
            ],
            'discount.happy_hour' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['happy_hour'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['repeat']     = $this->discount::REPEAT_RADIO;
        $this->listsForFields['happy_hour'] = $this->discount::HAPPY_HOUR_RADIO;
    }
}
