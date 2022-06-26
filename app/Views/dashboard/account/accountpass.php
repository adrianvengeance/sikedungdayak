<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Change Account Password</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="row no-gutters">
                                                <?php if (session()->getFlashdata('errorpass')) : ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Error!</strong> <?= session()->getFlashdata('errorpass'); ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                <?php endif ?>

                                                <form class="" action="/home/account/passwordchange" method="post">
                                                    <?= csrf_field(); ?>

                                                    <div class="mb-3 row">
                                                        <label for="oldpass" class="col-sm-4 col-form-label">Old Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control <?= $validation->hasError('oldpass') ? 'is-invalid' : ''; ?>" name="oldpass" id="oldpass">
                                                            <div class="invalid-feedback"><?= $validation->getError('oldpass'); ?></div>
                                                            <input type="checkbox" onclick="spass('oldpass');"><span class="small"> Show password</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="password1" class="col-sm-4 col-form-label">New Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control <?= $validation->hasError('password1') ? 'is-invalid' : ''; ?>" id="password1" name="password1" value="<?= old('password1'); ?>">
                                                            <div class="invalid-feedback"><?= $validation->getError('password1'); ?></div>
                                                            <input type="checkbox" onclick="spass('password1');"><span class="small"> Show password</span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="password2" class="col-sm-4 col-form-label">Verify Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : ''; ?>" id="password2" name="password2">
                                                            <div class="invalid-feedback"><?= $validation->getError('password2'); ?></div>
                                                            <input type="checkbox" onclick="spass('password2');"><span class="small"> Show password</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <button type="submit" class="btn text-center btn-primary mx-auto col-4">Change</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/account">Cancel</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>