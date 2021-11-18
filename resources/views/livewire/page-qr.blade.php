<div>
    <div class="text-center row justify-content-center">
        <div class="col-4">
            <img src="{{ asset('img/logo.svg') }}" style="width:14rem;" alt="">
        </div>
    </div>
    @if ($table_chosen)
    @if ($table_chosen->managed_by != 'free')
        <h1>Table Is Managed By: {{ $table_chosen->managed_by }}</h1>
        <button class="btn btn-success btn-lg">Notify {{ $table_chosen->managed_by }}</button>
    @else
        <h1>This table is: {{ $table_chosen->managed_by }}</h1>
        <button class="btn btn-success btn-lg">Book Now {{ $table_chosen->managed_by }}</button>
    @endif
    <div class="text-center row justify-content-center">
        <div class="col-4">
            <a target="_blank" href="https://captain-s-terrace.web.app/menu.html"class="btn btn-primary btn-lg" >
                <h1>Browse Our Menu </h1>
            </a>
        </div>
    </div>


    @endif
</div>
