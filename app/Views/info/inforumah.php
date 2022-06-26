<?= $this->extend('/layout/index'); ?>

<?= $this->section('leftcontent'); ?>
<div class="col-lg-8">
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">Papan Rumah</h1>
        </header>
        <!-- Post content-->
        <div class="card mb-4">
            <div class="card-header">
                <div class="">
                    <span class="my-2"><i class="bi bi-info-circle"></i></span>
                    <a class="btn btn-sm btn-outline-success float-end" href="/info/edit/<?= $nokk ?>">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <table id="inforumah" class="compact">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Hubungan Keluarga</th>
                            <th>RT</th>
                            <th>Program Bansos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $n => $value) : ?>
                            <tr>
                                <td><?= $n + 1; ?></td>
                                <td><?= $value->namaagt; ?></td>
                                <td><?= $value->age; ?></td>
                                <td><?= $value->jeniskel; ?></td>
                                <td><?= $value->hubungkel; ?></td>
                                <td><?= $value->rt; ?></td>
                                <td><?= $value->pbi . ' ' . $value->pkh . ' ' . $value->bpnt . ' ' . $value->bst . ' ' ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </article>
</div>
<?= $this->endSection(); ?>