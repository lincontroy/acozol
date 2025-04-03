
<!doctype html>
<html lang="en" data-bs-theme="dark-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Acozol</title>
  <!--favicon-->
  <link rel="icon" href="{{url('assets/assetss/images/favicon-32x32.png')}}" type="image/png">
  <!-- loader-->
	<link href="{{url('assets/assetss/css/pace.min.css')}}" rel="stylesheet">
	<script src="{{url('assets/assetss/js/pace.min.js')}}"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--plugins-->
  <link href="{{url('assets/assetss/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('assets/assetss/plugins/metismenu/metisMenu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('assets/assetss/plugins/metismenu/mm-vertical.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('assets/assetss/plugins/simplebar/css/simplebar.css')}}">
  <!--bootstrap css-->
  <link href="{{url('assets/assetss/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

  <link href="{{url('assets/assetss/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <!--main css-->
  <link href="{{url('assets/assetss/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{url('sass/main.css')}}" rel="stylesheet">
  <link href="{{url('sass/dark-theme.css')}}" rel="stylesheet">
  <link href="{{url('sass/blue-theme.css')}}" rel="stylesheet">
  <link href="{{url('sass/semi-dark.css')}}" rel="stylesheet">
  <link href="{{url('sass/bordered-theme.css')}}" rel="stylesheet">
  <link href="{{url('sass/responsive.css')}}" rel="stylesheet">

  <style>

.menu-title-wrapper {
            display: flex;
            align-items: center;
        }
        .copy-icon {
            margin-left: 10px;
            font-size: 18px;
            color: #6c757d; /* Bootstrap gray, adjust as needed */
        }
        .copy-icon:hover {
            color: #007bff; /* Bootstrap primary color on hover */
        }
    /* Dark mode adjustments for Toastr notifications */
.toast {
    background-color: #222 !important; /* Dark background */
    color: #fff !important; /* Light text */
    border-left: 5px solid #3498db !important; /* Accent color */
}

/* Customize Success Toastr */
.toast-success {
    background-color: #2ecc71 !important; /* Green */
    color: #fff !important;
}

/* Customize Error Toastr */
.toast-error {
    background-color: #e74c3c !important; /* Red */
    color: #fff !important;
}

/* Customize Warning Toastr */
.toast-warning {
    background-color: #f39c12 !important; /* Orange */
    color: #fff !important;
}

/* Customize Info Toastr */
.toast-info {
    background-color: #3498db !important; /* Blue */
    color: #fff !important;
}

/* Ensure close button is visible */
.toast-close-button {
    color: #fff !important;
    opacity: 1 !important;
}

/* Improve readability */
.toast-message {
    font-size: 14px;
}

  </style>

</head>

