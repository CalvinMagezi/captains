<?php

namespace App\Http\Livewire\Type;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Type;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Type())->orderable;
    }

    public function render()
    {
        $query = Type::with(['dispatchedTo'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $types = $query->paginate($this->perPage);

        return view('livewire.type.index', compact('query', 'types', 'types'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Type::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Type $type)
    {
        abort_if(Gate::denies('type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->delete();
    }
}
