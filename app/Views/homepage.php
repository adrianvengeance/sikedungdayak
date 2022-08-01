<?= $this->extend('layout/indexhome'); ?>

<?= $this->section('content'); ?>

<section id="hero" style="font-family: 'Montserrat', sans-serif;">
  <div class="container" id="bigTitle" data-aos="fade-up">
    <div class="hero-info" data-aos="fade-down" data-aos-duration="1000">
      <h2>Sistem Informasi<br>Padukuhan<span> Kedung Dayak</span></h2>
      <div>
        <a href="/rumahdata" class="btn btn-get-started scrollto">Penduduk</a>
        <a href="/login" class="btn btn-services scrollto">&nbsp&nbsp Login &nbsp&nbsp</a>
      </div>
    </div>
  </div>


  <div class="container" style="font-family: Montserrat, sans-serif;" data-aos="fade-down" data-aos-once="true" data-aos-duration="1000">
    <div class="row">
      <div id="carouselExampleCaptions" class="carousel slide slidehomee" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php if (!empty($bigimg)) : ?>
            <?php for ($i = 0; $i <= $bigimgmin1; $i++) : ?>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i; ?>" aria-label="Slide <?= $i ?>" <?= $i == 0 ? 'class="active" aria-current="true"' : ""; ?>></button>
            <?php endfor ?>
          <?php else : ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-label="Slide 0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <?php endif ?>
        </div>
        <div class="carousel-inner">
          <?php $bicount = 0 ?>
          <?php if (!empty($bigimg)) : ?>
            <?php foreach ($bigimg as $x => $value) : ?>
              <div class="carousel-item <?= $bicount == 0 ? "active" : ""; ?>">
                <img src="<?= '/gambar/bigimg/' . $value['gambar']; ?>" class="bigBsCarousel img-fluid d-block w-100" alt="<?= $value['title']; ?>" loading="eager">
              </div>
              <?php $bicount++; ?>
            <?php endforeach; ?>
          <?php else : ?>

            <div class="carousel-item active">
              <img src="https://dummyimage.com/1920x1080/737273/000000" class="img-fluid d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://dummyimage.com/1920x1140/737273/000000" class="img-fluid d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://dummyimage.com/1080x1920/737273/000000" class="img-fluid d-block w-100" alt="...">
            </div>
          <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <i class="bi bi-chevron-left btn btn-success btn-sm"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <i class="bi bi-chevron-right btn btn-success btn-sm"></i>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- mobile -->
<div class="d-sm-none">
  <div class="container" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-once="true">
    <div class="row lpk" style="font-family: Montserrat, sans-serif;">
      <div class="col-12 py-3 px-3">
        <a class="btn d-flex justify-content-center py-4 lapak" href="/lapak">
          <span class="fs-2"><i class="bi bi-shop"></i> Lapak Kedung Dayak</span>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- desktop -->
<div class="d-none d-sm-block">
  <div class="container py-3" data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-once="true">
    <div class="row" style="font-family: Montserrat, sans-serif;">
      <div class="col mx-3 lapak">
        <a class="btn text-center py-4 d-flex justify-content-center lapak" href="/lapak">
          <span class="fs-2"><i class="bi bi-shop"></i> Lapak Kedung Dayak</span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container mb-3" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
  <div class="row">
    <div class="col-12">
      <p class="text-success fs-3 border-top border-3">Berita Terbaru..</p>
    </div>

    <?php foreach ($berita as $x => $row) : ?>

      <div class="col-lg-6 mb-1">
        <div class="card">
          <div class="row g-0">
            <div class="col-5 col-sm-4">
              <div class="ratio ratio-1x1">
                <img src="/kontenberita/<?= $row->groupmonth . '/' . $row->author . '/' . $row->image; ?>" class="ora img-fluid rounded-start" alt="<?= $row->image; ?>" loading="lazy" style="width: 100%; object-fit: cover;">
              </div>
            </div>
            <div class="col-7 col-sm-8">
              <div class="card-body py-1 h-75">
                <h5 class="card-title mt-3 judul"><?= $row->title; ?></h5>
              </div>
            </div>
            <a href="/berita/<?= date('Y-m', strtotime($row->created_at)) . '/' . $row->slug; ?>" class="stretched-link"></a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
    <div class="col text-center">
      <a href="/berita" class="border-bottom border-2 btn text-dark" style="text-decoration: none;">
        <p class="mb-1">Berita lainnya..</p>
      </a>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>