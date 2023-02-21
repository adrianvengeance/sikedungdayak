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
                  <h5><i class="fas fa-venus-mars me-2"></i>Jumlah Pasangan Usia Subur</h5>
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
                  <h5><i class="fas fa-venus-mars me-2"></i>Jumlah Pasangan Usia Subur</h5>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <table id="pasubur" class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Istri</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Nama Suami</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Nomor KK</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($pasubur)) : ?>
              <?php foreach ($pasubur as $d => $pasangan) : ?>
                <tr>
                  <td><?= $d + 1; ?></td>
                  <td><?= $pasangan['wanita']; ?></td>
                  <td><?= $pasangan['tgllahirwanita']; ?></td>
                  <td><?= $pasangan['agewanita']; ?></td>
                  <td><?= $pasangan['pria']; ?></td>
                  <td><?= $pasangan['tgllahirpria']; ?></td>
                  <td><?= $pasangan['agepria']; ?></td>
                  <td><?= $pasangan['numkk']; ?></td>
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