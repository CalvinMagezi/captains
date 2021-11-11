<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('discount_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Discount" format="csv" />
                <livewire:excel-export model="Discount" format="xlsx" />
                <livewire:excel-export model="Discount" format="pdf" />
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
                            {{ trans('cruds.discount.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.type') }}
                            @include('components.table.sort', ['field' => 'type'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.percentage') }}
                            @include('components.table.sort', ['field' => 'percentage'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.start') }}
                            @include('components.table.sort', ['field' => 'start'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.end') }}
                            @include('components.table.sort', ['field' => 'end'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.repeat') }}
                            @include('components.table.sort', ['field' => 'repeat'])
                        </th>
                        <th>
                            {{ trans('cruds.discount.fields.happy_hour') }}
                            @include('components.table.sort', ['field' => 'happy_hour'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($discounts as $discount)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $discount->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $discount->id }}
                            </td>
                            <td>
                                {{ $discount->type }}
                            </td>
                            <td>
                                {{ $discount->status }}
                            </td>
                            <td>
                                {{ $discount->percentage }}
                            </td>
                            <td>
                                {{ $discount->start }}
                            </td>
                            <td>
                                {{ $discount->end }}
                            </td>
                            <td>
                                {{ $discount->repeat_label }}
                            </td>
                            <td>
                                {{ $discount->happy_hour_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('discount_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.discounts.show', $discount) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('discount_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.discounts.edit', $discount) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('discount_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $discount->id }})" wire:loading.attr="disabled">
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
            {{ $discounts->links() }}
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
