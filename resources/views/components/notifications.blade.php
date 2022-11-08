@if (session('status'))
<div class="">
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> {{ session('status') }}
    </div>
</div>
@endif

@if (session('error'))
<div class="">
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Error!</strong> {{ session('error') }}.
    </div>
</div>
@endif
