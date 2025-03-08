<?php loadPartial("head"); ?>
<?php loadPartial('topbar'); ?>

<?php loadPartial('navbar'); ?>


<main class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <div class=" flex justify-center items-center mt-20">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 ">

            <h2 class="text-4xl text-center font-bold mb-4">
                Login
            </h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.4s">
                        <?=
                        loadPartial("errors", [
                            "errors" => $errors ?? []
                        ]);
                        ?>
                        <form method="POST" action="/auth/login">

                            <div class="col-12  mb-4">
                                <input type="email" name="email" class=" form-control border-0" placeholder="Your Email"
                                    required style="height: 55px;">
                            </div>
                            <div class="col-12  mb-4">
                                <input type="password" name="password" class="form-control border-0"
                                    placeholder="Your password" required minlength="4" style="height: 55px;">
                            </div>
                            <div class="col-12  mb-4">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Log In</button>
                            </div>

                            <p class="col-12  mb-4 text-white">
                                Don't have an account?
                                <a class="inline-block text-white" href="<?php echo URLROOT; ?>/register">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 bg-primary d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white weight-400">Do you need a new <br /> advertising area ?</h1>
                </div>
            </div>
        </div>
    </div>
</main>
<?php loadPartial("footer"); ?>