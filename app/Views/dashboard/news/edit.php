<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-11">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Edit Artikel</h3>
                  </div>
                  <div class="card-body">
                    <?php if (session()->getFlashdata('gambar')) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('gambar'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form action="/home/artikel/editprocess/<?= $isi['id_news'] ?>" method="post">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="judulberita" class="form-label">Judul Artikel</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="judulberita" value="<?= is_null(old('title')) ? $isi['title'] : old('title'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputauthor" class="form-label">Penulis</label>
                        <input type="text" name="author" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="inputauthor" value="<?= (is_null(old('author')) ? $user->name : old('author')) ?>">
                        <div class="invalid-feedback"><?= $validation->getError('author'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputcategory" class="form-label">Kategori</label>
                        <input list="category" class="form-control <?= $validation->hasError('category') ? 'is-invalid' : ''; ?>" name="category" id="inputcategory" value="<?= (is_null(old('category')) ? $isi['category'] : old('category')) ?>">
                        <datalist id="category">
                          <?php if (empty($kategori)) : ?>
                            <option value="Berita">Berita</option>
                            <option value="Artikel">Artikel</option>
                          <?php else : ?>
                            <?php foreach ($kategori as $n) : ?>
                              <option value="<?= $n['category']; ?>"><?= $n['category']; ?></option>
                            <?php endforeach; ?>
                          <?php endif ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('category'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="inputbody" class="form-label">Isi</label>
                        <textarea class="form-control <?= ($validation->hasError('body')) ? 'is-invalid' : ''; ?>" name="body" id="inputbody" spellcheck="false" style="min-height: 1000px;"><?= is_null(old('body')) ? $isi['body'] : old('body'); ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('body'); ?></div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="overlay mx-auto">
                          <img src="/kontenberita/<?= $isi['groupmonth'] . '/' . $isi['author'] . '/' . $isi['image'] ?>" class="gambar img-thumbnail rounded mx-auto d-block" alt="<?= $isi['image']; ?>">
                          <div class="tengah">
                            <a href="/home/artikel/edit/image/<?= $isi['id_news'] ?>" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Ganti</a>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <button type="submit" name="submit" class="btn btn-primary text-center mx-auto col-sm-4"><i class="fas fa-edit"></i> Perbarui Artikel</button>
                      </div>
                      <div class="row mt-1">
                        <a class="btn btn-danger text-center mx-auto col-sm-4" data-bs-toggle="modal" data-bs-target="#beritaDeleteModal"><i class="fas fa-trash-alt"></i> Hapus Artikel</a>
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
<!-- The Modal -->
<div class="modal fade" id="beritaDeleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete this article?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete "<?= $isi['title'] ?>".
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="/home/artikel/hapus/<?= $isi['id_news']; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>