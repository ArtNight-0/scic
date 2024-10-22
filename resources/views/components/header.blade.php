<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/Dashboard/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 40px;">
        </a>

        <div class="d-flex ms-auto user-info align-items-center">
            <span class="me-2 d-none d-lg-inline">Hi, Username</span>
            <img src="{{ asset('assets/img/Dashboard/user.png') }}" alt="user foto" class="dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="max-height: 30px;">

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
