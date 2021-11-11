<?php

namespace App\Http\Livewire\Table;

use App\Models\Table;
use Livewire\Component;

class Edit extends Component
{
    public Table $table;

    public function mount(Table $table)
    {
        $this->table = $table;
    }

    public function render()
    {
        return view('livewire.table.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->table->save();

        return redirect()->route('admin.tables.index');
    }

    protected function rules(): array
    {
        return [
            'table.table_number' => [
                'string',
                'required',
                'unique:tables,table_number,' . $this->table->id,
            ],
            'table.qr_code' => [
                'string',
                'nullable',
            ],
            'table.managed_by' => [
                'string',
                'nullable',
            ],
            'table.table_key' => [
                'string',
                'required',
                'unique:tables,table_key,' . $this->table->id,
            ],
            'table.color_code' => [
                'string',
                'nullable',
            ],
            'table.order' => [
                'string',
                'nullable',
            ],
            'table.section' => [
                'string',
                'nullable',
            ],
            'table.position' => [
                'string',
                'nullable',
            ],
            'table.status' => [
                'string',
                'nullable',
            ],
            'table.top' => [
                'string',
                'nullable',
            ],
            'table.left' => [
                'string',
                'nullable',
            ],
        ];
    }
}
