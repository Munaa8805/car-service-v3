<?php

use Framework\Session;
?>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>
            <?php echo SITENAME; ?>
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?php echo URLROOT; ?>"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/' ? 'active' : '') ?>">Home
            </a>

            <a href="<?php echo URLROOT; ?>/about"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/about' ? 'active' : '') ?>">About</a>
            <a href="<?php echo URLROOT; ?>/service"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/service' ? 'active' : '') ?>">Services</a>

            <a href="<?php echo URLROOT; ?>/contact"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/contact' ? 'active' : '') ?>">Contact</a>
            <?php



            if (Session::has("user")) : ?>
            <div class="login">
                <a href=" <?php echo URLROOT; ?>/detail"
                    class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/detail' ? 'active' : '') ?>">
                    Welcome, <?= Session::get("user")['name'] ?>!</a>
                <form method="POST" action="/auth/logout">
                    <button type="submit">
                        Logout</button>
                </form>
            </div>
            <?php else: ?>
            <a href="<?php echo URLROOT; ?>/auth/register"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/register' ? 'active' : '') ?>">
                Register</a>
            <a href="<?php echo URLROOT; ?>/auth/login"
                class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/login' ? 'active' : '') ?>">Login</a>
            <?php endif; ?>



        </div>
        <div>

        </div>
    </div>
</nav>
<!-- Navbar End -->