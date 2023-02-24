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
                  <h5><i class="fas fa-hands me-2"></i>Program Bantuan Sosial</h5>
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
                  <h5><i class="fas fa-hands me-2"></i>Program Bantuan Sosial</h5>
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

              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
              <th>PBI</th>
              <th>PKH</th>
              <th>BPNT</th>
              <th>BST</th>
              <th>Aseptor</th>
              <th>Nomor KK</th>
              <th>NIK</th>
              <th>Goldar</th>
              <th>Agama</th>
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
            </tr>
          </thead>
          <tbody>
            <?php if (isset($data)) : ?>
              <?php foreach ($data as $d => $orang) : ?>
                <tr>
                  <td><?= $d + 1; ?></td>

                  <td><?= $orang['namaagt']; ?></td>
                  <td><?= $orang['tmplahir']; ?></td>
                  <td><?= $orang['tgllahir']; ?></td>
                  <td><?= $orang['age']; ?></td>
                  <td><?= $orang['jeniskel']; ?></td>
                  <td><?= $orang['pbi'] ?></td>
                  <td><?= $orang['pkh'] ?></td>
                  <td><?= $orang['bpnt'] ?></td>
                  <td><?= $orang['bst'] ?></td>
                  <td><?= empty($orang['jenis_aseptor']) ? "" : $orang['sumber_aseptor'] . ', ' . $orang['jenis_aseptor'] ?></td>
                  <td><?= $orang['numkk']; ?></td>
                  <td><?= $orang['nik']; ?></td>
                  <td><?= $orang['goldar']; ?></td>
                  <td><?= $orang['agama']; ?></td>
                  <td><?= $orang['keluarga']; ?></td>
                  <td><?= $orang['statusdiri']; ?></td>
                  <td><?= $orang['statuswarga']; ?></td>
                  <td><?= $orang['pendidikan']; ?></td>
                  <td><?= $orang['pekerjaan']; ?></td>
                  <td><?= $orang['ayah']; ?></td>
                  <td><?= $orang['ibu']; ?></td>
                  <td><?= $orang['hubungkel']; ?></td>
                  <td><?= $orang['alamatasal']; ?></td>
                  <td><?= $orang['alamatdesa']; ?></td>
                  <td><?= $orang['rt']; ?></td>
                  <td><?= $orang['rw']; ?></td>

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