<body>

  <!--start header-->
  <header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
      <div class="btn-toggle">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
      </div>
      <div class="search-bar flex-grow-1">
        <div class="position-relative">
          <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
          <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
          <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
          <div class="search-popup p-3">
            <div class="card rounded-4 overflow-hidden">
              <div class="card-header d-lg-none">
                <div class="position-relative">
                  <input class="form-control rounded-5 px-5 mobile-search-control" type="text" placeholder="Search">
                  <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                  <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                 </div>
              </div>
              <div class="card-body search-content">
                <p class="search-title">Recent Searches</p>
                <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                  <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>Sass</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                  <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                      class="material-icons-outlined fs-6">search</i></a>
                </div>
                <hr>
                <p class="search-title">Tutorials</p>
                <div class="search-list d-flex flex-column gap-2">
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="list-icon">
                      <i class="material-icons-outlined fs-5">play_circle</i>
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                    </div>
                  </div>
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="list-icon">
                      <i class="material-icons-outlined fs-5">shopping_basket</i>
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                    </div>
                  </div>
  
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="list-icon">
                      <i class="material-icons-outlined fs-5">laptop</i>
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title">Responsive Design</h5>
                    </div>
                  </div>
                </div>
  
                <hr>
                <p class="search-title">Members</p>
  
                <div class="search-list d-flex flex-column gap-2">
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="memmber-img">
                      <img src="{{url('assets/assetss/avatar.png')}}" width="32" height="32" class="rounded-circle" alt="">
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                    </div>
                  </div>
  
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="memmber-img">
                      <img src="assets/images/avatars/02.png" width="32" height="32" class="rounded-circle" alt="">
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                    </div>
                  </div>
  
                  <div class="search-list-item d-flex align-items-center gap-3">
                    <div class="memmber-img">
                      <img src="assets/images/avatars/03.png" width="32" height="32" class="rounded-circle" alt="">
                    </div>
                    <div class="">
                      <h5 class="mb-0 search-list-title">Michle Clark</h5>
                    </div>
                  </div>
  
                </div>
              </div>
              <div class="card-footer text-center bg-transparent">
                <a href="javascript:;" class="btn w-100">See All Search Results</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item d-lg-none mobile-search-btn">
          <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;" data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22" alt="">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">English</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/02.png" width="20" alt=""><span class="ms-2">Catalan</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/03.png" width="20" alt=""><span class="ms-2">French</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/04.png" width="20" alt=""><span class="ms-2">Belize</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/05.png" width="20" alt=""><span class="ms-2">Colombia</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/06.png" width="20" alt=""><span class="ms-2">Spanish</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/07.png" width="20" alt=""><span class="ms-2">Georgian</span></a>
            </li>
            <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img src="assets/images/county/08.png" width="20" alt=""><span class="ms-2">Hindi</span></a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown position-static d-md-flex d-none">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
          data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">done_all</i></a>
          <div class="dropdown-menu dropdown-menu-end mega-menu shadow-lg p-4 p-lg-5">
            <div class="mega-menu-widgets">
             <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4 g-lg-5">
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <div class="mega-menu-icon flex-shrink-0 bg-danger">
                          <i class="material-icons-outlined">question_answer</i>
                        </div>
                        <div class="mega-menu-content">
                           <h5>Marketing</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/02.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Website</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/03.png" width="40" alt="">
                        <div class="mega-menu-content">
                            <h5>Subscribers</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/01.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Hubspot</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/11.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Templates</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/13.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Ebooks</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/12.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Sales</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/08.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Tools</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card rounded-4 shadow-none border mb-0">
                    <div class="card-body">
                      <div class="d-flex align-items-start gap-3">
                        <img src="assets/images/megaIcons/09.png" width="40" alt="">
                        <div class="mega-menu-content">
                           <h5>Academy</h5>
                           <p class="mb-0 f-14">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate
                             the visual form of a document.</p>
                        </div>
                     </div>
                    </div>
                  </div>
                </div>
             </div><!--end row-->
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
          <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
            <div class="border rounded-4 overflow-hidden">
              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/01.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Gmail</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/02.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Skype</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/03.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Slack</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/04.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">YouTube</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/05.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Google</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/06.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Instagram</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/07.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Spotify</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/08.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Yahoo</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/09.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Facebook</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/10.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Figma</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/11.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Paypal</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/12.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Photo</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
            <span class="badge-notify">0</span>
          </a>
          <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
           
            <div class="notify-list">
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="">
                      <img src="{{url('assets/assetss/avatar.png')}}" class="rounded-circle" width="45" height="45" alt="">
                    </div>
                    <div class="">
                      <h5 class="notify-title">Congratulations Jhon</h5>
                      <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                      <p class="mb-0 notify-time">Today</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                      <span>RS</span>
                    </div>
                    <div class="">
                      <h5 class="notify-title">New Account Created</h5>
                      <p class="mb-0 notify-desc">From USA an user has registered.</p>
                      <p class="mb-0 notify-time">Yesterday</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="">
                      <img src="assets/images/apps/13.png" class="rounded-circle" width="45" height="45" alt="">
                    </div>
                    <div class="">
                      <h5 class="notify-title">Payment Recived</h5>
                      <p class="mb-0 notify-desc">New payment recived successfully</p>
                      <p class="mb-0 notify-time">1d ago</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="">
                      <img src="assets/images/apps/14.png" class="rounded-circle" width="45" height="45" alt="">
                    </div>
                    <div class="">
                      <h5 class="notify-title">New Order Recived</h5>
                      <p class="mb-0 notify-desc">Recived new order from michle</p>
                      <p class="mb-0 notify-time">2:15 AM</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a class="dropdown-item border-bottom py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="">
                      <img src="assets/images/avatars/06.png" class="rounded-circle" width="45" height="45" alt="">
                    </div>
                    <div class="">
                      <h5 class="notify-title">Congratulations Jhon</h5>
                      <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.</p>
                      <p class="mb-0 notify-time">Today</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a class="dropdown-item py-2" href="javascript:;">
                  <div class="d-flex align-items-center gap-3">
                    <div class="user-wrapper bg-danger text-danger bg-opacity-10">
                      <span>PK</span>
                    </div>
                    <div class="">
                      <h5 class="notify-title">New Account Created</h5>
                      <p class="mb-0 notify-desc">From USA an user has registered.</p>
                      <p class="mb-0 notify-time">Yesterday</p>
                    </div>
                    <div class="notify-close position-absolute end-0 me-3">
                      <i class="material-icons-outlined fs-6">close</i>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </li>
       
        <li class="nav-item dropdown">
          <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
             <img src="{{url('assets/assetss/avator.png')}}" class="rounded-circle p-1 border" width="45" height="45" alt="">
          </a>
          <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
              <div class="text-center">
                <img src="{{url('assets/images/avatars/01.png')}}" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                  alt="">
                <h5 class="user-name mb-0 fw-bold">Hello, Jhon</h5>
              </div>
            </a>
            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">person_outline</i>Profile</a>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">local_bar</i>Setting</a>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">dashboard</i>Dashboard</a>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">account_balance</i>Earning</a>
              <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                class="material-icons-outlined">cloud_download</i>Downloads</a>
            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
            class="material-icons-outlined">power_settings_new</i>Logout</a>
          </div>
        </li>
      </ul>

    </nav>
  </header>
  <!--end top header-->

  @if(Auth::user()->status==0)


