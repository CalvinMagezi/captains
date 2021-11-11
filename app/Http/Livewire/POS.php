<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class POS extends Component
{
    use WithPagination;

    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $term;
    public $searched;
    public $discounted_amount;

    /**
     * Put your custom public properties here!
     */
    public $products = [],$product_name, $message = '', $productInCart;
    public $addQty;
    public $balance;
    public $pay_money;
    public $status, $taken_by, $closed_by, $table_number, $extra_notes;

    protected $listeners = [
        'clear_message' => 'clear_message'
    ];

    public function clear_message(){
        $this->message = '';
    }

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Order::find($this->modelId);
        // Assign the variables here
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Order::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Order::all();
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Order::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Order::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

     /**
     * Display a searched tasker
     *
     * @return void
     */
    public function displayProduct(){
        $this->searched = '';
        $like = "%$this->term%";
        $found = Product::where('name','LIKE',$like)->get();
        $this->searched = $found;
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function mount(){
        $this->products = Product::all();
        $this->productInCart = Cart::all();
    }

    public function selectTable(){
        $checkAvailable = Table::where('table_number','=',$this->table_number)->where('status','=','active')->first();

        if(!$checkAvailable){
            $this->table_number = $this->table_number;
        }else{
            $this->table_number = $this->table_number;
            return $this->message = 'This table has currently got another order placed on it.';
        }
    }

    public function InsertCart($name){
        $this->product_name = $name;
        $name = "%$name%";
        $findProduct = Product::where('name','LIKE',$name)->first();

        if (!$findProduct) {
            return $this->message = 'Product Not Found';
        }else{
            $countCartProduct = Cart::where('product_key_id','=',$findProduct->id)->count();

            if($countCartProduct > 0){
                return $this->message = $findProduct->name.' is already in cart.';
            }else{
                $add_to_cart = new Cart;
                $add_to_cart->product_key_id = $findProduct->id;
                $add_to_cart->product_qty = $findProduct->quantity;
                $add_to_cart->product_price = $findProduct->price;
                $add_to_cart->user_key = Auth::user()->id;
                $add_to_cart->save();

                $this->productInCart->prepend($add_to_cart);

                $this->product_name = '';
                return $this->message = "$findProduct->name Added Successfully";
            }
        }

        $this->searched = '';
        $this->reset();

    }

    public function placeOrder(){
        $this->emit(event: 'refresh_stats');
    }

    public function clearOrder(){
        $this->reset();
    }

    /**
     * Increment And Decrement Order Item Quantity
     *
     * @param  mixed $cartId
     * @return void
     */
    public function incrementQty($cartId){
        $carts = Cart::find($cartId);
        $carts->increment('product_qty', 1);
        $updatedPrice = $carts->product_qty * $carts->productKey->price;
        $carts->update([
            'product_price' => $updatedPrice
        ]);
        $this->mount();
    }

    public function decrementQty($cartId){
        $carts = Cart::find($cartId);
        if($carts->product_qty == 0 ){
            return $this->message = "Item quantity can't be less than 0.";
        }else{
            $carts->decrement('product_qty', 1);
            $updatedPrice = $carts->product_qty * $carts->productKey->price;
            $carts->update([
                'product_price' => $updatedPrice
            ]);
            $this->mount();
        }

    }

    public function removeProduct($cartId){
        $delete_cart = Cart::find($cartId);
        $delete_cart->delete();

        $this->message = "Product Removed From Cart.";

        $this->productInCart = $this->productInCart->except($cartId);
    }

    public function render()
    {

        if ($this->pay_money != ''){
            $totalAmount = $this->pay_money - $this->productInCart->sum('product_price');
            $this->balance = $totalAmount;
        }
        return view('livewire.p-o-s', [
            'data' => $this->read(),
            'searched' => $this->searched,
            'discounted_amount' => $this->discounted_amount
        ]);
    }
}
