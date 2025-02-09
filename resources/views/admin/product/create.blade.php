@extends ('admin.layout.master')
@section('pagetitle')
Admin | Add-Product
@endsection
@section('title')
Add Product
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Add Product
@endsection
@section('button')
    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-90deg-left"></i> Back
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- CSRF protection for Laravel -->

                    <div class="mb-3 row">
                        <label for="cat-id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm">
                            <select class="form-select" id="cat-id" name="cat_id">
                                @foreach($cat as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm">
                            <input type="file" class="form-control" id="image" name="image" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm">
                            <textarea rows="3" class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm">
                            <input type="number" class="form-control" id="price" name="prices" placeholder="Enter Price" />
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection