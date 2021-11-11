<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('product_delete')
                <button class="btn btn-indigo ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Product" format="csv" />
                <livewire:excel-export model="Product" format="xlsx" />
                <livewire:excel-export model="Product" format="pdf" />
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
                            {{ trans('cruds.product.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.unique_key') }}
                            @include('components.table.sort', ['field' => 'unique_key'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.barcode') }}
                            @include('components.table.sort', ['field' => 'barcode'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.quantity') }}
                            @include('components.table.sort', ['field' => 'quantity'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.price') }}
                            @include('components.table.sort', ['field' => 'price'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.hprice') }}
                            @include('components.table.sort', ['field' => 'hprice'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                            @include('components.table.sort', ['field' => 'category.name'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.type') }}
                            @include('components.table.sort', ['field' => 'type.name'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.stock') }}
                            @include('components.table.sort', ['field' => 'stock'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.alert_stock') }}
                            @include('components.table.sort', ['field' => 'alert_stock'])
                        </th>
                        <th>
                            {{ trans('cruds.product.fields.sms_keyword') }}
                            @include('components.table.sort', ['field' => 'sms_keyword'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $product->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->unique_key }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td>
                                @foreach($product->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $product->barcode }}
                            </td>
                            <td>
                                {{ $product->quantity }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td>
                                {{ $product->hprice }}
                            </td>
                            <td>
                                @if($product->category)
                                    <span class="badge badge-relationship">{{ $product->category->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($product->type)
                                    <span class="badge badge-relationship">{{ $product->type->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $product->status }}
                            </td>
                            <td>
                                {{ $product->stock }}
                            </td>
                            <td>
                                {{ $product->alert_stock }}
                            </td>
                            <td>
                                {{ $product->sms_keyword }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('product_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.products.show', $product) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('product_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.products.edit', $product) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('product_delete')
                                        <button class="btn btn-sm btn-indigo mr-2" type="button" wire:click="confirm('delete', {{ $product->id }})" wire:loading.attr="disabled">
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
            {{ $products->links() }}
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
