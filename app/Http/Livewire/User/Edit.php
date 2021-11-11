<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public string $pin = '';

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->pin      = $this->pin;
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
        return [
            'user.unique_key' => [
                'string',
                'required',
                'unique:users,unique_key,' . $this->user->id,
            ],
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'user.phone_number' => [
                'string',
                'nullable',
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.role' => [
                'string',
                'nullable',
            ],
            'user.position' => [
                'string',
                'nullable',
            ],
            'pin' => [
                'string',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
    }
}
