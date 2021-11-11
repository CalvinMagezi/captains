<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Customer $customer;

    public array $listsForFields = [];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.customer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->customer->save();

        return redirect()->route('admin.customers.index');
    }

    protected function rules(): array
    {
        return [
            'customer.unique_key_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'customer.orders_placed' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer.favorite_drink' => [
                'string',
                'nullable',
            ],
            'customer.favorite_food' => [
                'string',
                'nullable',
            ],
            'customer.favorite_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'customer.favorite_waiter_id' => [
                'integer',
                'exists:staff,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['unique_key']      = User::pluck('unique_key', 'id')->toArray();
        $this->listsForFields['favorite_waiter'] = Staff::pluck('staff_number', 'id')->toArray();
    }
}
