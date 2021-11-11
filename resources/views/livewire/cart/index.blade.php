<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('cart_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Cart" format="csv" />
                <livewire:excel-export model="Cart" format="xlsx" />
                <livewire:excel-export model="Cart" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.cart.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.cart.fields.product_key') }}
                            @include('components.table.sort', ['field' => 'product_key.unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.cart.fields.product_qty') }}
                            @include('components.table.sort', ['field' => 'product_qty'])
                        </th>
                        <th>
                            {{ trans('cruds.cart.fields.product_price') }}
                            @include('components.table.sort', ['field' => 'product_price'])
                        </th>
                        <th>
                            {{ trans('cruds.cart.fields.user_key') }}
                            @include('components.table.sort', ['field' => 'user_key'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($carts as $cart)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $cart->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $cart->id }}
                            </td>
                            <td>
                                @if($cart->productKey)
                                    <span class="badge badge-relationship">{{ $cart->productKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $cart->product_qty }}
                            </td>
                            <td>
                                {{ $cart->product_price }}
                            </td>
                            <td>
                                {{ $cart->user_key }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('cart_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.carts.show', $cart) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('cart_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.carts.edit', $cart) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('cart_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $cart->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $carts->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
