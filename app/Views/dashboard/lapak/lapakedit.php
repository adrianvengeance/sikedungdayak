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
                    <h3 class="text-center font-weight-light my-4">Edit Produk Lapak</h3>
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
                    <form action="/home/lapak/editprocess/<?= $data->id_produk ?>" method="post" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" value="<?= (is_null(old('nama'))) ? $data->nama : old('nama') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                      </div>
                      <div class="mb-3">
                        <label for="desk" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="desk"><?= (is_null(old('deskripsi'))) ? $data->deskripsi : old('deskripsi'); ?></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('deskripsi'); ?></div>
                      </div>
                      <label for="harga" class="form-label">Harga</label><br>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" name="harga" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" aria-describedby="basic-addon1" id="harga" value="<?= (is_null(old('harga'))) ? $data->harga : old('harga'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
                      </div>
                      <label for="no_wa" class="form-label">Nomor Whatsapp</label><br>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" name="no_wa" class="form-control <?= ($validation->hasError('no_wa')) ? 'is-invalid' : ''; ?>" aria-describedby="basic-addon1" id="no_wa" value="<?= (is_null(old('no_wa'))) ? $data->no_wa : old('no_wa'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('no_wa'); ?></div>
                      </div>
                      <div class="input-group mb-3">
                        <div class="overlay mx-auto">
                          <img src="/produklapak/<?= $data->nama . '-0' . $data->no_wa . '/' . $data->gambar ?>" class="gambar img-thumbnail rounded mx-auto d-block" alt="<?= $data->gambar; ?>">
                          <div class="tengah">
                            <a href="/home/lapak/edit/image/<?= $data->id_produk ?>" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i> Ganti</a>
                          </div>
                        </div>
                      </div>


                      <div class="row mt-4">
                        <button type="submit" name="submit" class="btn btn-primary text-center mx-auto col-sm-4"><i class="fas fa-edit"></i> Perbarui Produk</button>
                      </div>
                      <div class="row mt-1">
                        <a class="btn btn-danger text-center mx-auto col-sm-4" data-bs-toggle="modal" data-bs-target="#lapakDeleteModal"><i class="fas fa-trash-alt"></i> Hapus Produk</a>
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
<!-- The Modal -->
<div class="modal fade" id="lapakDeleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete this product?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete <?= $data->nama ?>.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="/home/lapak/hapus/<?= $data->id_produk; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>