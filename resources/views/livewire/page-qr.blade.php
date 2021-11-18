<div>
    @if ($table_chosen)
    @if ($table_chosen->managed_by != 'free')
        <h1>Table Is Managed By: {{ $table_chosen->managed_by }}</h1>
        <button class="btn btn-success btn-lg">Notify {{ $table_chosen->managed_by }}</button>
    @else
        <h1>This table is: {{ $table_chosen->managed_by }}</h1>
        <button class="btn btn-success btn-lg">Book Now {{ $table_chosen->managed_by }}</button>
    @endif

    @endif
</div>
