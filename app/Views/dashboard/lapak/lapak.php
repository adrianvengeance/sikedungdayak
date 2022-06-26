<?= $this->extend('/dashboard/layout/index'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header row mx-1">
                <div class="col-md-6">
                    <button class="btn disabled ps-0">
                        <h5><i class="fas fa-store"></i><span class="ms-2">Lapak</span></h5>
                    </button>
                </div>
                <div class="col-md-6">
                    <div class="d-md-none">
                        <div class="text-center row px-3">
                            <a class="btn btn-primary text-white btn-sm" href="/home/lapak/tambah"><i class="fas fa-plus"></i> Tambah Produk</a>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <div class="float-end mt-2">
                            <a class="btn btn-primary text-white btn-sm" href="/home/lapak/tambah"><i class="fas fa-plus"></i> Tambah Produk</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('lapak')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= 'Success!' ?></strong> <?= session()->getFlashdata('lapak'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <table id="info" class="compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Nomor Whatsapp</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data)) : ?>
                            <?php foreach ($data as $n => $value) : ?>
                                <tr>
                                    <th class="align-middle text-center" scope="row"><?= $n + 1; ?></th>
                                    <td class="align-middle"><img src="/produklapak/<?= $value->nama . '-0' . $value->no_wa . '/' . $value->gambar ?>" class="rounded mx-auto d-block" alt="<?= $value->gambar; ?>" style="max-width: 150px; max-height: 150px;"></td>
                                    <td class="align-middle"><?= $value->nama; ?></td>
                                    <td class="align-middle"><a href="https://wa.me/62<?= $value->no_wa ?>" target="_blank">+62<?= $value->no_wa; ?></a></td>
                                    <td class="align-middle"><?= $value->deskripsi; ?></td>
                                    <td class="align-middle"><?= number_format($value->harga, 0, ',', '.'); ?></td>
                                    <td class="align-middle">
                                        <a class="btn btn-sm" href="/home/lapak/edit/<?= $value->id_produk ?>" style="display: block; margin: auto;"><i class="fas fa-edit"></i></a>
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