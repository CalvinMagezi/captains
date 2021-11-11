<?php

namespace App\Http\Livewire\Type;

use App\Models\Section;
use App\Models\Type;
use Livewire\Component;

class Edit extends Component
{
    public Type $type;

    public array $listsForFields = [];

    public function mount(Type $type)
    {
        $this->type = $type;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->type->save();

        return redirect()->route('admin.types.index');
    }

    protected function rules(): array
    {
        return [
            'type.name' => [
                'string',
                'required',
                'unique:types,name,' . $this->type->id,
            ],
            'type.unique_key' => [
                'string',
                'required',
                'unique:types,unique_key,' . $this->type->id,
            ],
            'type.dispatched_to_id' => [
                'integer',
                'exists:sections,id',
                'nullable',
            ],
            'type.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispatched_to'] = Section::pluck('name', 'id')->toArray();
    }
}
