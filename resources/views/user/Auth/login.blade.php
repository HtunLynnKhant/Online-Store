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
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: url('{{ asset('assets/images/auth/background.jpg') }}');">
           <div class="featured-image mb-3">
            <img src="{{asset('assets/images/auth/lgoin1.png')}}" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-dark fs-2" ">Be Verified</p>
           <small class="text-dark text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
            @include('user.error')
                <div class="header-text mb-4">
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <form action="{{ route('user.PostLogin') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control bg-light" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="password" class="form-control bg-light" placeholder="Password" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>

                <div class="row">
                    <small>Don't have account? <a href="{{route('user.register')}}">Sign Up</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>
@endsection