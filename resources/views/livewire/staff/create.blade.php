<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('staff.staff_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="staff_number">{{ trans('cruds.staff.fields.staff_number') }}</label>
        <input class="form-control" type="text" name="staff_number" id="staff_number" required wire:model.defer="staff.staff_number">
        <div class="validation-message">
            {{ $errors->first('staff.staff_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.staff_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.user_key_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user_key">{{ trans('cruds.staff.fields.user_key') }}</label>
        <x-select-list class="form-control" id="user_key" name="user_key" :options="$this->listsForFields['user_key']" wire:model="staff.user_key_id" />
        <div class="validation-message">
            {{ $errors->first('staff.user_key_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.user_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.tables_in_charge_of') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.staff.fields.tables_in_charge_of') }}</label>
        <select class="form-control" wire:model="staff.tables_in_charge_of">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['tables_in_charge_of'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('staff.tables_in_charge_of') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.tables_in_charge_of_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.casuals_assigned') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.staff.fields.casuals_assigned') }}</label>
        <select class="form-control" wire:model="staff.casuals_assigned">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['casuals_assigned'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('staff.casuals_assigned') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.casuals_assigned_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.color_code') ? 'invalid' : '' }}">
        <label class="form-label" for="color_code">{{ trans('cruds.staff.fields.color_code') }}</label>
        <input class="form-control" type="text" name="color_code" id="color_code" wire:model.defer="staff.color_code">
        <div class="validation-message">
            {{ $errors->first('staff.color_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.color_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.clocked_in') ? 'invalid' : '' }}">
        <label class="form-label" for="clocked_in">{{ trans('cruds.staff.fields.clocked_in') }}</label>
        <x-date-picker class="form-control" wire:model="staff.clocked_in" id="clocked_in" name="clocked_in" />
        <div class="validation-message">
            {{ $errors->first('staff.clocked_in') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.clocked_in_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staff.clocked_out') ? 'invalid' : '' }}">
        <label class="form-label" for="clocked_out">{{ trans('cruds.staff.fields.clocked_out') }}</label>
        <x-date-picker class="form-control" wire:model="staff.clocked_out" id="clocked_out" name="clocked_out" />
        <div class="validation-message">
            {{ $errors->first('staff.clocked_out') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staff.fields.clocked_out_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>