<?php

namespace App\Http\Livewire\Staff;

use App\Models\Staff;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Staff $staff;

    public array $listsForFields = [];

    public function mount(Staff $staff)
    {
        $this->staff             = $staff;
        $this->staff->color_code = 'red';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.staff.create');
    }

    public function submit()
    {
        $this->validate();

        $this->staff->save();

        return redirect()->route('admin.staff.index');
    }

    protected function rules(): array
    {
        return [
            'staff.staff_number' => [
                'string',
                'required',
                'unique:staff,staff_number',
            ],
            'staff.user_key_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'staff.tables_in_charge_of' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['tables_in_charge_of'])),
            ],
            'staff.casuals_assigned' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['casuals_assigned'])),
            ],
            'staff.color_code' => [
                'string',
                'nullable',
            ],
            'staff.clocked_in' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'staff.clocked_out' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user_key']            = User::pluck('unique_key', 'id')->toArray();
        $this->listsForFields['tables_in_charge_of'] = $this->staff::TABLES_IN_CHARGE_OF_SELECT;
        $this->listsForFields['casuals_assigned']    = $this->staff::CASUALS_ASSIGNED_SELECT;
    }
}
