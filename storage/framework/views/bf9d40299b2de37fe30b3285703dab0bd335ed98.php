<?php $__env->startSection('title', 'Login account'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6 shadow-sm">
            <?php if(Session::has('status')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo e(session('status')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="text-center">
                <a href="/">
                    <img src="<?php echo e(asset('storage/app/public/' . $settings->logo)); ?>" alt="Logo" class="w-50">
                </a>
            </div>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Sign In
            </h1>

            <!-- Subtitle -->
            <p class="text-secondary text-center">
                Enter your email address and password to access your account.
            </p>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Email Address
                            </label>
                            <!-- Input -->
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                                placeholder="Your email address">
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
                    </div>

                    <div class="col-12">
                        <!-- Password -->
                        <div class="mb-4">

                            <div class="row">
                                <div class="col">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>
                                </div>

                                <div class="col-auto">

                                    <!-- Help text -->
                                    <a href="<?php echo e(route('password.request')); ?>"
                                        class="form-text small text-muted link-primary">Forgot password</a>
                                </div>
                            </div> <!-- / .row -->

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password" name="password">

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->

                <div class="form-check">
                    <!-- Input -->
                    <input type="checkbox" class="form-check-input" name="remember">
                    <!-- Label -->
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <div class="row align-items-center text-center">
                    <div class="col-12">

                        <!-- Button -->
                        <button type="submit" class="btn w-100 btn-primary mt-6 mb-2">Sign in</button>
                    </div>

                    <div class="col-12">

                        <!-- Link -->
                        <small class="mb-0 text-muted">Don't have an account yet? <a href="<?php echo e(route('register')); ?>"
                                class="fw-semibold">Sign up</a></small>
                    </div>
                </div> <!-- / .row -->
            </form>
            <?php if($settings->enable_social_login == 'yes'): ?>
                <div class="my-2 text-center">
                    <small>Or</small>
                    <div class="row">
                        <!--end col-->
                        <div class="col-12 my-3">
                            <a href="<?php echo e(route('social.redirect', ['social' => 'google'])); ?>" class="btn btn-sm btn-danger">
                                <i class="bi bi-google"></i> Sign in with
                                Google</a>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div> <!-- / .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlinetrader\resources\views/auth/login.blade.php ENDPATH**/ ?>