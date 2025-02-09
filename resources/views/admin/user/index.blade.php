@extends ('admin.layout.master')
@section('pagetitle')
Admin | All-User
@endsection
@section('title')
All Users
@endsection
@section('nav')
All-Users
@endsection
@section('content')
    <!-- Main content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-bold">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Order Count</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($user as $u )
                        
                        <tr>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <img src="{{asset($u->image)}}" alt="" style="width:50px;border-radius:10px;">
                            </td>
                            <td>
                                {{$u->order_count}}
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