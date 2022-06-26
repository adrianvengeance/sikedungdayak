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
                                <div class="card shadow-lg border-0 rounded-lg mt-4">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Buat Pengunguman</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if (session()->getFlashdata('pengunguman')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= session()->getFlashdata('pengunguman'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/widget/pengungumanprocess" method="POST">
                                            <?= csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Isi</label>
                                                <input type="text" class="form-control <?= $validation->hasError('isi') ? 'is-invalid' : ''; ?>" name="isi" id="exampleInputEmail1">
                                                <div class="invalid-feedback"><?= $validation->getError('isi'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Waktu</label>
                                                <input type="datetime-local" class="form-control <?= $validation->hasError('waktu') ? 'is-invalid' : ''; ?>" name="waktu" id="exampleInputPassword1">
                                                <div class="invalid-feedback"><?= $validation->getError('waktu'); ?></div>
                                            </div>
                                            <div class="row mt-4">
                                                <button type="submit" class="btn btn-primary text-center mx-auto col-4">Buat</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/widget">Cancel</a></div>
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