@extends ('admin.layout.master')
@section('pagetitle')
Admin | Dashboard 
@endsection
@section('title')
Dashboard
@endsection
@section('content')
    <!-- Main content -->

            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-4 ">
                    <!-- Monthly Earnings -->
                    <div class="card db-bg">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 text-white fw-semibold"> Total Users </h5>
                                <h4 class="fw-semibold text-white mb-3">{{$user_count}} Person</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                <div class="text-white bg-secondary rounded-circle circle-container d-flex align-items-center justify-content-center">
                                <i class="bi bi-people icon-large"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>


                    <div class="col-md-4 ">
                    <!-- Monthly Earnings -->
                    <div class="card db-bg1">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 text-white fw-semibold"> Pending Order </h5>
                                <h4 class="fw-semibold text-white mb-3">{{$pending_count}} Items</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                <div class="text-white bg-warning rounded-circle d-flex align-items-center justify-content-center circle-container">
                                    <i class="bi bi-hourglass-split icon-large"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4 ">
                    <!-- Monthly Earnings -->
                    <div class="card db-bg2">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 text-white fw-semibold"> Complete Order </h5>
                                <h4 class="fw-semibold text-white mb-3">{{$complete_count}} Items</h4>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                <div class="text-white bg-success rounded-circle d-flex align-items-center justify-content-center circle-container">
                                    <i class="bi bi-cart-check icon-large"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>This Month Orders</h4>
                        <div class="table-responsive">
                        <table class="table fixed table-bordered table-hover">
                    
                            <thead class="text-bold">
                                <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($orders as $o)
                                    <tr>
                                        <td>{{$o->user->name}}</td>
                                        <td>{{$o->product->name}}</td>
                                        <td>{{$o->qty}}</td>
                                        <td>
                                            {{$o->qty*$o->product->price}}
                                        </td>
                                        <td>
                                            @if ($o->status == 'pending')
                                                <b class="badge bg-warning">Pending</b>
                                            @else
                                                <b class="badge bg-success">Complete</b>
                                            @endif
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