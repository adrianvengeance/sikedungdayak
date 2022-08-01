<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <div class="col-md-6">
          <button class="btn disabled ps-0">
            <h5><i class="fas fa-newspaper"></i><span class="ms-2"> Artikel</span></h5>
          </button>
        </div>
        <div class="col-md-6">
          <div class="d-md-none">
            <div class="text-center row px-3">
              <a class="btn btn-primary text-white btn-sm" href="/home/artikel/tambah"><i class="fas fa-plus"></i> Tulis</a>
            </div>
          </div>
          <div class="d-none d-md-block">
            <div class="float-end mt-2">
              <a class="btn btn-primary text-white btn-sm" href="/home/artikel/tambah"><i class="fas fa-plus"></i> Tulis</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('berita')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('berita'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <table id="info" class="compact">
          <thead>
            <tr>
              <th>No</th>
              <th>Action</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Kategori</th>
              <th>Grup</th>
              <th>Diperbarui</th>
              <!-- <th>Dibuat</th> -->
            </tr>
          </thead>
          <tbody>
            <?php if (isset($data)) : ?>
              <?php foreach ($data as $n => $value) : ?>
                <tr>
                  <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                  <td class="align-middle">
                    <a class="btn btn-sm" href="/home/artikel/edit/<?= $value->id_news ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                  </td>
                  <td class="align-middle"><img src="<?= base_url('/kontenberita/' . $value->groupmonth . '/' . $value->author . '/' . $value->image); ?>" class="rounded mx-auto d-block" alt="<?= $value->image; ?>" style="max-width: 100px;"></td>
                  <td class="align-middle"><?= $value->title; ?></td>
                  <td class="align-middle"><?= $value->author; ?></td>
                  <td class="align-middle"><?= $value->category; ?></td>
                  <td class="align-middle"><?= $value->groupmonth; ?></td>
                  <td class="align-middle"><?= $value->updated_at; ?></td>
                  <!-- <td class="align-middle"><?= $value->created_at; ?></td> -->
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</main>

<?= $this->endSection(); ?>