<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="my-3">Dashboard</h1>
    <div class="row gx-3 gy-0">
      <div class="col-xl-3 col-md-6">
        <div class="card border border-3 border-primary text-white mb-4">
          <div class="card-body bg-primary pb-1">
            <span class="">Jumlah Penduduk</span>
            <span class="float-end">
              <h4><?= $semuaorang; ?></h4>
            </span>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-dark stretched-link" href="/home/penduduk">View Details</a>
            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border border-3 border-success text-white mb-4">
          <div class="card-body bg-success pb-1">
            <div class="float-start">
              <h4 class=""><i class="fas fa-mars"></i><?= ' ' . $semuapria; ?></h4>
            </div>
            <div class="float-end">
              <h4><i class="fas fa-venus"></i><?= ' ' . $semuawanita; ?></h4>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-dark stretched-link" href="/home/penduduk">View Details</a>
            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border border-3 border-info text-white mb-4">
          <div class="card-body bg-info pb-1">
            <span class="">Penduduk Pindah</span>
            <span class="float-end">
              <h4><?= $pindah; ?></h4>
            </span>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-dark stretched-link" href="/home/pindah">View Details</a>
            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card border border-3 border-danger text-white mb-4">
          <div class="card-body bg-danger pb-1">
            <span class="">Penduduk Meninggal</span>
            <span class="float-end">
              <h4><?= $meninggal; ?></h4>
            </span>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-dark stretched-link" href="/home/meninggal">View Details</a>
            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row gx-3">
      <div class="col-md-6">
        <div class="card boder border-1 border-secondary mb-4">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-chart-area me-1"></i>
            Jumlah Penduduk Laki-laki dan Perempuan
          </div>
          <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card boder border-1 border-secondary mb-4">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-chart-bar me-1"></i>
            Jumlah Kepala Keluarga tiap RT
          </div>
          <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
      </div>
    </div>
    <div class="row gx-3 mb-4">
      <div class="col-md-6 col-12">
        <div class="card boder border-1 border-secondary mb-4 mb-md-2">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-baby me-1"></i>
            Jumlah Bayi sesuai Usia
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-sm">
              <thead class="text-center">
                <tr>
                  <th>Kategori</th>
                  <th>Laki-laki</th>
                  <th>Perempuan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody class="text-center align-middle">
                <tr class="table-warning">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/jumlah-bayi">BADUTA (0-2)</a></td>
                  <td><?= $badutam ?></td>
                  <td><?= $badutaf ?></td>
                  <td><?= $badutam + $badutaf ?></td>
                </tr>
                <tr class="table-success">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/jumlah-bayi">BATITA (0-3)</a></td>
                  <td><?= $batitam ?></td>
                  <td><?= $batitaf ?></td>
                  <td><?= $batitam + $batitaf ?></td>
                </tr>
                <tr class="table-info">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/jumlah-bayi">BALITA (0-5)</a></td>
                  <td><?= $balitam ?></td>
                  <td><?= $balitaf ?></td>
                  <td><?= $balitam + $balitaf ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card boder border-1 border-secondary mb-4 mb-md-2">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-female me-1"></i>
            Jumlah Wanita Usia Subur
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-sm">
              <thead class="text-center">
                <tr>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-primary">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/pasangan-subur">Pasangan Usia Subur (Wanita &lt;50 tahun)</a></td>
                  <td class="text-center"><?= $pasubur ?></td>
                </tr>
                <tr class="table-danger">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/wanita-subur">Wanita Usia Subur (Wanita single 12-50 tahun)</a></td>
                  <td class="text-center"><?= $wasubur ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card boder border-1 border-secondary mb-4 mb-md-2">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-hands me-1"></i>
            Program Bansos
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-sm">
              <thead class="text-center">
                <tr>
                  <th>Kategori</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <tr class="">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-bansos-pbi">Penerima Bantuan Iuran (PBI)</a></td>
                  <td class="text-center"><?= $bansosPBI ?></td>
                </tr>
                <tr class="">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-bansos-pkh">Program Keluarga Harapan (PKH)</a></td>
                  <td class="text-center"><?= $bansosPKH ?></td>
                </tr>
                <tr class="">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-bansos-bpnt">Bantuan Pangan Non Tunai (BPNT)</a></td>
                  <td class="text-center"><?= $bansosBPNT ?></td>
                </tr>
                <tr class="">
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-bansos-bst">Bantuan Sosial Tunai (BST)</a></td>
                  <td class="text-center"><?= $bansosBST ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="card boder border-1 border-secondary">
          <div class="card-header border-1 border-secondary">
            <i class="fas fa-venus me-1"></i>
            Program Akseptor
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead class="text-center">
                <tr>
                  <th colspan="2">Pemerintah</th>
                  <th colspan="2">Swasta</th>
                </tr>
                <tr>
                  <th>Jenis</th>
                  <th>Jumlah</th>
                  <th>Jenis</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-IMP">IMP</a></td>
                  <td><?= $akspIMP ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-IMP">IMP</a></td>
                  <td><?= $akssIMP ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-MOP">MOP</a></td>
                  <td><?= $akspMOP ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-MOP">MOP</a></td>
                  <td><?= $akssMOP ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-MOW">MOW</a></td>
                  <td><?= $akspMOW ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-MOW">MOW</a></td>
                  <td><?= $akssMOW ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-IUD">IUD</a></td>
                  <td><?= $akspIUD ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-IUD">IUD</a></td>
                  <td><?= $akssIUD ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-PIL">PIL</a></td>
                  <td><?= $akspPIL ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-PIL">PIL</a></td>
                  <td><?= $akssPIL ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-Kondom">Kondom</a></td>
                  <td><?= $akspKondom ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-Kondom">Kondom</a></td>
                  <td><?= $akssKondom ?></td>
                </tr>
                <tr>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-Suntik">Suntik</a></td>
                  <td><?= $akspSuntik ?></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-Suntik">Suntik</a></td>
                  <td><?= $akssSuntik ?></td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-TIAL">TIAL</a></td>
                  <td><?= $akssTIAL ?></td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td><a class="text-dark text-decoration-none" href="home/penduduk/program-akseptor-IAS">IAS</a></td>
                  <td><?= $akssIAS ?></td>
                </tr>
              </tbody>
              <tfoot class="text-center">
                <tr>
                  <td>Jumlah</td>
                  <td><?= $akspIMP + $akspIUD + $akspKondom + $akspMOP + $akspMOW + $akspPIL + $akspSuntik; ?></td>
                  <td>Jumlah</td>
                  <td><?= $akssIMP + $akssIUD + $akssKondom + $akssMOP + $akssMOW + $akssPIL + $akssSuntik + $akssIAS + $akssTIAL; ?></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection(); ?>