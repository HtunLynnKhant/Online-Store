@extends ('admin.layout.master')
@section('pagetitle')
Admin | Edit-Product
@endsection
@section('title')
Edit Product
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Edit Product
@endsection
@section('button')
    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-90deg-left"></i> Back
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.product.update', $pd->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3 row">
                        <label for="cat-id" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm">
                            <select class="form-select" id="cat-id" name="cat_id">
                                @foreach($cat as $c)
                                <option value="{{ $c->id }}" @if ($c->id == $pd->category_id) selected @endif >{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm">
                            <input type="text" value="{{ $pd->name }}" class="form-control" id="name" name="name" placeholder="Enter Name" required />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm">
                            <input type="file" class="form-control" id="image" name="image" />
                            <img src="{{ asset($pd->image) }}" alt="product image" style="width: 10%; border-radius: 20px;" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm">
                            <textarea rows="3" class="form-control" id="description" name="description" required>{{ $pd->description }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm">
                            <input type="number" class="form-control" id="price" name="prices" value="{{ $pd->price }}" required />
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection