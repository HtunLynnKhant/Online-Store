@extends ('admin.layout.master')
@section('pagetitle')
Admin | Product-Detail
@endsection
@section('title')
Product-Detail
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Product-Detail
@endsection
@section('button')
    <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-90deg-left"></i> Back
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h5 class="text-dark">
                    {{$product->name}}
                </h5>
                <span class="badge bg-info">{{$product->category->name}}</span>
                <div class="row my-3">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <img src="{{ asset($product->image) }}" class="img-fluid img_detail" alt="Product Image" />
                    </div>
                    <div class="col-md-8 text-justify">
                        <h6>Product Description</h6>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h5 class="text-primary">Price: {{$product->price}} MMK</h5>
                        <h6>Count: {{$product->view_count}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection