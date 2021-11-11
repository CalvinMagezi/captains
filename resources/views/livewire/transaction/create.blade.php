<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('transaction.order_key') ? 'invalid' : '' }}">
        <label class="form-label" for="order_key">{{ trans('cruds.transaction.fields.order_key') }}</label>
        <input class="form-control" type="text" name="order_key" id="order_key" wire:model.defer="transaction.order_key">
        <div class="validation-message">
            {{ $errors->first('transaction.order_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.order_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.paid_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="paid_amount">{{ trans('cruds.transaction.fields.paid_amount') }}</label>
        <input class="form-control" type="number" name="paid_amount" id="paid_amount" wire:model.defer="transaction.paid_amount" step="1">
        <div class="validation-message">
            {{ $errors->first('transaction.paid_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.paid_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.balance') ? 'invalid' : '' }}">
        <label class="form-label" for="balance">{{ trans('cruds.transaction.fields.balance') }}</label>
        <input class="form-control" type="number" name="balance" id="balance" wire:model.defer="transaction.balance" step="1">
        <div class="validation-message">
            {{ $errors->first('transaction.balance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.balance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.payment_method') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_method">{{ trans('cruds.transaction.fields.payment_method') }}</label>
        <input class="form-control" type="text" name="payment_method" id="payment_method" wire:model.defer="transaction.payment_method">
        <div class="validation-message">
            {{ $errors->first('transaction.payment_method') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.payment_method_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.handled_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="handled_by">{{ trans('cruds.transaction.fields.handled_by') }}</label>
        <x-select-list class="form-control" id="handled_by" name="handled_by" :options="$this->listsForFields['handled_by']" wire:model="transaction.handled_by_id" />
        <div class="validation-message">
            {{ $errors->first('transaction.handled_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.handled_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.transac_date') ? 'invalid' : '' }}">
        <label class="form-label" for="transac_date">{{ trans('cruds.transaction.fields.transac_date') }}</label>
        <x-date-picker class="form-control" wire:model="transaction.transac_date" id="transac_date" name="transac_date" />
        <div class="validation-message">
            {{ $errors->first('transaction.transac_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.transac_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('transaction.transac_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="transac_amount">{{ trans('cruds.transaction.fields.transac_amount') }}</label>
        <input class="form-control" type="number" name="transac_amount" id="transac_amount" wire:model.defer="transaction.transac_amount" step="1">
        <div class="validation-message">
            {{ $errors->first('transaction.transac_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.transaction.fields.transac_amount_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>