<br><br><br><br>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Your account has been banned!</strong> Please contact support@acozol.com for more information.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>

  @else

   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="assets/images/logo-icon.png" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Acozol</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">dashboard</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul>
                    <li><a href="{{ url('user/dashboard') }}"><i class="material-icons-outlined">chevron_right</i>Default</a></li>
                    <li><a href="{{ url('user/ads_center') }}"><i class="material-icons-outlined">chevron_right</i>Ads center</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">account_balance_wallet</i></div>
                    <div class="menu-title">Finances</div>
                </a>
                <ul>
                    <li><a href="{{ url('user/withdrawals') }}"><i class="material-icons-outlined">chevron_right</i>Withdrawals</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ url('user/deposit') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">attach_money</i></div>
                    <div class="menu-title">Deposit</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/packages') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i></div>
                    <div class="menu-title">Packages</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/premium') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">stars</i></div>
                    <div class="menu-title">Premium</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/addons') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">extension</i></div>
                    <div class="menu-title">Addons</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/affiliates') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">group</i></div>
                    <div class="menu-title">Affiliates</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/forex') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">show_chart</i></div>
                    <div class="menu-title">Forex Center</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/transfer') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">swap_horiz</i></div>
                    <div class="menu-title">Transfer funds</div>
                </a>
            </li>

            <li>
                <a href="{{ url('user/jobpostings') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">work</i>
                    </div>
                    <div class="menu-title">Jobs</div>
                </a>
            </li>
            <li>
            <a href="javascript:void(0);" id="monetizedButton" data-copy-text="{{ url('user/referral/') . Auth::user()->id }}" class="menu-item">
                <div class="menu-title-wrapper">
                    <div class="parent-icon"><i class="material-icons-outlined">monetization_on</i></div>
                    <div class="menu-title">Monetized</div>
                </div>
                <i class="material-icons-outlined copy-icon">content_copy</i>
            </a>
        </li>

            <li>
                <a href="mailto:support@acozol.com">
                    <div class="parent-icon"><i class="material-icons-outlined">support</i></div>
                    <div class="menu-title">Support</div>
                </a>
            </li>

            <li>
                <a href="" id="logout-button">
                    <div class="parent-icon"><i class="material-icons-outlined">logout</i></div>
                    <div class="menu-title">Logout</div>
                </a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
<script>
    document.getElementById('logout-button').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out of your account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>

