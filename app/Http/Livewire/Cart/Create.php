<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Cart $cart;

    public array $listsForFields = [];

    public function mount(Cart $cart)
    {
        $this->cart                = $cart;
        $this->cart->product_qty   = '1';
        $this->cart->product_price = '0';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.cart.create');
    }

    public function submit()
    {
        $this->validate();

        $this->cart->save();

        return redirect()->route('admin.carts.index');
    }

    protected function rules(): array
    {
        return [
            'cart.product_key_id' => [
                'integer',
                'exists:products,id',
                'nullable',
            ],
            'cart.product_qty' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'cart.product_price' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'cart.user_key' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['product_key'] = Product::pluck('unique_key', 'id')->toArray();
    }
}
