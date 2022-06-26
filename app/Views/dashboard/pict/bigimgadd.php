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
                    <h3 class="text-center font-weight-light my-4">Tambah Gambar Besar</h3>
                  </div>
                  <div class="card-body">
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form action="/home/pictures/bigimg/addprocess" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" value="<?= old('title') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="desk" class="form-label">Sub judul</label>
                        <input type="text" class="form-control <?= ($validation->hasError('subtitle')) ? 'is-invalid' : ''; ?>" name="subtitle" id="desk"><?= old('subtitle'); ?>
                        <div class="invalid-feedback"><?= $validation->getError('subtitle'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label row">
                          <div class="col-6">Gambar</div>
                          <!-- <div class="col-6 d-flex justify-content-end align-items-end small text-muted">Aspek rasio 1:1 akan lebih bagus</div> -->
                        </label>
                        <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" name="gambar" id="formFile" accept="image/png, image/gif, image/jpeg" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                        <div class="invalid-feedback"><?= $validation->getError('gambar'); ?></div>
                        <img class="img-thumbnail rounded mx-auto d-block" id="pic">
                      </div>
                      <div class="mt-4 mb-0">
                        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="submit">Tambah Gambar</button></div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small"><a href="/home/pictures">Cancel</a></div>
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