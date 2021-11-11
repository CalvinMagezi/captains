<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('product.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.product.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="product.name">
        <div class="validation-message">
            {{ $errors->first('product.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.product.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="product.unique_key">
        <div class="validation-message">
            {{ $errors->first('product.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.product.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="product.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('product.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.product.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.products.storeMedia') }}" collection-name="product_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.barcode') ? 'invalid' : '' }}">
        <label class="form-label" for="barcode">{{ trans('cruds.product.fields.barcode') }}</label>
        <input class="form-control" type="text" name="barcode" id="barcode" wire:model.defer="product.barcode">
        <div class="validation-message">
            {{ $errors->first('product.barcode') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.barcode_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.quantity') ? 'invalid' : '' }}">
        <label class="form-label" for="quantity">{{ trans('cruds.product.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" wire:model.defer="product.quantity" step="1">
        <div class="validation-message">
            {{ $errors->first('product.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.quantity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.product.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" wire:model.defer="product.price" step="1">
        <div class="validation-message">
            {{ $errors->first('product.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.hprice') ? 'invalid' : '' }}">
        <label class="form-label" for="hprice">{{ trans('cruds.product.fields.hprice') }}</label>
        <input class="form-control" type="number" name="hprice" id="hprice" wire:model.defer="product.hprice" step="1">
        <div class="validation-message">
            {{ $errors->first('product.hprice') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.hprice_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.category_id') ? 'invalid' : '' }}">
        <label class="form-label" for="category">{{ trans('cruds.product.fields.category') }}</label>
        <x-select-list class="form-control" id="category" name="category" :options="$this->listsForFields['category']" wire:model="product.category_id" />
        <div class="validation-message">
            {{ $errors->first('product.category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="type">{{ trans('cruds.product.fields.type') }}</label>
        <x-select-list class="form-control" id="type" name="type" :options="$this->listsForFields['type']" wire:model="product.type_id" />
        <div class="validation-message">
            {{ $errors->first('product.type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.status') ? 'invalid' : '' }}">
        <label class="form-label required" for="status">{{ trans('cruds.product.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" required wire:model.defer="product.status">
        <div class="validation-message">
            {{ $errors->first('product.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.stock') ? 'invalid' : '' }}">
        <label class="form-label" for="stock">{{ trans('cruds.product.fields.stock') }}</label>
        <input class="form-control" type="number" name="stock" id="stock" wire:model.defer="product.stock" step="1">
        <div class="validation-message">
            {{ $errors->first('product.stock') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.stock_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.alert_stock') ? 'invalid' : '' }}">
        <label class="form-label" for="alert_stock">{{ trans('cruds.product.fields.alert_stock') }}</label>
        <input class="form-control" type="number" name="alert_stock" id="alert_stock" wire:model.defer="product.alert_stock" step="1">
        <div class="validation-message">
            {{ $errors->first('product.alert_stock') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.alert_stock_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.sms_keyword') ? 'invalid' : '' }}">
        <label class="form-label" for="sms_keyword">{{ trans('cruds.product.fields.sms_keyword') }}</label>
        <input class="form-control" type="text" name="sms_keyword" id="sms_keyword" wire:model.defer="product.sms_keyword">
        <div class="validation-message">
            {{ $errors->first('product.sms_keyword') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.sms_keyword_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>