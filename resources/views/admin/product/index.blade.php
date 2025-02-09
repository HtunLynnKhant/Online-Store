@extends ('admin.layout.master')
@section('pagetitle')
Admin | Product
@endsection
@section('title')
Product List
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Product List
@endsection
@section('button')
<a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-secondary">
    <i class="bi bi-plus"></i> Add Product
</a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="">
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($products as $p)
                        <tr>
                            <td>{{$p->category->name}}</td>
                            <td>{{$p->name}}</td>
                            <td>
                                <img src="{{asset($p->image)}}" alt="Product Image" class="img-thumbnail" style="width: 40px; height: 40px;" />
                            </td>

                            <td>
                                <a href="{{ route('admin.product.edit', $p->id) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <a href="{{ route('admin.product.show', $p->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $p->id) }}" class="d-inline" method="POST" id="delete-{{ $p->id }}">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="showDeleteModal({{ $p->id }})" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <div class="d-flex">
                  {!! $products->links() !!}
              </div>
          </div>
      </div>
  </div>


@endsection