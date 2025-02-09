@extends ('admin.layout.master')
@section('pagetitle')
Admin | Order-Pending
@endsection
@section('title')
Order-Pending
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Order-Pending
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
                                <th>Product</th>
                                <th>User</th>
                                <th>Qty</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($orders as $o)

                            <tr>
                                <td>{{$o->product->name}}</td>
                                <td>{{$o->user->name}}</td>
                                <td>{{$o->qty}}</td>
                                <td>{{$o->qty*$o->product->price}}</td>
                                <td>{{$o->status}}</td>
                                <td>
                                    <a href="{{url('admin/order/complete/'.$o->id)}}" class="btn btn-sm btn-danger">Make Complete</a>
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