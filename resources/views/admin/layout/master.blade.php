<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trendy Boutique | @yield('title')</title>
  
  <!-- css Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/admin/styles.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/admin/style.css')}}">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('admin.dashboard') }}" class="text-nowrap  logo-img">
            <img src="{{asset('assets/images/logo.png')}}" alt="" width="190">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              
              <span class="hide-menu ">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-speedometer2"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              
              <span class="hide-menu">COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-columns-gap"></i>
                </span>
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('admin/product*') ? 'active' : '' }}" href="{{ route('admin.product.index') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-box-seam"></i>
                </span>
                <span class="hide-menu">Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('admin/order/pending') ? 'active' : '' }}" href="{{ route('order.pending') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-stopwatch"></i>
                </span>
                <span class="hide-menu">Pendign Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::routeIs('order.complete') ? 'active' : '' }}" href="{{ route('order.complete') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-cart-check"></i>
                </span>
                <span class="hide-menu">Complete Orders</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->is('admin/user') ? 'active' : '' }}" href="{{ route('admin.alluser') }}" aria-expanded="false">
                <span>
                  <i class="bi bi-people"></i>
                </span>
                <span class="hide-menu">User</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
               
                <a href="{{route('admin.logout')}}"  class="btn btn-primary fw-semibold"><i class="bi bi-box-arrow-right"></i> Log out</a>
              
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header bg-white">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="bi bi-text-wrap"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="bi bi-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset(auth()->user()->image )}}" alt="" width="35" height="35" class="rounded-circle">
                  
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="{{ route('admin.profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="bi bi-person"></i>
                      <p class="mb-0">My Profile</p>
                    </a>
                    
                    <a href="{{route('admin.logout')}}" class="btn btn-sm btn-primary mx-3 mt-2 d-block"><i class="bi bi-box-arrow-right"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 d-flex justify-content-between align-items-center">
              <h4 class="page-title">@yield('title')</h4>
              <h6><a href="{{route('admin.dashboard')}}"><i class="bi bi-house"></i> Dashboard</a> @yield('nav')</h6>
          </div>
        </div>
        <div class="card">
          <div class="card-title px-4 mt-4">
          @yield('button')
          </div>
          <div class="card-body">
          @include('inc.error')
          @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </div>
        </div>
    </div>


  <script src="{{asset('assets/js/admin/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/admin/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/admin/sidebarmenu.js')}}"></script>
  <script src="{{asset('assets/js/admin/app.min.js')}}"></script>
  <script>
    function showDeleteModal(productId) {
        const deleteForm = document.getElementById(`delete-${productId}`);
        const confirmButton = document.getElementById('confirmDeleteButton');

        // Show the modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();

        // Attach an event listener to the confirm button
        confirmButton.onclick = function() {
            deleteForm.submit();
        };
    }
  </script>
</body>

</html>