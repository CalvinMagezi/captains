<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('section_sale_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="SectionSale" format="csv" />
                <livewire:excel-export model="SectionSale" format="xlsx" />
                <livewire:excel-export model="SectionSale" format="pdf" />
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
                            {{ trans('cruds.sectionSale.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.section') }}
                            @include('components.table.sort', ['field' => 'section.name'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.todays_sales') }}
                            @include('components.table.sort', ['field' => 'todays_sales'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.yesterdays_sales') }}
                            @include('components.table.sort', ['field' => 'yesterdays_sales'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.weeks_sales') }}
                            @include('components.table.sort', ['field' => 'weeks_sales'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.months_sales') }}
                            @include('components.table.sort', ['field' => 'months_sales'])
                        </th>
                        <th>
                            {{ trans('cruds.sectionSale.fields.years_sales') }}
                            @include('components.table.sort', ['field' => 'years_sales'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sectionSales as $sectionSale)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $sectionSale->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $sectionSale->id }}
                            </td>
                            <td>
                                @if($sectionSale->section)
                                    <span class="badge badge-relationship">{{ $sectionSale->section->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $sectionSale->todays_sales }}
                            </td>
                            <td>
                                {{ $sectionSale->yesterdays_sales }}
                            </td>
                            <td>
                                {{ $sectionSale->weeks_sales }}
                            </td>
                            <td>
                                {{ $sectionSale->months_sales }}
                            </td>
                            <td>
                                {{ $sectionSale->years_sales }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('section_sale_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.section-sales.show', $sectionSale) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('section_sale_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.section-sales.edit', $sectionSale) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('section_sale_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $sectionSale->id }})" wire:loading.attr="disabled">
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
            {{ $sectionSales->links() }}
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
