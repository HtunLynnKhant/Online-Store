@extends ('admin.layout.master')
@section('pagetitle')
Admin | Complete-Order
@endsection
@section('title')
Complete-Order
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Complete-Order
@endsection
@section('content')
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-3">
                <form method="GET" action="{{ route('order.complete') }}" class="row g-3">
                    <div class="col-md-4">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" />
                    </div>
                    <div class="col-md-4">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" />
                    </div>
                    <div class="col-md-4 align-self-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
                @if(isset(request()->start_date))
                <h5 class="text-warning py-3">
                    Between
                    <b>
                        {{ request()->start_date}}
                    </b>
                    to
                    <b>
                        {{ request()->end_date}}
                    </b>
                    <a href="{{route('order.complete')}}" class="btn btn-sm btn-primary ml-3">Show All</a>
                </h5>
                @endif
            </div>
        </div>
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
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($orders as $o)

                        <tr>
                            <td>{{$o->product->name}}</td>
                            <td>{{$o->user->name}}</td>
                            <td>{{$o->qty}}</td>
                            <td>{{$o->qty*$o->product->price}}</td>
                            <td class="text-success">{{$o->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection