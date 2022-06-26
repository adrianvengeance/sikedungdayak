<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <div class="col-md-6">
          <button class="btn disabled ps-0">
            <h5><i class="fas fa-user"></i><span class="ms-2"> Akun</span></h5>
          </button>
        </div>
        <div class="col-md-6">
          <div class="d-md-none">
            <div class="text-center row px-3">
              <a class="btn btn-primary text-white btn-sm <?= ($user->level == 'Admin') ? 'disabled' : '' ?>" href="/home/register"><i class="fas fa-plus"></i> Tambah Akun</a>
            </div>
          </div>
          <div class="d-none d-md-block">
            <div class="float-end mt-2">
              <a class="btn btn-primary text-white btn-sm <?= ($user->level == 'Admin') ? 'disabled' : '' ?>" href="/home/register"><i class="fas fa-plus"></i> Tambah Akun</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('akun')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('akun'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('akunError')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= 'Error!' ?></strong> <?= session()->getFlashdata('akunError'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <table id="info" class="compact">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($data)) : ?>
              <?php foreach ($data as $n => $value) : ?>
                <tr>
                  <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                  <td class="align-middle"><?= $value['name']; ?></td>
                  <td class="align-middle"><?= $value['username']; ?></td>
                  <td class="align-middle"><?= $value['level']; ?></td>
                  <td class="align-middle">
                    <a class="btn btn-sm <?= ($user->level == 'Admin') ? 'disabled' : '' ?>" data-bs-toggle="modal" data-bs-target="#accountDeleteModal" data-id="<?= $value['id_user'] ?>" data-nama="<?= $value['name'] ?>" id="deleteAkun" aria-disabled="<?= ($user->level == 'Admin') ? 'true' : '' ?>" style="display: block; margin: auto;"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</main>

<div class="modal fade" id="accountDeleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure want to delete this account?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Select "Delete" below if you are sure to delete <span class="fw-bold" id="deleteNama"></span> ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="post" id="deleteForm">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>