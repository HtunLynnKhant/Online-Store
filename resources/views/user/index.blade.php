@extends ('user.layout.master')

@section('content')
<div class="row">
@include('user.error')
    <!-- Loop Product -->
    @foreach ($product as $p)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <a href="{{url('product/'.$p->slug)}}">
          <img src="{{ asset($p->image) }}" class="card-img-top" alt="{{ $p->name }}">
        </a>
        <div class="card-body px-2 pb-2 pt-1">
          <div class="d-flex justify-content-between">
            <div>
              <p class="h5 text-primary">{{ $p->price }} MMK</p>
            </div>
          </div>
          <p class="text-warning d-flex align-items-center mb-2">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </p>
          <p class="mb-0">
            <small>
              <a href="{{url('product/'.$p->slug)}}" class="text-secondary">{{ $p->name }}</a>
            </small>
          </p>
          <p class="mb-1 badge text-bg-info">
            <small>
              {{ $p->category->name }}
            </small>
          </p>
          
          <div class="d-flex justify-content-between">
            <div class="col px-0">
              <a href="{{url('product/cart/add/'.$p->slug)}}" class="btn btn-sm btn-outline-primary btn-block">
                Add To Cart 
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    @endforeach
    
    
</div>
<div class="row mt-2">
    <div class="col-md-6 offset-3">
       {{$product->links()}}
    </div>
</div>

@endsection