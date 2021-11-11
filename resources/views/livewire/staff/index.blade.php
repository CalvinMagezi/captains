<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('staff_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Staff" format="csv" />
                <livewire:excel-export model="Staff" format="xlsx" />
                <livewire:excel-export model="Staff" format="pdf" />
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
                            {{ trans('cruds.staff.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.staff_number') }}
                            @include('components.table.sort', ['field' => 'staff_number'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.user_key') }}
                            @include('components.table.sort', ['field' => 'user_key.unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.tables_in_charge_of') }}
                            @include('components.table.sort', ['field' => 'tables_in_charge_of'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.casuals_assigned') }}
                            @include('components.table.sort', ['field' => 'casuals_assigned'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.color_code') }}
                            @include('components.table.sort', ['field' => 'color_code'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.clocked_in') }}
                            @include('components.table.sort', ['field' => 'clocked_in'])
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.clocked_out') }}
                            @include('components.table.sort', ['field' => 'clocked_out'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($staff as $staff)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $staff->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $staff->id }}
                            </td>
                            <td>
                                {{ $staff->staff_number }}
                            </td>
                            <td>
                                @if($staff->userKey)
                                    <span class="badge badge-relationship">{{ $staff->userKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $staff->tables_in_charge_of_label }}
                            </td>
                            <td>
                                {{ $staff->casuals_assigned_label }}
                            </td>
                            <td>
                                {{ $staff->color_code }}
                            </td>
                            <td>
                                {{ $staff->clocked_in }}
                            </td>
                            <td>
                                {{ $staff->clocked_out }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('staff_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.staff.show', $staff) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('staff_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.staff.edit', $staff) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('staff_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $staff->id }})" wire:loading.attr="disabled">
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
            {{ $staff->links() }}
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
