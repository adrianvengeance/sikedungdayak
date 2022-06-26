<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-4">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Tambah Penduduk Pindah</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if (session()->getFlashdata('pindah')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= session()->getFlashdata('pindah'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/pindah/tambahprocess" method="POST">
                                            <?= csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control <?= $validation->hasError('namaagt') ? 'is-invalid' : ''; ?>" name="namaagt" id="exampleInputEmail1" value="<?= $orang->namaagt; ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('namaagt'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">NIK</label>
                                                <input type="text" class="form-control <?= $validation->hasError('nik') ? 'is-invalid' : ''; ?>" name="nik" id="exampleInputPassword1" value="<?= $orang->nik; ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('nik'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputkk" class="form-label">KK</label>
                                                <input type="text" class="form-control <?= $validation->hasError('numkk') ? 'is-invalid' : ''; ?>" name="numkk" id="inputkk" value="<?= $orang->numkk; ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('numkk'); ?></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <label for="inputjk" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-control form-select <?= $validation->hasError('jeniskel') ? 'is-invalid' : ''; ?>" name="jeniskel" id="inputjk">
                                                        <option value="" <?= ($orang->jeniskel == null) ? 'selected' : ''; ?>>Pilih Jenis Kelamin...</option>
                                                        <option value="LAKI-LAKI" <?= ($orang->jeniskel == 'LAKI-LAKI') ? 'selected' : ''; ?>>LAKI-LAKI</option>
                                                        <option value="PEREMPUAN" <?= ($orang->jeniskel == 'PEREMPUAN') ? 'selected' : ''; ?>>PEREMPUAN</option>
                                                    </select>
                                                    <div class="invalid-feedback"><?= $validation->getError('jeniskel'); ?></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label" for="inputtglpindah">Tanggal Pindah</label>
                                                    <input type="date" class="form-control <?= $validation->hasError('tglpindah') ? 'is-invalid' : ''; ?>" name="tglpindah" id="inputtglpindah" value="<?= old('tglpindah') ?>">
                                                    <div class="invalid-feedback"><?= $validation->getError('tglpindah'); ?></div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputalamatpindah">Alamat Pindah</label>
                                                <input type="text" class="form-control <?= $validation->hasError('alamatpindah') ? 'is-invalid' : ''; ?>" name="alamatpindah" id="inputalamatpindah" value="<?= old('alamatpindah') ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('alamatpindah'); ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputket">Keterangan</label>
                                                <input type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : ''; ?>" name="keterangan" id="inputket" value="<?= old('keterangan') ?>">
                                                <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
                                            </div>
                                            <div class="row mt-4">
                                                <button type="submit" class="btn text-center mx-auto col-4" style="background-color: #0DCAF0; color: #fff;">Pindah</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <?php if (is_null($asal)) : ?>
                                            <div class="small"><a href="/home/pindah">Cancel</a></div>
                                        <?php else : ?>
                                            <div class="small"><a href="<?= $asal ?>">Cancel</a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>