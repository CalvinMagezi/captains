<?php

namespace App\Http\Livewire\Requisition;

use App\Models\Product;
use App\Models\Requisition;
use Livewire\Component;

class Edit extends Component
{
    public Requisition $requisition;

    public array $listsForFields = [];

    public function mount(Requisition $requisition)
    {
        $this->requisition = $requisition;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.requisition.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->requisition->save();

        return redirect()->route('admin.requisitions.index');
    }

    protected function rules(): array
    {
        return [
            'requisition.name' => [
                'string',
                'nullable',
            ],
            'requisition.for_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'requisition.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'requisition.specifics' => [
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
            'requisition.approved_by' => [
                'string',
                'nullable',
            ],
            'requisition.approved_on' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['for'] = Product::pluck('unique_key', 'id')->toArray();
    }
}
