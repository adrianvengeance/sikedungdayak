<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <!-- Mobile Screen -->
        <div class="d-md-none">
          <div class="row">
            <div class="col-12">
              <div class="text-center">
                <button class="btn mx-auto align-text-bottom" disabled>
                  <h5><i class="fas fa-baby me-2"></i>Jumlah Bayi</h5>
                </button>
              </div>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-start">
              <a class="btn btn-sm btn-outline" href="/home"><i class="fas fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
        <!-- computer screen -->
        <div class="d-none d-md-block">
          <div class="row">
            <div class="col-4 d-flex align-items-end justify-content-start">
              <a class="btn btn-sm btn-outline" href="/home"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-4">
              <div class="text-center">
                <button class="btn mx-auto align-text-bottom" disabled>
                  <h5><i class="fas fa-baby me-2"></i>Jumlah Bayi</h5>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <table id="tablebayi" class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Tahun</th>
              <th>Bulan</th>
              <th>Hari</th>
              <th>Jenis Kelamin</th>
              <th>Agama</th>
              <th>Ayah</th>
              <th>Ibu</th>
            </tr>
          </thead>
          <tbody>
            <?php

            use PhpParser\Node\Stmt\Echo_;

            if (isset($balita)) : ?>
              <?php foreach ($balita as $d => $bayi) : ?>
                <tr class="
                <?php switch ($bayi['age']) {
                  case (1):
                    echo "table-warning";
                    break;
                  case (2):
                    if ($bayi['month'] == 0 && $bayi['day'] == 0) {
                      echo "table-warning";
                    } else {
                      echo "table-success";
                    }
                    break;
                  case (3):
                    if ($bayi['month'] == 0 && $bayi['day'] == 0) {
                      echo "table-success";
                    } else {
                      echo "table-danger";
                    }
                    break;
                  case (4):
                    echo "table-danger";
                    break;
                  case (5):
                    if ($bayi['month'] == 0 && $bayi['day'] == 0) {
                      echo "table-danger";
                    } else {
                      echo "";
                    }
                    break;
                  default:
                    echo "";
                } ?>">
                  <td><?= $d + 1; ?></td>
                  <td><?= $bayi['namaagt']; ?></td>
                  <td><?= $bayi['tmplahir']; ?></td>
                  <td><?= $bayi['tgllahir']; ?></td>
                  <td class="fw-bold text-center"><?= $bayi['age']; ?></td>
                  <td class="text-center"><?= $bayi['month']; ?></td>
                  <td class="text-center"><?= $bayi['day']; ?></td>
                  <td><?= $bayi['jeniskel']; ?></td>
                  <td><?= $bayi['agama']; ?></td>
                  <td><?= $bayi['ayah']; ?></td>
                  <td><?= $bayi['ibu']; ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>