<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('requisition.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.requisition.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="requisition.name">
        <div class="validation-message">
            {{ $errors->first('requisition.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.for_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="for">{{ trans('cruds.requisition.fields.for') }}</label>
        <x-select-list class="form-control" required id="for" name="for" :options="$this->listsForFields['for']" wire:model="requisition.for_id" />
        <div class="validation-message">
            {{ $errors->first('requisition.for_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.for_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.requisition.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="requisition.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('requisition.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.specifics') ? 'invalid' : '' }}">
        <label class="form-label" for="specifics">{{ trans('cruds.requisition.fields.specifics') }}</label>
        <textarea class="form-control" name="specifics" id="specifics" wire:model.defer="requisition.specifics" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('requisition.specifics') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.specifics_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.latest_date') ? 'invalid' : '' }}">
        <label class="form-label" for="latest_date">{{ trans('cruds.requisition.fields.latest_date') }}</label>
        <x-date-picker class="form-control" wire:model="requisition.latest_date" id="latest_date" name="latest_date" />
        <div class="validation-message">
            {{ $errors->first('requisition.latest_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.latest_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.completed_on') ? 'invalid' : '' }}">
        <label class="form-label" for="completed_on">{{ trans('cruds.requisition.fields.completed_on') }}</label>
        <x-date-picker class="form-control" wire:model="requisition.completed_on" id="completed_on" name="completed_on" />
        <div class="validation-message">
            {{ $errors->first('requisition.completed_on') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.completed_on_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.approved_by') ? 'invalid' : '' }}">
        <label class="form-label" for="approved_by">{{ trans('cruds.requisition.fields.approved_by') }}</label>
        <input class="form-control" type="text" name="approved_by" id="approved_by" wire:model.defer="requisition.approved_by">
        <div class="validation-message">
            {{ $errors->first('requisition.approved_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.approved_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('requisition.approved_on') ? 'invalid' : '' }}">
        <label class="form-label" for="approved_on">{{ trans('cruds.requisition.fields.approved_on') }}</label>
        <x-date-picker class="form-control" wire:model="requisition.approved_on" id="approved_on" name="approved_on" />
        <div class="validation-message">
            {{ $errors->first('requisition.approved_on') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.requisition.fields.approved_on_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.requisitions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>