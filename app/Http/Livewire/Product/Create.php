<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Product $product;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Product $product)
    {
        $this->product              = $product;
        $this->product->quantity    = '0';
        $this->product->status      = 'not-available';
        $this->product->stock       = '0';
        $this->product->alert_stock = '10';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function submit()
    {
        $this->validate();

        $this->product->save();
        $this->syncMedia();

        return redirect()->route('admin.products.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function rules(): array
    {
        return [
            'product.name' => [
                'string',
                'nullable',
            ],
            'product.unique_key' => [
                'string',
                'required',
                'unique:products,unique_key',
            ],
            'product.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.product_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.product_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'product.barcode' => [
                'string',
                'nullable',
            ],
            'product.quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'product.price' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'product.hprice' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'product.category_id' => [
                'integer',
                'exists:categories,id',
                'nullable',
            ],
            'product.type_id' => [
                'integer',
                'exists:types,id',
                'nullable',
            ],
            'product.status' => [
                'string',
                'required',
            ],
            'product.stock' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'product.alert_stock' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'product.sms_keyword' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = Category::pluck('name', 'id')->toArray();
        $this->listsForFields['type']     = Type::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->product->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
