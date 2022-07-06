<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <div class="col-md-6">
          <button class="btn disabled ps-0">
            <h5><i class="far fa-images"></i><span class="ms-2">Gambar</span></h5>
          </button>
        </div>
      </div>
      <div class="card-body container">
        <div class="row d-flex">
          <?php if (session()->getFlashdata('pictures')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('pictures'); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <div class="col-12">
            <div class="row">
              <div class="col-md-6">
                <button class="btn disabled ps-0">
                  <h6><i class="fas fa-image"></i><span class="ms-2">Big Image</span></h6>
                </button>
              </div>
              <div class="col-md-6">
                <div class="d-md-none">
                  <div class="text-center row px-3">
                    <a class="btn btn-primary text-white btn-sm" href="/home/pictures/bigimg/add" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="d-none d-md-block">
                  <div class="float-end mt-2">
                    <a class="btn btn-primary text-white btn-sm" href="/home/pictures/bigimg/add" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <table id="info" class="compact">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($bigimg)) : ?>
                  <?php foreach ($bigimg as $n => $value) : ?>
                    <tr>
                      <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                      <td class="align-middle"><img src="/gambar/bigimg/<?= $value['gambar'] ?> " class="rounded mx-auto d-block" alt="<?= $value['gambar']; ?>" style="max-width: 100px; max-height: 100px;"></td>
                      <td class="align-middle"><?= $value['title']; ?></td>
                      <td class="align-middle"><?= $value['subtitle']; ?></td>
                      <td class="align-middle"><?= $value['updated_at']; ?></td>
                      <td class="align-middle">
                        <a class="btn btn-sm" href="/home/pictures/bigimg/edit/<?= $value['id']; ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="col-md-6">
                <button class="btn disabled ps-0">
                  <h6><i class="fas fa-portrait"></i><span class="ms-2">Small Images Carousel</span></h6>
                </button>
              </div>
              <div class="col-md-6">
                <div class="d-md-none">
                  <div class="text-center row px-3">
                    <a class="btn btn-primary text-white btn-sm" href="/home/pictures/smallimg/add" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
                <div class="d-none d-md-block">
                  <div class="float-end mt-2">
                    <a class="btn btn-primary text-white btn-sm" href="/home/pictures/smallimg/add" style="width: 50px;"><i class="fas fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <table id="widget" class="compact">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Urutan</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($bmee)) : ?>
                  <?php foreach ($bmee as $n => $value) : ?>
                    <tr>
                      <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                      <td class="align-middle">
                        <a class="btn btn-sm" href="#" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                      </td>
                      <td class="align-middle"><?= $value['isi']; ?></td>
                      <td class="align-middle"><?= $value['waktu']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- The Modal -->
<div class="modal fade" id="pictModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete.
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