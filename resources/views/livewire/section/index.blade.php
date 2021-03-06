<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('section_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Section" format="csv" />
                <livewire:excel-export model="Section" format="xlsx" />
                <livewire:excel-export model="Section" format="pdf" />
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
                            {{ trans('cruds.section.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.slug') }}
                            @include('components.table.sort', ['field' => 'slug'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.items') }}
                            @include('components.table.sort', ['field' => 'items'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.assigned_to') }}
                            @include('components.table.sort', ['field' => 'assigned_to.name'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.total_sales') }}
                            @include('components.table.sort', ['field' => 'total_sales'])
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.today_sales') }}
                            @include('components.table.sort', ['field' => 'today_sales'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $section->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $section->id }}
                            </td>
                            <td>
                                {{ $section->name }}
                            </td>
                            <td>
                                {{ $section->slug }}
                            </td>
                            <td>
                                {{ $section->items }}
                            </td>
                            <td>
                                @if($section->assignedTo)
                                    <span class="badge badge-relationship">{{ $section->assignedTo->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $section->total_sales }}
                            </td>
                            <td>
                                {{ $section->today_sales }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('section_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.sections.show', $section) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('section_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.sections.edit', $section) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('section_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $section->id }})" wire:loading.attr="disabled">
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
            {{ $sections->links() }}
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
