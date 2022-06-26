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
                    <h3 class="text-center font-weight-light my-4">Edit Gambar</h3>
                  </div>
                  <div class="card-body">
                    <?php if (session()->getFlashdata('gambar')) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('gambar'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= 'Error!' ?></strong> <?= 'Silakan masukan kembali input yang sesuai.'; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif ?>
                    <form action="/home/pictures/bigimg/editprocess/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" value="<?= (is_null(old('title'))) ? $data['title'] : old('title') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sub Judul</label>
                        <input type="text" name="subtitle" class="form-control <?= ($validation->hasError('subtitle')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" value="<?= (is_null(old('subtitle'))) ? $data['subtitle'] : old('subtitle') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('subtitle'); ?></div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="overlay mx-auto">
                          <img src="/gambar/bigimg/<?= $data['gambar'] ?>" class="gambar img-thumbnail rounded mx-auto d-block" alt="<?= $data['gambar']; ?>" id="pic">
                          <div class="tengah">
                            <!-- <a href="" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Ganti</a> -->
                            <input type="file" name="newimg" id="formFile" accept="image/png, image/gif, image/jpeg" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                          </div>
                        </div>
                      </div>


                      <div class="row mt-4">
                        <button type="submit" name="submit" class="btn btn-primary text-center mx-auto col-sm-4"><i class="fas fa-edit"></i> Perbarui</button>
                      </div>
                      <div class="row mt-1">
                        <a class="btn btn-danger text-center mx-auto col-sm-4" data-bs-toggle="modal" data-bs-target="#bigimgmodal"><i class="fas fa-trash-alt"></i> Hapus </a>
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
<!-- The Modal -->
<div class="modal fade" id="bigimgmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete this image?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete <?= $data['title'] ?>.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>