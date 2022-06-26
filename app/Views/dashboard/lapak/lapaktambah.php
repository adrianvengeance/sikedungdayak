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
                                        <h3 class="text-center font-weight-light my-4">Tambah Produk Lapak</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($validation->getErrors()) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/lapak/tambahprocess" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                                                <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" value="<?= old('nama') ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="desk" class="form-label">Deskripsi</label>
                                                <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="desk"><?= old('deskripsi'); ?></textarea>
                                                <div class="invalid-feedback"><?= $validation->getError('deskripsi'); ?></div>
                                            </div>
                                            <label for="harga" class="form-label">Harga</label><br>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                <input type="text" name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" aria-describedby="basic-addon1" id="harga" value="<?= old('harga') ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
                                            </div>
                                            <label for="no_wa" class="form-label">Nomor Whatsapp</label><br>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                                <input type="text" name="no_wa" class="form-control <?= ($validation->hasError('no_wa')) ? 'is-invalid' : ''; ?>" aria-describedby="basic-addon1" id="no_wa" value="<?= old('no_wa') ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('no_wa'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label row">
                                                    <div class="col-6">Gambar</div>
                                                    <div class="col-6 d-flex justify-content-end align-items-end small text-muted">Aspek rasio 1:1 akan lebih bagus</div>
                                                </label>
                                                <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" name="gambar" id="formFile" accept="image/png, image/gif, image/jpeg" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                                <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
                                                <img class="img-thumbnail rounded mx-auto d-block" id="pic">
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="submit">Tambah Produk</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/lapak">Cancel</a></div>
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