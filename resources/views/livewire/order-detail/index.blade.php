<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('order_detail_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OrderDetail" format="csv" />
                <livewire:excel-export model="OrderDetail" format="xlsx" />
                <livewire:excel-export model="OrderDetail" format="pdf" />
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
                            {{ trans('cruds.orderDetail.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.order_key') }}
                            @include('components.table.sort', ['field' => 'order_key.unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.product_key') }}
                            @include('components.table.sort', ['field' => 'product_key.unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.quantity') }}
                            @include('components.table.sort', ['field' => 'quantity'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.unit_price') }}
                            @include('components.table.sort', ['field' => 'unit_price'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.discount') }}
                            @include('components.table.sort', ['field' => 'discount'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.dispatched_to') }}
                            @include('components.table.sort', ['field' => 'dispatched_to'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.ready') }}
                            @include('components.table.sort', ['field' => 'ready'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.specifics') }}
                            @include('components.table.sort', ['field' => 'specifics'])
                        </th>
                        <th>
                            {{ trans('cruds.orderDetail.fields.priority') }}
                            @include('components.table.sort', ['field' => 'priority'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orderDetails as $orderDetail)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $orderDetail->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $orderDetail->id }}
                            </td>
                            <td>
                                @if($orderDetail->orderKey)
                                    <span class="badge badge-relationship">{{ $orderDetail->orderKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($orderDetail->productKey)
                                    <span class="badge badge-relationship">{{ $orderDetail->productKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $orderDetail->quantity }}
                            </td>
                            <td>
                                {{ $orderDetail->unit_price }}
                            </td>
                            <td>
                                {{ $orderDetail->amount }}
                            </td>
                            <td>
                                {{ $orderDetail->discount }}
                            </td>
                            <td>
                                {{ $orderDetail->dispatched_to }}
                            </td>
                            <td>
                                {{ $orderDetail->ready_label }}
                            </td>
                            <td>
                                {{ $orderDetail->specifics }}
                            </td>
                            <td>
                                {{ $orderDetail->priority }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('order_detail_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.order-details.show', $orderDetail) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('order_detail_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.order-details.edit', $orderDetail) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('order_detail_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $orderDetail->id }})" wire:loading.attr="disabled">
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
            {{ $orderDetails->links() }}
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
