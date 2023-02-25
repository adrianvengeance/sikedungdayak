<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <button class="btn disabled ps-0">
                    <h5><i class="fas fa-table"></i><span class="ms-2">Data Semua</span></h5>
                </button>
            </div>
            <div class="card-body">
                <table id="alldata" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            <th>Alamat Desa</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Kota</th>
                            <th>Kode POS</th>
                            <th>Provinsi</th>
                            <th>Program Bansos</th>
                            <th>Akseptor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $n => $value) : ?>

                            <tr>
                                <th scope="row" class="text-center"><?= $n + 1; ?></th>
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
                                <td><?= $value->alamatdesa ?></td>
                                <td><?= $value->rt ?></td>
                                <td><?= $value->rw ?></td>
                                <td><?= $value->kelurahan ?></td>
                                <td><?= $value->kecamatan ?></td>
                                <td><?= $value->kota ?></td>
                                <td><?= $value->kodepos ?></td>
                                <td><?= $value->provinsi ?></td>
                                <td><?= $value->pbi . ' ' . $value->pkh . ' ' . $value->bpnt . ' ' . $value->bst . ' ' ?></td>
                                <td><?= empty($value->jenis_aseptor) ? "" : $value->sumber_aseptor . ', ' . $value->jenis_aseptor ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>