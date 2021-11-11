<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class Edit extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.order.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        return redirect()->route('admin.orders.index');
    }

    protected function rules(): array
    {
        return [
            'order.unique_key' => [
                'string',
                'required',
                'unique:orders,unique_key,' . $this->order->id,
            ],
            'order.status' => [
                'string',
                'nullable',
            ],
            'order.taken_by' => [
                'string',
                'nullable',
            ],
            'order.closed_by' => [
                'string',
                'nullable',
            ],
            'order.table_number' => [
                'string',
                'nullable',
            ],
            'order.extra_notes' => [
                'string',
                'nullable',
            ],
            'order.total_amount' => [
                'string',
                'nullable',
            ],
            'order.amount_received' => [
                'string',
                'nullable',
            ],
            'order.completed_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
