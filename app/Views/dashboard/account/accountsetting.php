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
                                        <h3 class="text-center font-weight-light my-4">Account Settings</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="row no-gutters">
                                                <?php if (session()->getFlashdata('berhasil')) : ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Sukses!</strong> <?= session()->getFlashdata('berhasil'); ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                <?php endif ?>
                                                <div class="col-sm-4">
                                                    <div class="text-center">
                                                        <i class="fas fa-10x fa-user mt-1" style="display: inline-block; width: 145px; height: 100%; text-align: center; vertical-align: bottom; color:#3B61D1;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="card-body">

                                                        <dl class="row">
                                                            <dt class="col-sm-4">Name</dt>
                                                            <dd class="col-sm-8"><?= $user->name; ?></dd>

                                                            <dt class="col-sm-4">Username</dt>
                                                            <dd class="col-sm-8"><?= $user->username; ?></dd>

                                                            <dt class="col-sm-4">Level</dt>
                                                            <dd class="col-sm-8"><?= $user->level; ?></dd>
                                                        </dl>
                                                        <a href="/home/account/identity" class="btn btn-secondary btn-sm py-0">Change Identities</a>
                                                        <a href="/home/account/password" class="btn btn-secondary btn-sm py-0">Change Password</a><br>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-danger btn-sm py-0">Logout</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home">Back</a></div>
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