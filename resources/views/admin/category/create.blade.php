@extends ('admin.layout.master')
@section('pagetitle')
Admin | Add-Category
@endsection
@section('title')
Add Category
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Category List
@endsection
@section('button')
<a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-90deg-left"></i> Back</a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <form method="POST" action="{{route('admin.categories.store')}}">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Enter product name" />
                        </div>
                        <div class="mt-8">
                            <button class="btn btn-primary">
                                Add Category
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection