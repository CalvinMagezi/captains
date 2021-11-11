<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('customer.unique_key_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.customer.fields.unique_key') }}</label>
        <x-select-list class="form-control" required id="unique_key" name="unique_key" :options="$this->listsForFields['unique_key']" wire:model="customer.unique_key_id" />
        <div class="validation-message">
            {{ $errors->first('customer.unique_key_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.orders_placed') ? 'invalid' : '' }}">
        <label class="form-label" for="orders_placed">{{ trans('cruds.customer.fields.orders_placed') }}</label>
        <input class="form-control" type="number" name="orders_placed" id="orders_placed" wire:model.defer="customer.orders_placed" step="1">
        <div class="validation-message">
            {{ $errors->first('customer.orders_placed') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.orders_placed_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.favorite_drink') ? 'invalid' : '' }}">
        <label class="form-label" for="favorite_drink">{{ trans('cruds.customer.fields.favorite_drink') }}</label>
        <input class="form-control" type="text" name="favorite_drink" id="favorite_drink" wire:model.defer="customer.favorite_drink">
        <div class="validation-message">
            {{ $errors->first('customer.favorite_drink') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.favorite_drink_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.favorite_food') ? 'invalid' : '' }}">
        <label class="form-label" for="favorite_food">{{ trans('cruds.customer.fields.favorite_food') }}</label>
        <input class="form-control" type="text" name="favorite_food" id="favorite_food" wire:model.defer="customer.favorite_food">
        <div class="validation-message">
            {{ $errors->first('customer.favorite_food') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.favorite_food_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.favorite_time') ? 'invalid' : '' }}">
        <label class="form-label" for="favorite_time">{{ trans('cruds.customer.fields.favorite_time') }}</label>
        <x-date-picker class="form-control" wire:model="customer.favorite_time" id="favorite_time" name="favorite_time" />
        <div class="validation-message">
            {{ $errors->first('customer.favorite_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.favorite_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.favorite_waiter_id') ? 'invalid' : '' }}">
        <label class="form-label" for="favorite_waiter">{{ trans('cruds.customer.fields.favorite_waiter') }}</label>
        <x-select-list class="form-control" id="favorite_waiter" name="favorite_waiter" :options="$this->listsForFields['favorite_waiter']" wire:model="customer.favorite_waiter_id" />
        <div class="validation-message">
            {{ $errors->first('customer.favorite_waiter_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.favorite_waiter_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>