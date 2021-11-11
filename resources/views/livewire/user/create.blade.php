<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.unique_key') ? 'invalid' : '' }}">
        <label class="form-label required" for="unique_key">{{ trans('cruds.user.fields.unique_key') }}</label>
        <input class="form-control" type="text" name="unique_key" id="unique_key" required wire:model.defer="user.unique_key">
        <div class="validation-message">
            {{ $errors->first('user.unique_key') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.unique_key_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.phone_number') ? 'invalid' : '' }}">
        <label class="form-label" for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
        <input class="form-control" type="text" name="phone_number" id="phone_number" wire:model.defer="user.phone_number">
        <div class="validation-message">
            {{ $errors->first('user.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.phone_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" required wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.role') ? 'invalid' : '' }}">
        <label class="form-label" for="role">{{ trans('cruds.user.fields.role') }}</label>
        <input class="form-control" type="text" name="role" id="role" wire:model.defer="user.role">
        <div class="validation-message">
            {{ $errors->first('user.role') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.role_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.position') ? 'invalid' : '' }}">
        <label class="form-label" for="position">{{ trans('cruds.user.fields.position') }}</label>
        <input class="form-control" type="text" name="position" id="position" wire:model.defer="user.position">
        <div class="validation-message">
            {{ $errors->first('user.position') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.position_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.pin') ? 'invalid' : '' }}">
        <label class="form-label" for="pin">{{ trans('cruds.user.fields.pin') }}</label>
        <input class="form-control" type="password" name="pin" id="pin" wire:model.defer="pin">
        <div class="validation-message">
            {{ $errors->first('user.pin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.pin_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>