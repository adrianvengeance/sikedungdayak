<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
  <div class="container-fluid px-4">
    <div class="card mb-4">
      <div class="card-header row mx-1">
        <div class="col-md-6">
          <div class="float-start">
            <button class="btn disabled ps-0">
              <h6><i class="fas fa-table"></i><span class="ms-2">Data Warga</span></h6>
            </button>
          </div>
          <?php if (isset($nokk)) : ?>
            <div class="float-end">
              <div class="d-md-none">
                <div class=" pe-0 me-0">
                  <a class="btn btn-success btn-sm text-nowrap me-0" href="/home/penduduk/tambah/<?= $nokk ?>"><i class="fas fa-plus"></i></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md-6">
          <!-- mobile -->
          <div class="d-md-none row">
            <form class="<?= isset($nokk) ? 'col-sm-12' : ''; ?>" action="" method="get">
              <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="<?= (isset($nokk)) ? "$nokk" : "" ?>" />
                <button class=" btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </div>
          <!-- desktop -->
          <div class="d-none d-md-block">
            <div class="row">
              <?php if (isset($nokk)) : ?>
                <div class="col-5 pe-0">
                  <a class="btn btn-success float-end col-5 text-nowrap" href="/home/penduduk/tambah/<?= $nokk ?>" style="width: 150px;">Tambah Keluarga</a>
                </div>
              <?php endif; ?>
              <div class="<?= isset($nokk) ? 'col-7' : ''; ?> float-end">
                <form class="" action="" method="get">
                  <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="<?= (isset($nokk)) ? "$nokk" : "" ?>" />
                    <button class=" btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php if (session()->getFlashdata('nokk')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('nokk'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('edit')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= 'Success!'; ?></strong> <?= session()->getFlashdata('edit'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <table id="info" class="compact">
          <thead>
            <tr>
              <th>No</th>
              <th>Action</th>
              <th>Nomor KK</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Agama</th>
              <th>Golongan Darah</th>
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
              <th>RT</th>
              <th>RW</th>
              <th>Kelurahan</th>
              <th>Kecamatan</th>
              <th>Kota</th>
              <th>Kode POS</th>
              <th>Provinsi</th>
              <th>Program Bansos</th>
            </tr>
          </thead>
          <tbody>
            <?php if (isset($data)) : ?>
              <?php foreach ($data as $n => $value) : ?>
                <tr>
                  <th scope="row"><?= $n + 1; ?></th>
                  <td>
                    <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfo" data-numkk="<?= $value->numkk ?>" data-nik="<?= $value->nik ?>" data-nama="<?= $value->namaagt ?>" id="infoEdit" style="display: block; margin: auto;">
                      <i class="fas fa-edit"></i>
                    </button>
                  </td>
                  <td><?= $value->numkk; ?></td>
                  <td><?= $value->nik; ?></td>
                  <td><?= $value->namaagt; ?></td>
                  <td><?= $value->tmplahir; ?></td>
                  <td><?= $value->tgllahir ?></td>
                  <td><?= $value->age; ?></td>
                  <td><?= $value->agama ?></td>
                  <td><?= $value->goldar ?></td>
                  <td><?= $value->jeniskel ?></td>
                  <td><?= $value->keluarga ?></td>
                  <td><?= $value->statusdiri ?></td>
                  <td><?= $value->statuswarga ?></td>
                  <td><?= $value->pendidikan ?></td>
                  <td><?= $value->pekerjaan ?></td>
                  <td><?= $value->ayah ?></td>
                  <td><?= $value->ibu ?></td>
                  <td><?= $value->hubungkel ?></td>
                  <td><?= $value->alamatasal ?></td>
                  <td><?= $value->rt ?></td>
                  <td><?= $value->rw ?></td>
                  <td><?= $value->kelurahan ?></td>
                  <td><?= $value->kecamatan ?></td>
                  <td><?= $value->kota ?></td>
                  <td><?= $value->kodepos ?></td>
                  <td><?= $value->provinsi ?></td>
                  <td><?= $value->pbi . ' ' . $value->pkh . ' ' . $value->bpnt . ' ' . $value->bst . ' ' ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- The Modal -->
  <div class="modal fade" id="modalInfo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="namaInput" placeholder="" readonly>
            <label for=""><small>Nama</small></label>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-md">
              <div class="form-floating">
                <input type="text" class="form-control" id="numkkInput" placeholder="" readonly>
                <label for=""><small>No. KK</small></label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input type="text" class="form-control" id="nikInput" placeholder="" readonly>
                <label for=""><small>NIK</small></label>
              </div>
            </div>
          </div>
          <!-- Mobile -->
          <div class="d-sm-none">
            <div class="row gx-2 px-1">
              <form action="" id="edit" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button class="col-12 px-0 text-center btn btn-primary" type="submit">Edit</button>
              </form>
              <form action="" id="move" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button class="col-12 px-0 text-center btn btn-info text-white my-2" type="submit">Pindah</button>
              </form>
              <form action="" id="died" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button class="col-12 px-0 text-center btn btn-danger" type="submit">Meninggal</button>
              </form>
            </div>
          </div>
          <!-- Desktop -->
          <div class="d-none d-sm-block">
            <div class="row gx-2 px-1">
              <div class="col-sm-4 px-0 text-center">
                <form action="" id="edit" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-primary" type="submit" style="width:150px;">Edit</button>
                </form>
              </div>
              <div class="col-sm-4 px-0 text-center">
                <form action="" id="move" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-info text-white" type="submit" style="width:150px;">Pindah</button>
                </form>
              </div>
              <div class="col-sm-4 px-0 text-center">
                <form action="" id="died" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger" type="submit" style="width:150px;">Meninggal</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>