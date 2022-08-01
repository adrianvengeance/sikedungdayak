<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Tambah Artikel</h3>
                  </div>
                  <div class="card-body">
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form action="/home/artikel/tambahprocess" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="judulberita" class="form-label">Judul Artikel</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="judulberita" value="<?= old('title') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputauthor" class="form-label">Penulis</label>
                        <input type="text" name="author" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="inputauthor" value="<?= (is_null(old('author')) ? $user->name : old('author')) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('author'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputcategory" class="form-label">Kategori</label>
                        <input list="category" class="form-control <?= $validation->hasError('category') ? 'is-invalid' : ''; ?>" name="category" id="inputcategory" value="<?= old('category') ?>">
                        <datalist id="category">
                          <?php foreach ($kategori as $n) : ?>
                            <option value="<?= $n->category; ?>"><?= $n->category; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('category'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputbody" class="form-label">Isi Artikel</label>
                        <textarea class="form-control <?= ($validation->hasError('body')) ? 'is-invalid' : ''; ?>" name="body" id="inputbody" spellcheck="false" style="min-height: 700px;"><?= old('body'); ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('body'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Gambar</label>
                        <input class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" type="file" name="image" id="formFile" accept="image/png, image/gif, image/jpeg" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                        <div class="invalid-feedback"><?= $validation->getError('image'); ?></div>
                        <img class="img-thumbnail rounded mx-auto d-block" id="pic">
                      </div>

                      <div class="row mt-4">
                        <button type="submit" name="submit" class="btn btn-primary text-center mx-auto col-sm-4">Tambah Artikel</button>
                      </div>

                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small"><a href="/home/artikel">Cancel</a></div>
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