<?php

namespace App\Http\Livewire\Transaction;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Transaction $transaction;

    public array $listsForFields = [];

    public function mount(Transaction $transaction)
    {
        $this->transaction                 = $transaction;
        $this->transaction->payment_method = 'cash';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.transaction.create');
    }

    public function submit()
    {
        $this->validate();

        $this->transaction->save();

        return redirect()->route('admin.transactions.index');
    }

    protected function rules(): array
    {
        return [
            'transaction.order_key' => [
                'string',
                'nullable',
            ],
            'transaction.paid_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'transaction.balance' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'transaction.payment_method' => [
                'string',
                'nullable',
            ],
            'transaction.handled_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'transaction.transac_date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'transaction.transac_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['handled_by'] = User::pluck('name', 'id')->toArray();
    }
}
