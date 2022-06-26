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
                                        <?php if (session()->getFlashdata('cari')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= session()->getFlashdata('cari'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/pindah/cariprocess" method="POST">
                                            <?= csrf_field(); ?>
                                            <div class="input-group">
                                                <input list="datalistcari" class="form-control rounded" name="cari" placeholder="Masukan NIK atau Nama..." aria-label="Search" aria-describedby="search-addon" autofocus>
                                                <datalist id="datalistcari">
                                                    <?php foreach ($nik as $x => $hasil) : ?>
                                                        <option value="<?= $hasil['nik']; ?>"></option>
                                                    <?php endforeach; ?>
                                                    <?php foreach ($namaagt as $x => $hasil) : ?>
                                                        <option value="<?= $hasil['namaagt']; ?>"></option>
                                                    <?php endforeach; ?>
                                                </datalist>
                                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/pindah">Cancel</a></div>
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