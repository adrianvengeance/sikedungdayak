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
                                        <h3 class="text-center font-weight-light my-4">Ganti Gambar Berita</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($validation->getErrors()) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/berita/edit/imageprocess/<?= $isi['id_news'] ?>" method="post" onchange="loadFile(event)" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <label for="formFile" class="form-label">Gambar</label>
                                            <div class="input-group">
                                                <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" name="gambar" id="formFile" accept="image/png, image/gif, image/jpeg">
                                                <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <img class="img-thumbnail rounded mx-auto d-block" id="previewimg">
                                            </div>
                                            <div class="row mt-4">
                                                <button type="submit" name="submit" class="btn btn-primary text-center mx-auto col-sm-4">Perbarui Gambar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/berita/edit/<?= $isi['id_news']; ?>">Cancel</a></div>
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