<?= $this->extend('layout/index'); ?>

<?= $this->section('leftcontent'); ?>

<div class="col-lg-8">
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">Peta Wilayah Padukuhan</h1>
            <!-- Post meta content-->
            <!-- <div class="text-muted fst-italic mb-2">Posted on January 1, 2021 by Administrator</div> -->
            <!-- Post categories-->
            <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
        </header>
        <!-- Preview image figure-->
        <!-- <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure> -->
        <!-- Post content-->
        <section class="mb-3 berita">
            <!-- <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <form class="input-group mb-3" action="/profile/peta/cari" method="POST">
                                <input type="text" name="cari" class="form-control" placeholder="Cari alamat..." aria-label="Cari alamat..." aria-describedby="button-addon2">
                                <button class="btn btn-outline-success" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <iframe src="https://www.google.com/maps/d/embed?mid=1KNc2OhyR7B_TZFHgidmpDxeM4Ze9HHjA&ehbc=2E312F" width="736" height="650"></iframe>
        </section>
    </article>
</div>

<?= $this->endSection(); ?>