<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Section;
use Livewire\Component;

class Create extends Component
{
    public Category $category;

    public array $listsForFields = [];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->category->save();

        return redirect()->route('admin.categories.index');
    }

    protected function rules(): array
    {
        return [
            'category.name' => [
                'string',
                'required',
                'unique:categories,name',
            ],
            'category.unique_key' => [
                'string',
                'required',
                'unique:categories,unique_key',
            ],
            'category.description' => [
                'string',
                'nullable',
            ],
            'category.dispatched_to_id' => [
                'integer',
                'exists:sections,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['dispatched_to'] = Section::pluck('name', 'id')->toArray();
    }
}
