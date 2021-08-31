@if(session()->has('error'))
<div class="row justify-content-center">
    <div class="col-4 text-center">
        <button class="btn btn-danger" style="width: 100%;"> {{ session()->get('error') }}</button>
    </div>
</div>

@endif
@if(session()->has('success'))
<div class="row justify-content-center">
<div class="col-4 text-center">
    <button class="btn btn-success" style="width: 100%;"> {{ session()->get('success') }}</button>
</div>
</div>                            
@endif 