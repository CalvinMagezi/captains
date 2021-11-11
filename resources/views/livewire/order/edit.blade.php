<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('order.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.order.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="order.unique_key">
        <div class="validation-message">
            {{ $errors->first('order.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.status') ? 'invalid' : '' }}">
        <label class="form-label" for="status">{{ trans('cruds.order.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" wire:model.defer="order.status">
        <div class="validation-message">
            {{ $errors->first('order.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.taken_by') ? 'invalid' : '' }}">
        <label class="form-label" for="taken_by">{{ trans('cruds.order.fields.taken_by') }}</label>
        <input class="form-control" type="text" name="taken_by" id="taken_by" wire:model.defer="order.taken_by">
        <div class="validation-message">
            {{ $errors->first('order.taken_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.taken_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.closed_by') ? 'invalid' : '' }}">
        <label class="form-label" for="closed_by">{{ trans('cruds.order.fields.closed_by') }}</label>
        <input class="form-control" type="text" name="closed_by" id="closed_by" wire:model.defer="order.closed_by">
        <div class="validation-message">
            {{ $errors->first('order.closed_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.closed_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.table_number') ? 'invalid' : '' }}">
        <label class="form-label" for="table_number">{{ trans('cruds.order.fields.table_number') }}</label>
        <input class="form-control" type="text" name="table_number" id="table_number" wire:model.defer="order.table_number">
        <div class="validation-message">
            {{ $errors->first('order.table_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.table_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.extra_notes') ? 'invalid' : '' }}">
        <label class="form-label" for="extra_notes">{{ trans('cruds.order.fields.extra_notes') }}</label>
        <textarea class="form-control" name="extra_notes" id="extra_notes" wire:model.defer="order.extra_notes" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('order.extra_notes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.extra_notes_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.total_amount') ? 'invalid' : '' }}">
        <label class="form-label" for="total_amount">{{ trans('cruds.order.fields.total_amount') }}</label>
        <input class="form-control" type="text" name="total_amount" id="total_amount" wire:model.defer="order.total_amount">
        <div class="validation-message">
            {{ $errors->first('order.total_amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.total_amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.amount_received') ? 'invalid' : '' }}">
        <label class="form-label" for="amount_received">{{ trans('cruds.order.fields.amount_received') }}</label>
        <input class="form-control" type="text" name="amount_received" id="amount_received" wire:model.defer="order.amount_received">
        <div class="validation-message">
            {{ $errors->first('order.amount_received') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.amount_received_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.completed_at') ? 'invalid' : '' }}">
        <label class="form-label" for="completed_at">{{ trans('cruds.order.fields.completed_at') }}</label>
        <x-date-picker class="form-control" wire:model="order.completed_at" id="completed_at" name="completed_at" />
        <div class="validation-message">
            {{ $errors->first('order.completed_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.completed_at_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>