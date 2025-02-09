@extends ('user.layout.master')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/admin/styles.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">

</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: url('{{ asset('assets/images/auth/background.jpg') }}');">
           <div class="featured-image mb-3">
            <img src="{{asset('assets/images/auth/login.png')}}" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-dark fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be Verified</p>
           <small class="text-dark text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Don't miss out! Sign up now and start selling in minutes.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Register</h2>
                </div>
                <form action="{{ route('user.Postregister') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control bg-light" placeholder="Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control bg-light" placeholder="Email address" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control bg-light" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control bg-light" required>
                    </div>
                    <div class="input-group mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                        </div>
                        <div class="forgot">
                            <small></small>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary w-100 fs-6">Register</button>
                    </div>
                </form>

                <!-- <div class="input-group mb-3">
                    <button class="btn btn-light w-100 fs-6"><img src="{{asset('assets/images/auth/google.png')}}" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                </div> -->
                <div class="row">
                    <small>If you have account? <a href="{{ route('user.showlogin') }}">Login</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>
@endsection