<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
        <title>Trendy-Boutique</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/css/argon-design-system.min.css" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    </head>

    <body>
        <!-- Header -->
        <div class="container-fluid" id="header">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand text-white" href="#">Trendy Boutique</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Your Order</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                User
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::check())
                                <a class="dropdown-item" href="#">Welcome {{Auth::user()->name}}!</a>
                                <a href="{{route('user.logout')}}" class="dropdown-item">logout</a>
                                @else
                                <a class="dropdown-item" href="{{ route('user.showlogin') }}">Login</a>
                                    <a class="dropdown-item" href="{{route('user.register')}}">Register</a>
                                @endif
                                    
                                
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart')}}" tabindex="-1" aria-disabled="true">
                                Cart
                                <small class="badge badge-danger">{{$cart_count}}</small>
                            </a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item ">
                            <a class="nav-link">
                                <img src="{{ asset(auth()->user()->image) }}" alt="User Image" class="profile-pic rounded-circle">
                            </a>
                        </li>
                        @endif
                    </ul>
                    <form class="form-inline" method="get" action="{{url('product/search')}}">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Welcome From MM-Coder Shopping Website</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium sequi voluptas similique sed minima rerum labore reprehenderit, illo recusandae quasi tempore placeat aliquam autem, a soluta nisi totam
                            temporibus dolorem!
                        </p>
                        @if (!Auth::check())
                        <a href="{{route('user.register')}}" class="btn btn-outline-primary">SignUp</a>
                        <a href="{{ route('user.showlogin') }}" class="btn btn-primary">Login</a>
                        @endif
                        
                    </div>
                    <div class="col-md-6 text-center">
                        <img class="home" src="https://wp.xpeedstudio.com/seocify/home-fifteen/wp-content/uploads/sites/27/2020/03/home17-banner-image-min.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <div class="container mt-3">
            <div class="row">
                <!-- For Category and Information -->
                <div class="col-md-4">
                    <div class="card">
                        @if (Auth::check())
                        <div class="card-body">
                            <ul class="list-group">
                                <a href="{{route('cart')}}">
                                <li class="list-group-item bg-primary text-white">
                                    Your Cart List
                                </li>
                                </a>
                                <a href="{{route('pendingOrder')}}">
                                    <li class="list-group-item bg-success text-white">
                                        Your Pending Order List
                                    </li>
                                </a>
                                <a href="{{route('completeOrder')}}">
                                <li class="list-group-item bg-dark text-white">
                                    Your Comfirm Order List
                                </li>
                                </a>
                                <a href="{{route('userprofile')}}">
                                <li class="list-group-item bg-danger text-white">
                                    Your Profile Info
                                </li>
                                </a>
                            </ul>
                        </div>
                        @endif
                        
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item bg-primary text-white">
                                    All Category
                                </li>
                                @foreach ($category as $c)
                                <a href="{{url('/product/category/'.$c->slug)}}">
                                    <li class="list-group-item">
                                        {{$c->name}}
                                        <span class="badge badge-primary float-right">{{$c->product_count}}</span>
                                    </li>
                                </a>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/js/argon-design-system.min.js"></script>
    </body>
</html>
