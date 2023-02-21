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
                  <h5><i class="fas fa-venus me-2"></i>Jumlah Wanita Usia Subur</h5>
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
                  <h5><i class="fas fa-venus me-2"></i>Jumlah Wanita Usia Subur</h5>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <table id="wasubur" class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nomor KK</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Agama</th>
              <th>Goldar</th>
              <th>Jenis Kelamin</th>
              <th>Keluarga</th>
              <th>Status Diri</th>
              <th>Status Warga</th>
              <th>Pendidikan</th>
              <th>Pekerjaan</th>
              <th>Ayah</th>
              <th>Ibu</th>
              <th>Hubungan Keluarga</th>
              <th>Alamat Asal</th>
              <th>Alamat Desa</th>
              <th>RT</th>
              <th>RW</th>
              <th>Kelurahan</th>
              <th>Kecamatan</th>
              <th>Kota</th>
              <th>Kode POS</th>
              <th>Provinsi</th>
              <th>Bansos</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($wasubur)) : ?>
              <?php foreach ($wasubur as $d => $girl) : ?>
                <tr>
                  <td><?= $d + 1; ?></td>
                  <td><?= $girl['numkk']; ?></td>
                  <td><?= $girl['nik']; ?></td>
                  <td><?= $girl['namaagt']; ?></td>
                  <td><?= $girl['tmplahir']; ?></td>
                  <td><?= $girl['tgllahir']; ?></td>
                  <td><?= $girl['age']; ?></td>
                  <td><?= $girl['agama']; ?></td>
                  <td><?= $girl['goldar']; ?></td>
                  <td><?= $girl['jeniskel']; ?></td>
                  <td><?= $girl['keluarga']; ?></td>
                  <td><?= $girl['statusdiri']; ?></td>
                  <td><?= $girl['statuswarga']; ?></td>
                  <td><?= $girl['pendidikan']; ?></td>
                  <td><?= $girl['pekerjaan']; ?></td>
                  <td><?= $girl['ayah']; ?></td>
                  <td><?= $girl['ibu']; ?></td>
                  <td><?= $girl['hubungkel']; ?></td>
                  <td><?= $girl['alamatasal']; ?></td>
                  <td><?= $girl['alamatdesa']; ?></td>
                  <td><?= $girl['rt']; ?></td>
                  <td><?= $girl['rw']; ?></td>
                  <td><?= $girl['kelurahan']; ?></td>
                  <td><?= $girl['kecamatan']; ?></td>
                  <td><?= $girl['kota']; ?></td>
                  <td><?= $girl['kodepos']; ?></td>
                  <td><?= $girl['provinsi']; ?></td>
                  <td><?= $girl['pbi'] . ' ' . $girl['pkh'] . ' ' . $girl['bpnt'] . ' ' . $girl['bst'] . ' ' ?></td>
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