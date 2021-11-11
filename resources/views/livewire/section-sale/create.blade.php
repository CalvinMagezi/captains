<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('sectionSale.section_id') ? 'invalid' : '' }}">
        <label class="form-label" for="section">{{ trans('cruds.sectionSale.fields.section') }}</label>
        <x-select-list class="form-control" id="section" name="section" :options="$this->listsForFields['section']" wire:model="sectionSale.section_id" />
        <div class="validation-message">
            {{ $errors->first('sectionSale.section_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.section_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sectionSale.todays_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="todays_sales">{{ trans('cruds.sectionSale.fields.todays_sales') }}</label>
        <input class="form-control" type="number" name="todays_sales" id="todays_sales" wire:model.defer="sectionSale.todays_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('sectionSale.todays_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.todays_sales_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sectionSale.yesterdays_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="yesterdays_sales">{{ trans('cruds.sectionSale.fields.yesterdays_sales') }}</label>
        <input class="form-control" type="number" name="yesterdays_sales" id="yesterdays_sales" wire:model.defer="sectionSale.yesterdays_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('sectionSale.yesterdays_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.yesterdays_sales_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sectionSale.weeks_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="weeks_sales">{{ trans('cruds.sectionSale.fields.weeks_sales') }}</label>
        <input class="form-control" type="number" name="weeks_sales" id="weeks_sales" wire:model.defer="sectionSale.weeks_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('sectionSale.weeks_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.weeks_sales_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sectionSale.months_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="months_sales">{{ trans('cruds.sectionSale.fields.months_sales') }}</label>
        <input class="form-control" type="number" name="months_sales" id="months_sales" wire:model.defer="sectionSale.months_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('sectionSale.months_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.months_sales_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sectionSale.years_sales') ? 'invalid' : '' }}">
        <label class="form-label" for="years_sales">{{ trans('cruds.sectionSale.fields.years_sales') }}</label>
        <input class="form-control" type="number" name="years_sales" id="years_sales" wire:model.defer="sectionSale.years_sales" step="1">
        <div class="validation-message">
            {{ $errors->first('sectionSale.years_sales') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sectionSale.fields.years_sales_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.section-sales.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>