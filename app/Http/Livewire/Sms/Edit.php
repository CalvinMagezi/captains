<?php

namespace App\Http\Livewire\Sms;

use App\Models\Product;
use App\Models\Sms;
use App\Models\Staff;
use App\Models\Table;
use Livewire\Component;

class Edit extends Component
{
    public Sms $sms;

    public array $listsForFields = [];

    public function mount(Sms $sms)
    {
        $this->sms = $sms;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.sms.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->sms->save();

        return redirect()->route('admin.sms.index');
    }

    protected function rules(): array
    {
        return [
            'sms.placed_by' => [
                'string',
                'required',
            ],
            'sms.unique_key' => [
                'string',
                'required',
                'unique:sms,unique_key,' . $this->sms->id,
            ],
            'sms.keyword_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'sms.time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'sms.table_id' => [
                'integer',
                'exists:tables,id',
                'nullable',
            ],
            'sms.requested_waiter_id' => [
                'integer',
                'exists:staff,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['keyword']          = Product::pluck('sms_keyword', 'id')->toArray();
        $this->listsForFields['table']            = Table::pluck('table_number', 'id')->toArray();
        $this->listsForFields['requested_waiter'] = Staff::pluck('staff_number', 'id')->toArray();
    }
}
