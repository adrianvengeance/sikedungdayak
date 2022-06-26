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
                                        <h3 class="text-center font-weight-light my-4">Change Account Identity</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="row no-gutters">
                                                <?php if (session()->getFlashdata('pass')) : ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong><?= 'Error! '; ?></strong><?= session()->getFlashdata('pass'); ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                <?php endif ?>
                                                <form class="" action="/home/account/identitychange" method="post">
                                                    <?= csrf_field(); ?>

                                                    <div class="mb-3 row">
                                                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" name="name" id="name" value="<?= (is_null(old('name'))) ? $user->name : old('name'); ?>">
                                                            <div class="invalid-feedback"><?= $validation->getError('name'); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (is_null(old('username'))) ? $user->username : old('username'); ?>">
                                                            <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" name="password">
                                                            <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                                                            <input type="checkbox" onclick="spass('password');" class="mt-1"> Show password
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