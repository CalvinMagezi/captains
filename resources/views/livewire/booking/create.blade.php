<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.booking.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="booking.unique_key">
        <div class="validation-message">
            {{ $errors->first('booking.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.booked_by') ? 'invalid' : '' }}">
        <label class="form-label required" for="booked_by">{{ trans('cruds.booking.fields.booked_by') }}</label>
        <input class="form-control" type="text" name="booked_by" id="booked_by" required wire:model.defer="booking.booked_by">
        <div class="validation-message">
            {{ $errors->first('booking.booked_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booked_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.booked_for') ? 'invalid' : '' }}">
        <label class="form-label" for="booked_for">{{ trans('cruds.booking.fields.booked_for') }}</label>
        <x-date-picker class="form-control" wire:model="booking.booked_for" id="booked_for" name="booked_for" />
        <div class="validation-message">
            {{ $errors->first('booking.booked_for') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booked_for_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.table_booked_id') ? 'invalid' : '' }}">
        <label class="form-label" for="table_booked">{{ trans('cruds.booking.fields.table_booked') }}</label>
        <x-select-list class="form-control" id="table_booked" name="table_booked" :options="$this->listsForFields['table_booked']" wire:model="booking.table_booked_id" />
        <div class="validation-message">
            {{ $errors->first('booking.table_booked_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.table_booked_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.specifics') ? 'invalid' : '' }}">
        <label class="form-label" for="specifics">{{ trans('cruds.booking.fields.specifics') }}</label>
        <textarea class="form-control" name="specifics" id="specifics" wire:model.defer="booking.specifics" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('booking.specifics') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.specifics_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>