    <!-- Footer Start -->
    <?php

    use Framework\Database;

    $config = require basePath('config/db.php');
    $db = new Database($config);
    $query = $db->query("SELECT * FROM contact");
    $servicequery = $db->query("SELECT * FROM service");
    $settings = $query->fetch();
    $services = $servicequery->fetchAll();
    // inspect($settings);


    ?>
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                        <?php echo "{$settings->address}, {$settings->street}, {$settings->city}" ?> </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>
                        <?php echo "{$settings->phone}" ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>
                        <?php echo "{$settings->email}" ?>
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4">
                        <?php echo "{$settings->weekdays}" ?>
                    </p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0">
                        <?php echo "{$settings->weekends}" ?>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <?php foreach ($services as $service): ?>
                    <a class="btn btn-link" href="<?php echo URLROOT; ?>/service"><?php echo "{$service->name}" ?></a>
                    <?php endforeach; ?>

                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <!-- <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <a class="border-bottom" href="/">
                            <?php echo "{$settings->email}" ?> </a>, &copy; All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://munaa.me">Munaa Tsetsegmaa</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="<?php echo URLROOT; ?>/">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/wow/wow.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/easing/easing.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/counterup/counterup.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?php echo URLROOT; ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
    </body>

    </html>