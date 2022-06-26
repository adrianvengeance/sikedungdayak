<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header mx-1">
                <!-- Mobile Screen -->
                <div class="d-md-none">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <button class="btn mx-auto align-text-bottom" disabled>
                                    <h5><i class="fas fa-table me-1"></i>Data Penduduk Pindah</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-end justify-content-start">
                            <a class="btn btn-sm btn-outline" href="/home"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="col-6 d-flex align-items-end justify-content-end">
                            <a class="btn btn-info text-white btn-sm" href="/home/pindah/cari"><i class="fas fa-plus"></i> Tambah</a>
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
                                    <h5><i class="fas fa-table me-1"></i>Data Penduduk Pindah</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-end justify-content-end">
                            <a class="btn btn-info text-white btn-sm" href="/home/pindah/cari"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('pindah')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= 'Success! '; ?></strong><?= session()->getFlashdata('pindah'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <table id="pindah" class="compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nomor KK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Pindah</th>
                            <th>Alamat Pindah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data)) : ?>
                            <?php foreach ($data as $n => $value) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $n + 1; ?></th>
                                    <!-- <td>
                                        <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfo" style="display: block; margin: auto;"><i class="fas fa-edit"></i></button>
                                    </td> -->
                                    <td><?= $value->namaagt; ?></td>
                                    <td><?= $value->nik; ?></td>
                                    <td><?= $value->numkk; ?></td>
                                    <td><?= $value->jeniskel ?></td>
                                    <td><?= $value->tglpindah ?></td>
                                    <td><?= $value->alamatpindah; ?></td>
                                    <td><?= $value->keterangan; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalInfo">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal title</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>