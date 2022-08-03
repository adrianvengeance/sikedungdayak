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
                                    <h5><i class="fas fa-table me-1"></i>Data Penduduk</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-end justify-content-start">
                            <a class="btn btn-sm btn-outline" href="/home"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="col-6 d-flex align-items-end justify-content-end">
                            <a class="btn btn-success text-white btn-sm <?= ($user->level != 'Super Admin') ? 'disabled' : '' ?>" href="/home/penduduk/tambah"><i class="fas fa-plus"></i> Tambah</a>
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
                                    <h5><i class="fas fa-table me-1"></i>Data Penduduk</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-end justify-content-end">
                            <a class="btn btn-success text-white btn-sm <?= ($user->level != 'Super Admin') ? 'disabled' : '' ?>" href="/home/penduduk/tambah"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('tambah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= 'Success! '; ?></strong><?= session()->getFlashdata('tambah'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?php if (session()->getFlashdata('adminbiasa')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong><?= 'Caution!' ?></strong> <?= session()->getFlashdata('adminbiasa'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <table id="penduduk" class="compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Action</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nomor KK</th>
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
                            <th>Alamat Desa</th>
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
                                    <th scope="row" class="text-center"><?= $n + 1; ?></th>
                                    <td>
                                        <a class="btn btn-sm" href="/home/penduduk/edit/<?= $value->nik ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td><?= $value->namaagt; ?></td>
                                    <td><?= $value->nik; ?></td>
                                    <td><?= $value->numkk; ?></td>
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
                                    <td><?= $value->alamatdesa ?></td>
                                    <td><?= $value->rt ?></td>
                                    <td><?= $value->rw ?></td>
                                    <td><?= $value->kelurahan ?></td>
                                    <td><?= $value->kecamatan ?></td>
                                    <td><?= $value->kota ?></td>
                                    <td><?= $value->kodepos ?></td>
                                    <td><?= $value->provinsi ?></td>
                                    <td><?= $value->pbi . ' ' . $value->pkh . ' ' . $value->bpnt . ' ' . $value->bst . ' ' ?>
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

<?= $this->endSection(); ?>