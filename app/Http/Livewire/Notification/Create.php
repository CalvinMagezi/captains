<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public Notification $notification;

    public function mount(Notification $notification)
    {
        $this->notification            = $notification;
        $this->notification->completed = 'false';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.notification.create');
    }

    public function submit()
    {
        $this->validate();

        $this->notification->save();

        return redirect()->route('admin.notifications.index');
    }

    protected function rules(): array
    {
        return [
            'notification.unique_key' => [
                'string',
                'required',
                'unique:notifications,unique_key',
            ],
            'notification.for' => [
                'string',
                'nullable',
            ],
            'notification.from' => [
                'string',
                'nullable',
            ],
            'notification.purpose' => [
                'string',
                'nullable',
            ],
            'notification.time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'notification.completed' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['completed'])),
            ],
            'notification.message' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['completed'] = $this->notification::COMPLETED_RADIO;
    }
}
