<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
    <title>Trendy Boutique | Login</title>

    <!-- link css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/admin/styles.min.css')}}" />

    <style>
        .login-form {
            width: 350px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .login-form form {
            color: #434343;
            border-radius: 1px;
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f3f3f3;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h4 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }
        .login-form .avatar {
            color: #fff;
            margin: 0 auto 30px;
            text-align: center;
            /* z-index: 9;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1); */
        }
        /* .login-form .avatar i {
            font-size: 62px;
        } */
        .login-form .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    

<div class="container">
    <div class="login-form">
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="avatar">
               <img src="{{asset('assets/images/logo.png')}}" alt="" style="width:150px;height:60px;">
            </div>
            <h4 class="modal-title">Login to Admin Panel</h4>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="email" type="text" class="form-control" id="email" placeholder="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            // Toggle the type attribute
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the icon
            const toggleIcon = document.getElementById('toggleIcon');
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>