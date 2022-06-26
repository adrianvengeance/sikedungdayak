<?= $this->extend('/layout/indexfullpage'); ?>

<?= $this->section('fullpage'); ?>

<!-- Post content-->
<article>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php foreach ($products as $produk) : ?>
                <div class="col card-group">
                    <div class="card shadow">
                        <button class="btn ratio ratio-1x1 imagebtn" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="<?= base_url('/produklapak/' . $produk['nama'] . '-0' . $produk['no_wa'] . '/' . $produk['gambar']); ?>" class="card-img-top img-thumbnail" style="width:100%; object-fit:cover;">
                        </button>
                        <div class="card-body px-2">
                            <h5 class="card-title"><?= $produk['nama']; ?></h5>
                            <p class="card-text small text-muted comment"><?= $produk['deskripsi']; ?></p>
                        </div>
                        <div class="card-footer px-2">
                            <p class="btn btn-default disabled float-start ms-0 ps-0 mb-0 hargaclass" style="color: black;" id="harga">
                                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
                            </p>
                            <a href="https://wa.me/62<?= $produk['no_wa'] . $pesan ?>" target="_blank" class="small btn btn-success btn-sm float-end me-0 mt-1"><i class="bi bi-whatsapp"></i> Pesan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="card-group">
                    <div class="col">
                        <div class="card shadow">
                            <div class="ratio ratio-1x1">
                                <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=601&q=80" class="card-img-top img-thumbnail" style="width:100%; object-fit:cover;">
                            </div>
                            <div class="card-body px-2">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text small">The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump;</p>
                            </div>
                            <div class="card-footer px-2">
                                <p class="btn btn-default disabled float-start ms-0 ps-0 mb-0" style="color: black;">Rp. 99.000.</p>
                                <a href="#" class="small btn btn-success btn-sm float-end me-0 mt-1"><i class="bi bi-whatsapp"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="ratio ratio-1x1">
                                <img src="https://images.unsplash.com/photo-1567080586917-e6ab6aa0df85?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="card-img-top img-thumbnail" style="width:100%; object-fit:cover;">
                            </div>
                            <div class="card-body px-2">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text small">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer px-2">
                                <p class="btn btn-default disabled float-start ms-0 ps-0 mb-0" style="color: black;">Rp. 1.000</p>
                                <a href="#" class="small btn btn-success btn-sm float-end me-0 mt-1"><i class="bi bi-whatsapp"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="ratio ratio-1x1">
                                <img src="https://images.unsplash.com/photo-1616464917528-00525c081b89?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="card-img-top img-thumbnail" style="width:100%; object-fit:cover;">
                            </div>
                            <div class="card-body px-2">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text small">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                            <div class="card-footer px-2">
                                <p class="btn btn-default disabled float-start ms-0 ps-0 mb-0" style="color: black;">Rp. 990.000</p>
                                <a href="#" class="small btn btn-success btn-sm float-end me-0 mt-1"><i class="bi bi-whatsapp"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="ratio ratio-1x1">
                                <img src="https://images.unsplash.com/photo-1503602642458-232111445657?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="card-img-top img-thumbnail" style="width:100%; object-fit:cover;">
                            </div>
                            <div class="card-body px-2">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text small">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                            <div class="card-footer px-2">
                                <p class="btn btn-default disabled float-start ms-0 ps-0 mb-0" style="color: black;">Rp. 15.000.000</p>
                                <a href="#" class="small btn btn-success btn-sm float-end me-0 mt-1"><i class="bi bi-whatsapp"></i> Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

</article>

<!-- The Modal -->
<div class="modal fade" id="imageModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img class="img-thumbnail imagepreview" src="" style="width:100%;">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>