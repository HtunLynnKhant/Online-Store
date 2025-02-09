@extends ('admin.layout.master')
@section('pagetitle')
Admin | Profile
@endsection
@section('title')
Profile
@endsection
@section('nav')
<i class="bi bi-chevron-right"></i> Profile
@endsection

@section('content')
    <div class="container-fluid">
        <!-- User Profile Container -->
        <div class="container user-profile">
            <!-- User Details Row -->
            <form id="user-form" action="">
            <div class="row align-items-center">
                
                <!-- User Image Column -->
                <div class="col-md-4">
                    <!-- User Profile Image -->
                    <img src="{{ asset(Auth::user()->image) }}" alt="{{ $user->name }}'s profile picture" class="img-fluid">
                </div>
                <!-- User Information Column -->
                <div class="col-md-6  p-3">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::user()->name}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::user()->email}}
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12">
                        <a type="button" class="btn btn-info" id="edit-button"data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                    </div>
                </div>

                </div>
                
            </div>
            </form>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form id="edit-user-form" action="{{ route('admin.profileupdate') }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">User-Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
    </div>
  

@endsection
