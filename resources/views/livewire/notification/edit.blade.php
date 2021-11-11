<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('notification.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.notification.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="notification.unique_key">
        <div class="validation-message">
            {{ $errors->first('notification.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.for') ? 'invalid' : '' }}">
        <label class="form-label" for="for">{{ trans('cruds.notification.fields.for') }}</label>
        <input class="form-control" type="text" name="for" id="for" wire:model.defer="notification.for">
        <div class="validation-message">
            {{ $errors->first('notification.for') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.for_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.from') ? 'invalid' : '' }}">
        <label class="form-label" for="from">{{ trans('cruds.notification.fields.from') }}</label>
        <input class="form-control" type="text" name="from" id="from" wire:model.defer="notification.from">
        <div class="validation-message">
            {{ $errors->first('notification.from') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.from_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.purpose') ? 'invalid' : '' }}">
        <label class="form-label" for="purpose">{{ trans('cruds.notification.fields.purpose') }}</label>
        <input class="form-control" type="text" name="purpose" id="purpose" wire:model.defer="notification.purpose">
        <div class="validation-message">
            {{ $errors->first('notification.purpose') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.purpose_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.time') ? 'invalid' : '' }}">
        <label class="form-label" for="time">{{ trans('cruds.notification.fields.time') }}</label>
        <x-date-picker class="form-control" wire:model="notification.time" id="time" name="time" />
        <div class="validation-message">
            {{ $errors->first('notification.time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.completed') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.notification.fields.completed') }}</label>
        @foreach($this->listsForFields['completed'] as $key => $value)
            <label class="radio-label"><input type="radio" name="completed" wire:model="notification.completed" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('notification.completed') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.completed_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('notification.message') ? 'invalid' : '' }}">
        <label class="form-label" for="message">{{ trans('cruds.notification.fields.message') }}</label>
        <textarea class="form-control" name="message" id="message" wire:model.defer="notification.message" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('notification.message') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.notification.fields.message_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>