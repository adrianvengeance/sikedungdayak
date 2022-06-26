<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/Logo-Bantul-1x1-min.png') ?>" />
    <link href="<?= base_url('/assets/sb/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form method="POST" action="<?= site_url('/loginprocess') ?>">
                                        <?= csrf_field(); ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Abcdef" autofocus />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control passnih" id="inputPassword" type="password" name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <!-- <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <a class="btn btn-primary" href="index.html">Login</a>
                                        </div> -->
                                        <div class="d-flex align-items-center justify-content-between form-floating">
                                            <div>
                                                <input class="form-check-input" id="showPassword" type="checkbox" onclick="showpass()" />
                                                <label class="form-check-label" for="showPassword">Show Password</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary" href="">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div> -->
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/">Back</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('/assets/sb/js/scripts.js') ?>"></script>
    <script>
        var inputs = document.getElementsByTagName('inputPassword');
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].type == 'checkbox') {
                inputs[i].checked = false;
            }
        }

        function showpass() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>