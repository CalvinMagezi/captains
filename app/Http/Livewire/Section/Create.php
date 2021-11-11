<?php

namespace App\Http\Livewire\Section;

use App\Models\Section;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Section $section;

    public array $listsForFields = [];

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.section.create');
    }

    public function submit()
    {
        $this->validate();

        $this->section->save();

        return redirect()->route('admin.sections.index');
    }

    protected function rules(): array
    {
        return [
            'section.name' => [
                'string',
                'required',
                'unique:sections,name',
            ],
            'section.slug' => [
                'string',
                'required',
                'unique:sections,slug',
            ],
            'section.items' => [
                'string',
                'nullable',
            ],
            'section.assigned_to_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'section.total_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'section.today_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['assigned_to'] = User::pluck('name', 'id')->toArray();
    }
}
