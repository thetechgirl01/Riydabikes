<?php $__env->startSection('title', 'Sign up'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7 col-lg-6 px-lg-4 px-xl-8 d-flex flex-column vh-100 py-6">
            <?php if(Session::has('status')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('status')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <a href="/" class="navbar-brand mb-auto">
                <img src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>" alt="Logo" class="logo-large"
                    width="125" height="25">
            </a>

            <div>
                <!-- Title -->
                <h1 class="mb-2">
                    Free Sign Up
                </h1>

                <!-- Subtitle -->
                <p class="text-secondary">
                    Don't have an account? Create your account, it takes less than a minute
                </p>

                <!-- Form -->
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Username
                                </label>
                                <!-- Input -->
                                <input type="text" id="username" class="form-control" name="username"
                                    placeholder="Your username" required>
                            </div>
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Full name
                                </label>
                                <!-- Input -->
                                <input type="text" class="form-control" name="name" placeholder="Your full name"
                                    required>
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Email
                                </label>
                                <!-- Input -->
                                <input type="text" class="form-control" name="email" placeholder="Your email" required>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Phone Number
                                </label>
                                <!-- Input -->
                                <input type="text" class="form-control" name="phone" placeholder="Your phone number"
                                    required>
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Country
                                </label>
                                <select class="form-select" name="country" required>
                                    <option>Choose Country</option>
                                    <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php if(Session::has('ref_by')): ?>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <!-- Label -->
                                    <label class="form-label">
                                        Referral ID
                                    </label>
                                    <!-- Input -->
                                    <input type="text" class="form-control" value="<?php echo e(session('ref_by')); ?>"
                                        name="ref_by" required>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <!-- Label -->
                                    <label class="form-label">
                                        Referral ID (Optional)
                                    </label>
                                    <!-- Input -->
                                    <input type="text" class="form-control" name="ref_by" placeholder=" referral id">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($settings->captcha == 'true'): ?>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <!-- Label -->
                                    <label class="form-label">
                                        Captcha
                                    </label>
                                    <div class="position-relative">
                                        <?php echo NoCaptcha::display(); ?>

                                    </div>
                                </div>
                                <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        <?php endif; ?>

                    </div> <!-- / .row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Password
                                </label>

                                <!-- Input -->
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" autocomplete="off"
                                        data-toggle-password-input placeholder="Your password" name="password" required>

                                    <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                        data-toggle-password></button>
                                </div>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-4">
                                <!-- Label -->
                                <label class="form-label">
                                    Confirm password
                                </label>
                                <!-- Input -->
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" autocomplete="off"
                                        data-toggle-password-input placeholder="Your password again"
                                        name="password_confirmation" required>

                                    <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                        data-toggle-password></button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                    <?php if($terms->useterms == 'yes'): ?>
                        <div class="form-check">
                            <!-- Input -->
                            <input type="checkbox" class="form-check-input" id="agree" required>

                            <!-- Label -->
                            <label class="form-check-label" for="agree">
                                I agree with <a href="<?php echo e(route('privacy')); ?>">Terms & Conditions</a> and have understood
                                <a href="javascript: void(0);">Privacy Policy</a>
                            </label>
                        </div>
                    <?php endif; ?>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary mt-3">
                        Get started
                    </button>
                </form>
                <?php if($settings->enable_social_login == 'yes'): ?>
                    <div class="my-2 text-center">
                        <small>Or</small>
                        <div class="row">
                            <!--end col-->
                            <div class="col-12 my-3">
                                <a href="<?php echo e(route('social.redirect', ['social' => 'google'])); ?>"
                                    class="btn btn-sm btn-danger">
                                    <i class="bi bi-google"></i> Sign up with
                                    Google</a>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-auto">
                <!-- Link -->
                <small class="mb-0 text-muted">
                    Already registered? <a href="<?php echo e(route('login')); ?>" class="fw-semibold">Login</a>
                </small>
            </div>
        </div>

        <div class="col-md-5 col-lg-6 d-none d-lg-block">
            <!-- Image -->
            <div class="bg-size-cover bg-position-center bg-repeat-no-repeat overlay overlay-dark overlay-50 vh-100 me-n4"
                style="background-image: url(themes/dashly/assets/images/covers/sign-up-cover.jpg);"></div>
        </div>
    </div> <!-- / .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlinetrader\resources\views/auth/register.blade.php ENDPATH**/ ?>