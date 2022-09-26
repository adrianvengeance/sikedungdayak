<?= $this->extend('layout/indexfullpage'); ?>

<?= $this->section('fullpage'); ?>

<article>
  <nav class="nav justify-content-center" id="tabs">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-artikel-tab" data-bs-toggle="tab" data-bs-target="#nav-artikel" type="button" role="tab" aria-controls="nav-artikel" aria-selected="false">Artikel</button>
      <button class="nav-link" id="nav-berita-tab" data-bs-toggle="tab" data-bs-target="#nav-berita" type="button" role="tab" aria-controls="nav-berita" aria-selected="true">Berita</button>
    </div>
  </nav>

  <div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-artikel" role="tabpanel" aria-labelledby="nav-artikel-tab">
      <div class="container px-0">
        <div class="row gx-2 gy-1">
          <?php if ($artikel) : ?>
            <?php foreach ($artikel as $nn => $roww) {
              $articles[$roww->groupmonth][$roww->created_at] = $roww;
            } ?>
            <?php foreach ($articles as $groupmonthh => $group_articles) { ?>
              <div class="col-12 border-bottom border-success mt-0 mb-3"><span class="text-muted d-flex justify-content-end"><?= $groupmonthh; ?></span></div>
              <?php foreach ($group_articles as $created_att => $artikel) : ?>
                <div class="col-lg-6 mb-1">
                  <div class="card">
                    <div class="row g-0">
                      <div class="col-5 col-sm-4">
                        <div class="ratio ratio-1x1">
                          <img src="/kontenberita/<?= $artikel->groupmonth . '/' . $artikel->author . '/' . $artikel->image; ?>" class="img-fluid rounded-start" loading="lazy" alt="<?= $artikel->title; ?>" style="width: 100%; object-fit: cover;">
                        </div>
                      </div>
                      <div class="col-7 col-sm-8">
                        <div class="card-body py-1 h-75">
                          <h5 class="card-title mt-3 judul"><?= $artikel->title; ?></h5>
                        </div>
                        <div class="card-footer text-muted" style="background-color: transparent !important;">
                          <small class="float-start tulisanbawah"><?= date('j F', strtotime($artikel->updated_at)); ?></small>
                          <small class="float-end tulisanbawah"><?= $artikel->author; ?></small>
                        </div>
                        <a href="/artikel/<?= date('Y-m', strtotime($artikel->created_at)) . '/' . url_title($artikel->category, '-', true) . '/' . $artikel->slug; ?>" class="stretched-link"></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach;
              ?>
            <?php } ?>
          <?php else : ?>
            <div class="col-12 bg-white">
              <p class="text-center py-5">Artikel belum tersedia..</p>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="nav-berita" role="tabpanel" aria-labelledby="nav-berita-tab">
      <div class="container px-0">
        <div class="row gx-2 gy-1">
          <?php if ($berita) : ?>
            <?php foreach ($berita as $n => $row) {
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
                          <img src="/kontenberita/<?= $berita->groupmonth . '/' . $berita->author . '/' . $berita->image; ?>" class="img-fluid rounded-start" loading="lazy" alt="<?= $berita->title; ?>" style="width: 100%; object-fit: cover;">
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
                        <a href="/artikel/<?= date('Y-m', strtotime($berita->created_at)) . '/' . url_title($berita->category, '-', true) . '/' . $berita->slug; ?>" class="stretched-link"></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach;
              ?>
            <?php } ?>
          <?php else : ?>
            <div class="col-12 bg-white">
              <p class="text-center py-5">Berita belum tersedia..</p>
            </div>
          <?php endif ?>
        </div>
      </div>

    </div>

  </div>
</article>

<!-- berita lainnya -->
<script type="text/javascript">
  let anotherNews = sessionStorage.getItem('beritalainnya')

  const artikeltab = document.getElementById('nav-artikel-tab')
  const artikel = document.getElementById('nav-artikel')
  const beritatab = document.getElementById('nav-berita-tab')
  const berita = document.getElementById('nav-berita')
  if (anotherNews == 'berita') {
    artikeltab.classList.remove('active');
    artikel.classList.remove('show');
    artikel.classList.remove('active');

    beritatab.classList.add('active')
    berita.classList.add('show')
    berita.classList.add('active')
  } else {
    document.getElementById('nav-berita-tab').classList.remove('active');
    berita.classList.remove('show');
    berita.classList.remove('active');

    artikeltab.classList.add('active');
    artikel.classList.add('show');
    artikel.classList.add('active');
  }
  sessionStorage.clear();
</script>

<?= $this->endSection(); ?>