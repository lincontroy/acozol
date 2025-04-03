<!doctype html>
<html lang="en" data-bs-theme="dark-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acozol </title>
    <!--favicon-->
    <link rel="icon" href="{{ url('assets/assetss/images/favicon-32x32.png') }}"
        type="image/png">
    <!-- loader-->
    <link href="{{ url('assets/assetss/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ url('assets/assetss/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link
        href="{{ url('assets/assetss/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/assetss/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/assetss/plugins/metismenu/mm-vertical.css') }}">
    <!--bootstrap css-->
    <link href="{{ url('assets/assetss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ url('assets/assetss/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ url('sass/main.css') }}" rel="stylesheet">
    <link href="{{ url('sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ url('sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ url('sass/responsive.css') }}" rel="stylesheet">

</head>

<body>

    <!--authentication-->
    <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
        <div class="container-fluid my-5 my-lg-0">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-5">
                            <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
                            <h4 class="fw-bold">Get Started Now</h4>
                            <p class="mb-0">Enter your credentials to login your account</p>

                            <div class="form-body my-5">
                                <form class="row g-3" action="{{ route('user.loginn') }}" method="POST">

                                    @csrf

                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}</div>
                                    @endif

                                    @if($errors->has('login_error'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('login_error') }}</div>
                                    @endif
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmailAddress"
                                            placeholder="jhon@example.com" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password">
                                            <button type="button" class="input-group-text bg-transparent border-0" id="togglePassword">
                                                <i class="bi bi-eye-slash-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end"> <a href="{{url('user/password/reset')}}">Forgot
                                            Password ?</a>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-grd-primary" id="regPreviewButton" style="color:white">Login</button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="text-start">
                                            <p class="mb-0">Don't have an account yet? <a
                                                    href="{{url('user/register')}}">Sign up here</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--authentication-->


    <!--plugins-->
    <script src="{{ url('assets/assetss/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });

            $("#togglePassword").on("click", function () {
            let passwordField = $("#inputChoosePassword");
            let icon = $(this).find("i");

            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                icon.removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
            } else {
                passwordField.attr("type", "password");
                icon.removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
            }
        });
        });

    </script>

</body>

</html>
