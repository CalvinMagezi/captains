<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('cart.product_key_id') ? 'invalid' : '' }}">
        <label class="form-label" for="product_key">{{ trans('cruds.cart.fields.product_key') }}</label>
        <x-select-list class="form-control" id="product_key" name="product_key" :options="$this->listsForFields['product_key']" wire:model="cart.product_key_id" />
        <div class="validation-message">
            {{ $errors->first('cart.product_key_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.product_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cart.product_qty') ? 'invalid' : '' }}">
        <label class="form-label" for="product_qty">{{ trans('cruds.cart.fields.product_qty') }}</label>
        <input class="form-control" type="number" name="product_qty" id="product_qty" wire:model.defer="cart.product_qty" step="1">
        <div class="validation-message">
            {{ $errors->first('cart.product_qty') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.product_qty_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cart.product_price') ? 'invalid' : '' }}">
        <label class="form-label" for="product_price">{{ trans('cruds.cart.fields.product_price') }}</label>
        <input class="form-control" type="number" name="product_price" id="product_price" wire:model.defer="cart.product_price" step="1">
        <div class="validation-message">
            {{ $errors->first('cart.product_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.product_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cart.user_key') ? 'invalid' : '' }}">
        <label class="form-label" for="user_key">{{ trans('cruds.cart.fields.user_key') }}</label>
        <input class="form-control" type="text" name="user_key" id="user_key" wire:model.defer="cart.user_key">
        <div class="validation-message">
            {{ $errors->first('cart.user_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.user_key_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.carts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>