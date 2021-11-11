<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('type.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.type.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="type.name">
        <div class="validation-message">
            {{ $errors->first('type.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.type.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('type.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.type.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="type.unique_key">
        <div class="validation-message">
            {{ $errors->first('type.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.type.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('type.dispatched_to_id') ? 'invalid' : '' }}">
        <label class="form-label" for="dispatched_to">{{ trans('cruds.type.fields.dispatched_to') }}</label>
        <x-select-list class="form-control" id="dispatched_to" name="dispatched_to" :options="$this->listsForFields['dispatched_to']" wire:model="type.dispatched_to_id" />
        <div class="validation-message">
            {{ $errors->first('type.dispatched_to_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.type.fields.dispatched_to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('type.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.type.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="type.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('type.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.type.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>