<!--end sidebar-->

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
		
      @yield('content')



    </div>
  </main>
  <!--end main wrapper-->

  <!--start overlay-->
     <div class="overlay btn-toggle"></div>
  <!--end overlay-->

   <!--start footer-->
   <footer class="page-footer">
    <p class="mb-0">Copyright © 2025. All right reserved.</p>
  </footer>
  <!--end footer-->

  <!--start cart-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart">
    <div class="offcanvas-header border-bottom h-70">
      <h5 class="mb-0" id="offcanvasRightLabel">0 New Orders</h5>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
  
    <div class="offcanvas-footer h-70 p-3 border-top">
      <div class="d-grid">
        <button type="button" class="btn btn-grd btn-grd-primary" data-bs-dismiss="offcanvas">View Products</button>
      </div>
    </div>
  </div>
  <!--end cart-->



  <!--start switcher-->
  <button class="btn btn-grd btn-grd-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
    <i class="material-icons-outlined">tune</i>Customize
  </button>
  
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
    <div class="offcanvas-header border-bottom h-70">
      <div class="">
        <h5 class="mb-0">Theme Customizer</h5>
        <p class="mb-0">Customize your theme</p>
      </div>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div>
        <p>Theme variation</p>

        <div class="row g-3">
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
            <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="BlueTheme">
              <span class="material-icons-outlined">contactless</span>
              <span>Blue</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
            <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="LightTheme">
              <span class="material-icons-outlined">light_mode</span>
              <span>Light</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
            <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="DarkTheme">
              <span class="material-icons-outlined">dark_mode</span>
              <span>Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
            <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="SemiDarkTheme">
              <span class="material-icons-outlined">contrast</span>
              <span>Semi Dark</span>
            </label>
          </div>
          <div class="col-12 col-xl-6">
            <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
            <label class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4" for="BoderedTheme">
              <span class="material-icons-outlined">border_style</span>
              <span>Bordered</span>
            </label>
          </div>
        </div><!--end row-->

      </div>
    </div>
  </div>
  <!--start switcher-->

  <!--bootstrap js-->
  <script src="{{url('assets/assetss/js/bootstrap.bundle.min.js')}}"></script>

  <!--plugins-->
  <script src="{{url('assets/assetss/js/jquery.min.js')}}"></script>
  <!--plugins-->
  <script src="{{url('assets/assetss/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{url('assets/assetss/plugins/metismenu/metisMenu.min.js')}}"></script>
  <script src="{{url('assets/assetss/plugins/apexchart/apexcharts.min.js')}}"></script>
  <script src="{{url('assets/assetss/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{url('assets/assetss/plugins/peity/jquery.peity.min.js')}}"></script>
  <script src="{{url('assets/assetss/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="{{url('assets/assetss/js/main.js')}}"></script>
  <script src="{{url('assets/assetss/js/dashboard1.js')}}"></script>
  <script>
	   new PerfectScrollbar(".user-list")
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
        $(document).ready(function () {
            $('#monetizedButton').on('click', function (e) {
                e.preventDefault(); // Prevent default link behavior

                const baseUrl = "{{ url('user/') }}"; // Get the base URL of the site
              const referralCode = "{{ Auth::user()->username }}"; // Get user's referral code
              const textToCopy = `${baseUrl}/register?ref=${referralCode}`; // Create affiliate link


                // const textToCopy = $(this).data('copy-text'); // Get the text to copy from data attribute

                // Use Clipboard API to copy text
                navigator.clipboard.writeText(textToCopy).then(function () {
                    // Show SweetAlert on successful copy
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'Referral link copied to clipboard: ' + textToCopy,
                        showConfirmButton: true,
                        timer: 3000, // Auto-close after 3 seconds
                        timerProgressBar: true
                    });
                }).catch(function (error) {
                    // Show error if copy fails
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to copy text: ' + error,
                    });
                });
            });
        });
    </script>


<script>
    @if (session('success'))
        toastr.success('{{ session('success') }}');
    @endif

    @if (session('error'))
        toastr.error('{{ session('error') }}');
    @endif

    @if (session('info'))
        toastr.info('{{ session('info') }}');
    @endif

    @if (session('warning'))
        toastr.warning('{{ session('warning') }}');
    @endif
</script>
@endif
</body>

</html>