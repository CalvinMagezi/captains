<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('section.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.section.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="section.name">
        <div class="validation-message">
            {{ $errors->first('section.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('section.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.section.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="section.slug">
        <div class="validation-message">
            {{ $errors->first('section.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('section.items') ? 'invalid' : '' }}">
        <label class="form-label" for="items">{{ trans('cruds.section.fields.items') }}</label>
        <textarea class="form-control" name="items" id="items" wire:model.defer="section.items" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('section.items') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.items_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('section.assigned_to_id') ? 'invalid' : '' }}">
        <label class="form-label" for="assigned_to">{{ trans('cruds.section.fields.assigned_to') }}</label>
        <x-select-list class="form-control" id="assigned_to" name="assigned_to" :options="$this->listsForFields['assigned_to']" wire:model="section.assigned_to_id" />
        <div class="validation-message">
            {{ $errors->first('section.assigned_to_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.assigned_to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('section.total_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="total_sales">{{ trans('cruds.section.fields.total_sales') }}</label>
        <input class="form-control" type="number" name="total_sales" id="total_sales" wire:model.defer="section.total_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('section.total_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.total_sales_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('section.today_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="today_sales">{{ trans('cruds.section.fields.today_sales') }}</label>
        <input class="form-control" type="number" name="today_sales" id="today_sales" wire:model.defer="section.today_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('section.today_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.section.fields.today_sales_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sections.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>