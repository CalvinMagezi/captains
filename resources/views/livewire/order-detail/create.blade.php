<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orderDetail.order_key_id') ? 'invalid' : '' }}">
        <label class="form-label" for="order_key">{{ trans('cruds.orderDetail.fields.order_key') }}</label>
        <x-select-list class="form-control" id="order_key" name="order_key" :options="$this->listsForFields['order_key']" wire:model="orderDetail.order_key_id" />
        <div class="validation-message">
            {{ $errors->first('orderDetail.order_key_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.order_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.product_key_id') ? 'invalid' : '' }}">
        <label class="form-label" for="product_key">{{ trans('cruds.orderDetail.fields.product_key') }}</label>
        <x-select-list class="form-control" id="product_key" name="product_key" :options="$this->listsForFields['product_key']" wire:model="orderDetail.product_key_id" />
        <div class="validation-message">
            {{ $errors->first('orderDetail.product_key_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.product_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.quantity') ? 'invalid' : '' }}">
        <label class="form-label" for="quantity">{{ trans('cruds.orderDetail.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" wire:model.defer="orderDetail.quantity" step="1">
        <div class="validation-message">
            {{ $errors->first('orderDetail.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.quantity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.unit_price') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_price">{{ trans('cruds.orderDetail.fields.unit_price') }}</label>
        <input class="form-control" type="number" name="unit_price" id="unit_price" wire:model.defer="orderDetail.unit_price" step="1">
        <div class="validation-message">
            {{ $errors->first('orderDetail.unit_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.unit_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.orderDetail.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="orderDetail.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('orderDetail.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.discount') ? 'invalid' : '' }}">
        <label class="form-label" for="discount">{{ trans('cruds.orderDetail.fields.discount') }}</label>
        <input class="form-control" type="number" name="discount" id="discount" wire:model.defer="orderDetail.discount" step="1">
        <div class="validation-message">
            {{ $errors->first('orderDetail.discount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.discount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.dispatched_to') ? 'invalid' : '' }}">
        <label class="form-label" for="dispatched_to">{{ trans('cruds.orderDetail.fields.dispatched_to') }}</label>
        <input class="form-control" type="text" name="dispatched_to" id="dispatched_to" wire:model.defer="orderDetail.dispatched_to">
        <div class="validation-message">
            {{ $errors->first('orderDetail.dispatched_to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.dispatched_to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.ready') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.orderDetail.fields.ready') }}</label>
        @foreach($this->listsForFields['ready'] as $key => $value)
            <label class="radio-label"><input type="radio" name="ready" wire:model="orderDetail.ready" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('orderDetail.ready') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.ready_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.specifics') ? 'invalid' : '' }}">
        <label class="form-label" for="specifics">{{ trans('cruds.orderDetail.fields.specifics') }}</label>
        <input class="form-control" type="text" name="specifics" id="specifics" wire:model.defer="orderDetail.specifics">
        <div class="validation-message">
            {{ $errors->first('orderDetail.specifics') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.specifics_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orderDetail.priority') ? 'invalid' : '' }}">
        <label class="form-label" for="priority">{{ trans('cruds.orderDetail.fields.priority') }}</label>
        <input class="form-control" type="text" name="priority" id="priority" wire:model.defer="orderDetail.priority">
        <div class="validation-message">
            {{ $errors->first('orderDetail.priority') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orderDetail.fields.priority_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.order-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>