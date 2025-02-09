@extends ('admin.layout.master')
@section('pagetitle')
Admin | Category
@endsection
@section('title')
Category List
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Category List
@endsection
@section('button')
<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-secondary  "><i class="bi bi-plus"></i> Add Category</a>
@endsection
@section('content')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="text-bold">
                            <tr>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($categories as $cat )
                            <tr>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-success"><i class="bi bi-pen"></i> </a>
                                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" class="d-inline" method="POST" id="delete-{{ $cat->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="showDeleteModal({{ $cat->id }})" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection