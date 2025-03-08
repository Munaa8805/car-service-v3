<?php loadPartial("head"); ?>
<?php loadPartial('topbar'); ?>

<?php loadPartial('navbar'); ?>

<?php
$name = $email = $password = $confirm_password = "";



?>
<main class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="flex justify-center items-center mt-20">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
            <h2 class="text-4xl text-center font-bold" style="margin-bottom: 50px;">
                Register </h2>

            <div class="row">
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.4s">

                        <form method="POST" action="<?php echo URLROOT; ?>/users/register">
                            <div class=" col-12 mb-4">
                                <input type="text" name="name" class="form-control border-0" placeholder="Your name"
                                    required style="height: 55px;" value="<?php echo $name ?>">

                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="col-12  mb-4">
                                <input type="email" class="form-control border-0" name="email" placeholder="Your Email"
                                    required style="height: 55px;" value="<?php echo $email ?>">
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class=" col-12 mb-4">
                                <input type="password" name="password" class="form-control border-0"
                                    placeholder="Your password" required minlength="4" style="height: 55px;"
                                    value="<?php echo $password ?>">
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                            <div class="col-12  mb-4">
                                <input type="password" name="confirm_password" class=" form-control border-0"
                                    placeholder="Your confirm password" required minlength="4" style="height: 55px;"
                                    value="<?php echo $confirm_password ?>">
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                            <div class="col-12  mb-4">
                                <button class="btn btn-secondary w-100 py-3" type="submit"> Register</button>
                            </div>

                            <p class="col-12  mb-4 text-white">
                                Already have an account?
                                <a class="inline-block text-white" href="<?php echo URLROOT; ?>/login">Sign
                                    In</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 bg-primary d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white ">It is your advertising area</h1>
                </div>
            </div>
        </div>
    </div>
</main>

<?php loadPartial("footer"); ?>