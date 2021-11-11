<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('sms_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Sms" format="csv" />
                <livewire:excel-export model="Sms" format="xlsx" />
                <livewire:excel-export model="Sms" format="pdf" />
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
                            {{ trans('cruds.sms.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.placed_by') }}
                            @include('components.table.sort', ['field' => 'placed_by'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.unique_key') }}
                            @include('components.table.sort', ['field' => 'unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.keyword') }}
                            @include('components.table.sort', ['field' => 'keyword.sms_keyword'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.time') }}
                            @include('components.table.sort', ['field' => 'time'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.table') }}
                            @include('components.table.sort', ['field' => 'table.table_number'])
                        </th>
                        <th>
                            {{ trans('cruds.sms.fields.requested_waiter') }}
                            @include('components.table.sort', ['field' => 'requested_waiter.staff_number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sms as $sms)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $sms->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $sms->id }}
                            </td>
                            <td>
                                {{ $sms->placed_by }}
                            </td>
                            <td>
                                {{ $sms->unique_key }}
                            </td>
                            <td>
                                @if($sms->keyword)
                                    <span class="badge badge-relationship">{{ $sms->keyword->sms_keyword ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $sms->time }}
                            </td>
                            <td>
                                @if($sms->table)
                                    <span class="badge badge-relationship">{{ $sms->table->table_number ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($sms->requestedWaiter)
                                    <span class="badge badge-relationship">{{ $sms->requestedWaiter->staff_number ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('sms_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.sms.show', $sms) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('sms_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.sms.edit', $sms) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('sms_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $sms->id }})" wire:loading.attr="disabled">
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
            {{ $sms->links() }}
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
