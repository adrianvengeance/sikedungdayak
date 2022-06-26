<?= $this->extend('layout/indexfullpage'); ?>

<?= $this->section('fullpage'); ?>

<article>
  <div class="container px-0">
    <div class="row gx-2 gy-1">
      <?php foreach ($all as $n => $row) {
        $news[$row->groupmonth][$row->created_at] = $row;
      } ?>
      <?php foreach ($news as $groupmonth => $group_news) { ?>

        <div class="col-12 border-bottom border-success mt-0 mb-3"><span class="text-muted d-flex justify-content-end"><?= $groupmonth; ?></span></div>
        <?php foreach ($group_news as $created_at => $berita) : ?>
          <div class="col-lg-6 mb-1">
            <div class="card">
              <div class="row g-0">
                <div class="col-5 col-sm-4">
                  <div class="ratio ratio-1x1">
                    <img src="/kontenberita/<?= $berita->groupmonth . '/' . $berita->author . '/' . $berita->image; ?>" class="img-fluid rounded-start" alt="<?= $berita->image; ?>" style="width: 100%; object-fit: cover;">
                  </div>
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body py-1 h-75">
                    <h5 class="card-title mt-3 judul"><?= $berita->title; ?></h5>
                  </div>
                  <div class="card-footer text-muted" style="background-color: transparent !important;">
                    <small class="float-start tulisanbawah"><?= date('j F', strtotime($berita->updated_at)); ?></small>
                    <small class="float-end tulisanbawah"><?= $berita->author; ?></small>
                  </div>
                  <a href="/berita/<?= date('Y-m', strtotime($berita->created_at)) . '/' . $berita->slug; ?>" class="stretched-link"></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;
        ?>
      <?php } ?>
    </div>
  </div>


  <!-- <div class="container px-0">

    <div class="row col border-bottom border-success mt-0 mb-3"><span class="text-muted d-flex justify-content-end"></span></div>

    <div class="row gx-2 gy-1">
      <div class="col-lg-6 mb-1">
        <div class="card">
          <div class="row g-0">
            <div class="col-5 col-sm-4">
              <div class="ratio ratio-1x1">
                <img src="https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=601&q=80" class="img-fluid rounded-start" alt="..." style="width: 100%; object-fit: cover;">
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="card-body h-75">
                <h5 class="card-title my-0 py-0 judul">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, 12 in the morning pop shells for a livin</h5>
              </div>
              <div class="card-footer text-muted">
                <small class="float-start tulisanbawah">31 Agustus</small>
                <small class="float-end tulisanbawah">Administrator</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-1">
        <div class="card">
          <div class="row g-0">
            <div class="col-5 col-sm-4">
              <div class="ratio ratio-1x1">
                <img src="https://images.unsplash.com/photo-1616464917528-00525c081b89?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="img-fluid rounded-start" alt="..." style="width: 100%; object-fit: cover;">
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="card-body h-75">
                <h5 class="card-title d-flex align-items-center">Card title yang judulnya lumayan</h5>
              </div>
              <div class="card-footer text-muted">
                <small class="float-start">31 Agustus</small>
                <small class="float-end">Administrator</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-1">
        <div class="card">
          <div class="row g-0">
            <div class="col-5 col-sm-4">
              <div class="ratio ratio-1x1">
                <img src="https://images.unsplash.com/photo-1567080586917-e6ab6aa0df85?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="img-fluid rounded-start" alt="..." style="width: 100%; object-fit: cover;">
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="card-body h-75">
                <h5 class="card-title d-flex align-items-center">Card title yang judulnya lumayan</h5>
              </div>
              <div class="card-footer text-muted">
                <small class="float-start">31 Agustus</small>
                <small class="float-end">Administrator</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-1">
        <div class="card">
          <div class="row g-0">
            <div class="col-5 col-sm-4">
              <div class="ratio ratio-1x1">
                <img src="https://images.unsplash.com/photo-1503602642458-232111445657?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" class="img-fluid rounded-start" alt="..." style="width: 100%; object-fit: cover;">
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="card-body h-75">
                <h5 class="card-title d-flex align-items-center">Card title yang judulnya lumayan</h5>
              </div>
              <div class="card-footer text-muted">
                <small class="float-start">31 Agustus</small>
                <small class="float-end">Administrator</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

</article>


<?= $this->endSection(); ?>