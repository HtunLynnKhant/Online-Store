

@if ($errors->any())
    @foreach ($errors->all() as $e )
    <!-- Warning Alert -->
    <div class="container mt-2">
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
            <i class="bi-exclamation-triangle-fill ml-2"></i> 
                {{$e}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>

    @endforeach
@endif


@if (session()->has('success'))
    <div class="container mt-2">
        <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
            <i class="bi-check-circle-fill ml-2"></i>
                {{session()->get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif