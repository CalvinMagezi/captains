<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('order_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Order" format="csv" />
                <livewire:excel-export model="Order" format="xlsx" />
                <livewire:excel-export model="Order" format="pdf" />
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
                            {{ trans('cruds.order.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.unique_key') }}
                            @include('components.table.sort', ['field' => 'unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.taken_by') }}
                            @include('components.table.sort', ['field' => 'taken_by'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.closed_by') }}
                            @include('components.table.sort', ['field' => 'closed_by'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.table_number') }}
                            @include('components.table.sort', ['field' => 'table_number'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.extra_notes') }}
                            @include('components.table.sort', ['field' => 'extra_notes'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.total_amount') }}
                            @include('components.table.sort', ['field' => 'total_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.amount_received') }}
                            @include('components.table.sort', ['field' => 'amount_received'])
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.completed_at') }}
                            @include('components.table.sort', ['field' => 'completed_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $order->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $order->id }}
                            </td>
                            <td>
                                {{ $order->unique_key }}
                            </td>
                            <td>
                                {{ $order->status }}
                            </td>
                            <td>
                                {{ $order->taken_by }}
                            </td>
                            <td>
                                {{ $order->closed_by }}
                            </td>
                            <td>
                                {{ $order->table_number }}
                            </td>
                            <td>
                                {{ $order->extra_notes }}
                            </td>
                            <td>
                                {{ $order->total_amount }}
                            </td>
                            <td>
                                {{ $order->amount_received }}
                            </td>
                            <td>
                                {{ $order->completed_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('order_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.orders.show', $order) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('order_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.orders.edit', $order) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('order_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $order->id }})" wire:loading.attr="disabled">
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
            {{ $orders->links() }}
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
