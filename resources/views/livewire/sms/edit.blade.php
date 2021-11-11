<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('sms.placed_by') ? 'invalid' : '' }}">
        <label class="form-label required" for="placed_by">{{ trans('cruds.sms.fields.placed_by') }}</label>
        <input class="form-control" type="text" name="placed_by" id="placed_by" required wire:model.defer="sms.placed_by">
        <div class="validation-message">
            {{ $errors->first('sms.placed_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.placed_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sms.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.sms.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="sms.unique_key">
        <div class="validation-message">
            {{ $errors->first('sms.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sms.keyword_id') ? 'invalid' : '' }}">
        <label class="form-label" for="keyword">{{ trans('cruds.sms.fields.keyword') }}</label>
        <x-select-list class="form-control" id="keyword" name="keyword" :options="$this->listsForFields['keyword']" wire:model="sms.keyword_id" />
        <div class="validation-message">
            {{ $errors->first('sms.keyword_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.keyword_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sms.time') ? 'invalid' : '' }}">
        <label class="form-label" for="time">{{ trans('cruds.sms.fields.time') }}</label>
        <x-date-picker class="form-control" wire:model="sms.time" id="time" name="time" />
        <div class="validation-message">
            {{ $errors->first('sms.time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sms.table_id') ? 'invalid' : '' }}">
        <label class="form-label" for="table">{{ trans('cruds.sms.fields.table') }}</label>
        <x-select-list class="form-control" id="table" name="table" :options="$this->listsForFields['table']" wire:model="sms.table_id" />
        <div class="validation-message">
            {{ $errors->first('sms.table_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.table_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sms.requested_waiter_id') ? 'invalid' : '' }}">
        <label class="form-label" for="requested_waiter">{{ trans('cruds.sms.fields.requested_waiter') }}</label>
        <x-select-list class="form-control" id="requested_waiter" name="requested_waiter" :options="$this->listsForFields['requested_waiter']" wire:model="sms.requested_waiter_id" />
        <div class="validation-message">
            {{ $errors->first('sms.requested_waiter_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sms.fields.requested_waiter_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sms.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>