<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <!-- Custom fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?= base_url('templates/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-200">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 bg-gray-400">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" style="font-family: 'Nunito', sans-serif; font-weight: 700;">
                                <i class="fas fa-graduation-cap"></i> Perpustakaan<br>SMPN 1 Gunung Agung
                            </h1>
                        </div>

                        <!-- Display error messages -->
                        <?php if ($error = session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger flash-message">
                                <?= esc($error) ?>
                            </div>
                        <?php endif; ?>

                        <form class="user" action="<?= site_url('/login') ?>" method="post">
                            <?= csrf_field(); ?>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control <?= session('validation.username') ? 'is-invalid' : '' ?>" 
                                           placeholder="Username" name="username" value="<?= old('username') ?>" style="font-family: 'Nunito', sans-serif;">
                                    <div class="invalid-feedback">
                                        <?= session('validation.username') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control <?= session('validation.password') ? 'is-invalid' : '' ?>" 
                                           placeholder="Password" name="password" style="font-family: 'Nunito', sans-serif;">
                                    <div class="invalid-feedback">
                                        <?= session('validation.password') ?>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" style="font-family: 'Nunito', sans-serif; font-weight: 700; font-size: 16px;">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('templates/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('templates/js/sb-admin-2.min.js') ?>"></script>
    <script>
        // Automatically hide flash messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                const flashMessages = document.querySelectorAll('.flash-message');
                flashMessages.forEach(message => {
                    message.style.transition = 'opacity 0.5s';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500); // Remove after fade out
                });
            }, 5000);
        });
    </script>
</body>

</html>
