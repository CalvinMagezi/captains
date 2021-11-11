<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('discount.type') ? 'invalid' : '' }}">
        <label class="form-label" for="type">{{ trans('cruds.discount.fields.type') }}</label>
        <input class="form-control" type="text" name="type" id="type" wire:model.defer="discount.type">
        <div class="validation-message">
            {{ $errors->first('discount.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.status') ? 'invalid' : '' }}">
        <label class="form-label" for="status">{{ trans('cruds.discount.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" wire:model.defer="discount.status">
        <div class="validation-message">
            {{ $errors->first('discount.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.percentage') ? 'invalid' : '' }}">
        <label class="form-label required" for="percentage">{{ trans('cruds.discount.fields.percentage') }}</label>
        <input class="form-control" type="number" name="percentage" id="percentage" required wire:model.defer="discount.percentage" step="1">
        <div class="validation-message">
            {{ $errors->first('discount.percentage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.percentage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.start') ? 'invalid' : '' }}">
        <label class="form-label" for="start">{{ trans('cruds.discount.fields.start') }}</label>
        <x-date-picker class="form-control" wire:model="discount.start" id="start" name="start" />
        <div class="validation-message">
            {{ $errors->first('discount.start') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.start_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.end') ? 'invalid' : '' }}">
        <label class="form-label" for="end">{{ trans('cruds.discount.fields.end') }}</label>
        <x-date-picker class="form-control" wire:model="discount.end" id="end" name="end" />
        <div class="validation-message">
            {{ $errors->first('discount.end') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.end_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.repeat') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.discount.fields.repeat') }}</label>
        @foreach($this->listsForFields['repeat'] as $key => $value)
            <label class="radio-label"><input type="radio" name="repeat" wire:model="discount.repeat" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('discount.repeat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.repeat_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('discount.happy_hour') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.discount.fields.happy_hour') }}</label>
        @foreach($this->listsForFields['happy_hour'] as $key => $value)
            <label class="radio-label"><input type="radio" name="happy_hour" wire:model="discount.happy_hour" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('discount.happy_hour') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.discount.fields.happy_hour_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>