<!doctype html>
<html lang="en" data-bs-theme="dark-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acozol</title>
    <link rel="icon" href="{{ url('assets/assetss/images/favicon-32x32.png') }}" type="image/png">
    <link href="{{ url('assets/assetss/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ url('assets/assetss/js/pace.min.js') }}"></script>
    <link href="{{ url('assets/assetss/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/assetss/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/assetss/plugins/metismenu/mm-vertical.css') }}">
    <link href="{{ url('assets/assetss/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{ url('assets/assetss/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ url('sass/main.css') }}" rel="stylesheet">
    <link href="{{ url('sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ url('sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ url('sass/responsive.css') }}" rel="stylesheet">
</head>

<body>

<?php
    $ref = request()->ref;
    if($ref == null){
        $ref = "rootuser";
    }
?>

    <!-- Registration Section -->
    <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
        <div class="container-fluid my-5 my-lg-0">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-5">
                            <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
                            <h4 class="fw-bold">Get Started Now</h4>
                            <p class="mb-0">Create an account to proceed</p>

                            <div class="form-body my-5">
                                <form class="row g-3" id="registrationForm" action="{{ route('user.registerr') }}" method="POST">
                                    @csrf

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    @if($errors->has('login_error'))
                                        <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
                                    @endif

                                    <div class="col-12">
                                        <label for="regEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="regEmail" name="email" placeholder="jhon@example.com">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="regFirstName" name="firstname" placeholder="John">
                                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="regLastName" name="lastname" placeholder="Doe">
                                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="regUsername" name="username" placeholder="john">
                                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regMobile" class="form-label">Mobile No</label>
                                        <input type="tel" class="form-control" id="regMobile" name="mobile" placeholder="0734899585" pattern="[0-9]{10}" required>
                                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regReferredBy" class="form-label">Referred By</label>
                                        <input type="text" class="form-control" id="regReferredBy" name="referredby" value="{{$ref}}" readonly>
                                        @error('referredby') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="regPassword" class="form-label">Password</label>
                                        <div class="input-group" id="reg_show_hide_password">
                                            <input type="password" class="form-control border-end-0" id="regPassword" name="password" placeholder="Enter Password">
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="regConfirmPassword" class="form-label">Confirm Password</label>
                                        <div class="input-group" id="reg_show_hide_password_confirm">
                                            <input type="password" class="form-control border-end-0" id="regConfirmPassword" name="password_confirmation" placeholder="Enter Password">
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="regTermsCheckbox" name="terms">
                                            <label class="form-check-label" for="regTermsCheckbox">
                                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
                                            </label>
                                            @error('terms') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-grd-primary" id="regPreviewButton" disabled style="color:white">Preview Details</button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-start">
                                            <p class="mb-0">Already have an account? <a href="{{url('user/login')}}">Login</a></p>
                                        </div>
                                    </div>
                                </form>

                                <!-- Registration Preview Section -->
                                <div id="regPreviewSection" class="mt-4" style="display: none;">
                                    <h5>Confirm Your Registration Details</h5>
                                    <div class="card p-3">
                                        <p><strong>Email:</strong> <span id="regPreviewEmail"></span></p>
                                        <p><strong>First Name:</strong> <span id="regPreviewFirstName"></span></p>
                                        <p><strong>Last Name:</strong> <span id="regPreviewLastName"></span></p>
                                        <p><strong>Username:</strong> <span id="regPreviewUsername"></span></p>
                                        <p><strong>Mobile No:</strong> <span id="regPreviewMobile"></span></p>
                                        <p><strong>Referred By:</strong> <span id="regPreviewReferredBy"></span></p>
                                        <p><strong>Password:</strong> <span id="regPreviewPassword">[Hidden for security]</span></p>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                        <button type="button" class="btn btn-secondary" id="regEditButton">Edit</button>
                                        <button type="submit" class="btn btn-grd-primary" id="regSubmitButton" form="registrationForm" style="color:white">Confirm & Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please read these terms and conditions carefully before using our service:</p>
                    <ul>
                        <li>You must be at least 18 years old to use this service</li>
                        <li>All provided information must be accurate and complete</li>
                        <li>You are responsible for maintaining the confidentiality of your account</li>
                        <li>We reserve the right to modify these terms at any time</li>
                        <li>Unauthorized use of this service is prohibited</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--plugins-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ url('assets/assetss/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Password toggle function
            function togglePassword(inputId, iconElement) {
                $(iconElement).on('click', function (event) {
                    event.preventDefault();
                    const input = $(inputId);
                    if (input.attr("type") === "text") {
                        input.attr('type', 'password');
                        $(this).find('i').addClass("bi-eye-slash-fill").removeClass("bi-eye-fill");
                    } else {
                        input.attr('type', 'password');
                        input.attr('type', 'text');
                        $(this).find('i').removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
                    }
                });
            }

            // Registration password toggles
            togglePassword('#regPassword', '#reg_show_hide_password a');
            togglePassword('#regConfirmPassword', '#reg_show_hide_password_confirm a');
            // Login password toggle
            togglePassword('#loginPassword', '#login_show_hide_password a');

            // Terms checkbox functionality
            $('#regTermsCheckbox').on('change', function() {
                $('#regPreviewButton').prop('disabled', !this.checked);
            });
            $('#loginTermsCheckbox').on('change', function() {
                $('#loginPreviewButton').prop('disabled', !this.checked);
            });

            // Registration preview
            $('#regPreviewButton').on('click', function() {
                $('#registrationForm').hide();
                $('#regPreviewSection').show();
                $('#regPreviewEmail').text($('#regEmail').val());
                $('#regPreviewFirstName').text($('#regFirstName').val());
                $('#regPreviewLastName').text($('#regLastName').val());
                $('#regPreviewUsername').text($('#regUsername').val());
                $('#regPreviewMobile').text($('#regMobile').val());
                $('#regPreviewReferredBy').text($('#regReferredBy').val());
            });

            $('#regEditButton').on('click', function() {
                $('#regPreviewSection').hide();
                $('#registrationForm').show();
            });

            // Login preview
            $('#loginPreviewButton').on('click', function() {
                $('#loginForm').hide();
                $('#loginPreviewSection').show();
                $('#loginPreviewEmail').text($('#loginEmail').val());
            });

            $('#loginEditButton').on('click', function() {
                $('#loginPreviewSection').hide();
                $('#loginForm').show();
            });
        });
    </script>

</body>
</html>