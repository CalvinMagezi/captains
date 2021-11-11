<?php

namespace App\Http\Livewire\SectionSale;

use App\Models\Section;
use App\Models\SectionSale;
use Livewire\Component;

class Edit extends Component
{
    public SectionSale $sectionSale;

    public array $listsForFields = [];

    public function mount(SectionSale $sectionSale)
    {
        $this->sectionSale = $sectionSale;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.section-sale.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->sectionSale->save();

        return redirect()->route('admin.section-sales.index');
    }

    protected function rules(): array
    {
        return [
            'sectionSale.section_id' => [
                'integer',
                'exists:sections,id',
                'nullable',
            ],
            'sectionSale.todays_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'sectionSale.yesterdays_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'sectionSale.weeks_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'sectionSale.months_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'sectionSale.years_sales' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['section'] = Section::pluck('name', 'id')->toArray();
    }
}
