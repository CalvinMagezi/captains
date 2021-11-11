<?php

namespace App\Http\Livewire\OrderDetail;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public OrderDetail $orderDetail;

    public array $listsForFields = [];

    public function mount(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order-detail.create');
    }

    public function submit()
    {
        $this->validate();

        $this->orderDetail->save();

        return redirect()->route('admin.order-details.index');
    }

    protected function rules(): array
    {
        return [
            'orderDetail.order_key_id' => [
                'integer',
                'exists:orders,id',
                'nullable',
            ],
            'orderDetail.product_key_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'orderDetail.quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orderDetail.unit_price' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orderDetail.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orderDetail.discount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orderDetail.dispatched_to' => [
                'string',
                'nullable',
            ],
            'orderDetail.ready' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['ready'])),
            ],
            'orderDetail.specifics' => [
                'string',
                'nullable',
            ],
            'orderDetail.priority' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['order_key']   = Order::pluck('unique_key', 'id')->toArray();
        $this->listsForFields['product_key'] = Product::pluck('unique_key', 'id')->toArray();
        $this->listsForFields['ready']       = $this->orderDetail::READY_RADIO;
    }
}
