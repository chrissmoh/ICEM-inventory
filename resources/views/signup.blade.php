<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="robots" content="noindex, nofollow"> --}}


    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        {{-- <div class="login-logo">
                            <img src="assets/img/inve.png" alt="img">
                        </div> --}}
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                            <h4>Continue where you left off</h4>
                        </div>
                        <form action="{{ route('signuppost')}}" method="post">
                            @csrf
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input type="text" name="name" placeholder="Enter your full name">
                                    <img src="assets/img/icons/users1.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                <div class="form-login">
                                    <label>Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password_confirmation" class="pass-input"
                                            placeholder="Confirm your password" required>
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button class="btn btn-login">Sign Up</button>
                                </div>
                                <div class="signinform text-center">
                                    <h4>Already a user?
                                        <a href="" class="hover-a" >Sign In</a>
                                    </h4>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>
</form>
    <script src=" {{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src=" {{ asset('assets/js/feather.min.js') }}"></script>
    <script src="  {{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="  {{ asset('assets/js/script.js') }}"></script>
</body>

</html>
