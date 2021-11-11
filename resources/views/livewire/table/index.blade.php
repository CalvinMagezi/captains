<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('table_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Table" format="csv" />
                <livewire:excel-export model="Table" format="xlsx" />
                <livewire:excel-export model="Table" format="pdf" />
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
                            {{ trans('cruds.table.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.table_number') }}
                            @include('components.table.sort', ['field' => 'table_number'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.qr_code') }}
                            @include('components.table.sort', ['field' => 'qr_code'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.managed_by') }}
                            @include('components.table.sort', ['field' => 'managed_by'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.table_key') }}
                            @include('components.table.sort', ['field' => 'table_key'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.color_code') }}
                            @include('components.table.sort', ['field' => 'color_code'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.order') }}
                            @include('components.table.sort', ['field' => 'order'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.section') }}
                            @include('components.table.sort', ['field' => 'section'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.position') }}
                            @include('components.table.sort', ['field' => 'position'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.top') }}
                            @include('components.table.sort', ['field' => 'top'])
                        </th>
                        <th>
                            {{ trans('cruds.table.fields.left') }}
                            @include('components.table.sort', ['field' => 'left'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tables as $table)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $table->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $table->id }}
                            </td>
                            <td>
                                {{ $table->table_number }}
                            </td>
                            <td>
                                {{ $table->qr_code }}
                            </td>
                            <td>
                                {{ $table->managed_by }}
                            </td>
                            <td>
                                {{ $table->table_key }}
                            </td>
                            <td>
                                {{ $table->color_code }}
                            </td>
                            <td>
                                {{ $table->order }}
                            </td>
                            <td>
                                {{ $table->section }}
                            </td>
                            <td>
                                {{ $table->position }}
                            </td>
                            <td>
                                {{ $table->status }}
                            </td>
                            <td>
                                {{ $table->top }}
                            </td>
                            <td>
                                {{ $table->left }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('table_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.tables.show', $table) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('table_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.tables.edit', $table) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('table_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $table->id }})" wire:loading.attr="disabled">
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
            {{ $tables->links() }}
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
