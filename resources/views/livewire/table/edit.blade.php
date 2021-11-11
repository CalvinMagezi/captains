<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('table.table_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="table_number">{{ trans('cruds.table.fields.table_number') }}</label>
        <input class="form-control" type="text" name="table_number" id="table_number" required wire:model.defer="table.table_number">
        <div class="validation-message">
            {{ $errors->first('table.table_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.table_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.qr_code') ? 'invalid' : '' }}">
        <label class="form-label" for="qr_code">{{ trans('cruds.table.fields.qr_code') }}</label>
        <input class="form-control" type="text" name="qr_code" id="qr_code" wire:model.defer="table.qr_code">
        <div class="validation-message">
            {{ $errors->first('table.qr_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.qr_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.managed_by') ? 'invalid' : '' }}">
        <label class="form-label" for="managed_by">{{ trans('cruds.table.fields.managed_by') }}</label>
        <input class="form-control" type="text" name="managed_by" id="managed_by" wire:model.defer="table.managed_by">
        <div class="validation-message">
            {{ $errors->first('table.managed_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.managed_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.table_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="table_key">{{ trans('cruds.table.fields.table_key') }}</label>
        <input class="form-control" type="text" name="table_key" id="table_key" required wire:model.defer="table.table_key">
        <div class="validation-message">
            {{ $errors->first('table.table_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.table_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.color_code') ? 'invalid' : '' }}">
        <label class="form-label" for="color_code">{{ trans('cruds.table.fields.color_code') }}</label>
        <input class="form-control" type="text" name="color_code" id="color_code" wire:model.defer="table.color_code">
        <div class="validation-message">
            {{ $errors->first('table.color_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.color_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.order') ? 'invalid' : '' }}">
        <label class="form-label" for="order">{{ trans('cruds.table.fields.order') }}</label>
        <input class="form-control" type="text" name="order" id="order" wire:model.defer="table.order">
        <div class="validation-message">
            {{ $errors->first('table.order') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.order_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.section') ? 'invalid' : '' }}">
        <label class="form-label" for="section">{{ trans('cruds.table.fields.section') }}</label>
        <input class="form-control" type="text" name="section" id="section" wire:model.defer="table.section">
        <div class="validation-message">
            {{ $errors->first('table.section') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.section_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.position') ? 'invalid' : '' }}">
        <label class="form-label" for="position">{{ trans('cruds.table.fields.position') }}</label>
        <input class="form-control" type="text" name="position" id="position" wire:model.defer="table.position">
        <div class="validation-message">
            {{ $errors->first('table.position') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.position_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.status') ? 'invalid' : '' }}">
        <label class="form-label" for="status">{{ trans('cruds.table.fields.status') }}</label>
        <input class="form-control" type="text" name="status" id="status" wire:model.defer="table.status">
        <div class="validation-message">
            {{ $errors->first('table.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.top') ? 'invalid' : '' }}">
        <label class="form-label" for="top">{{ trans('cruds.table.fields.top') }}</label>
        <input class="form-control" type="text" name="top" id="top" wire:model.defer="table.top">
        <div class="validation-message">
            {{ $errors->first('table.top') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.top_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('table.left') ? 'invalid' : '' }}">
        <label class="form-label" for="left">{{ trans('cruds.table.fields.left') }}</label>
        <input class="form-control" type="text" name="left" id="left" wire:model.defer="table.left">
        <div class="validation-message">
            {{ $errors->first('table.left') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.table.fields.left_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tables.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>