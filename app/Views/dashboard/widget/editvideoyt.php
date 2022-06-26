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
                                        <h3 class="text-center font-weight-light my-4">Ubah Link Video YouTube</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if (session()->getFlashdata('videoyt')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?= 'Error!' ?></strong> <?= session()->getFlashdata('videoyt'); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif ?>
                                        <form action="/home/widget/videoytprocess/<?= $isi['id'] ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <label for="inputPassword5" class="form-label">Link</label>
                                            <textarea id="inputPassword5" class="form-control" name="link" aria-describedby="passwordHelpBlock" spellcheck="false" style="height: 120px;" required autofocus><?= $isi['link'] ?></textarea>
                                            <div id="passwordHelpBlock" class="form-text">
                                                Buka video YouTube lalu pilih Share kemudian klik Embed. Pada Embed options centang <span class="fst-italic"> Enable privacy-enhanced mode.</span> Kemudian klik Copy. Paste link pada form di atas, lalu hapus attribute <span class="fw-bold">width="***" </span>dan <span class="fw-bold">height="***"</span>. Tambahkan attribute <span class="fw-bold">class="videoyt"</span>.
                                            </div>
                                            <div class="row mt-4">
                                                <button type="submit" class="btn btn-primary text-center mx-auto col-4">Buat</button>
                                            </div>
                                        </form>
                                        <form action="/home/widget/videoyt/hapus/<?= $isi['id']; ?>" class="row mt-1" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger text-center mx-auto col-4">Hapus</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/home/widget">Cancel</a></div>
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