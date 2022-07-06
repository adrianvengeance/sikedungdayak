<?= $this->extend('layout/indexhome'); ?>

<?= $this->section('content'); ?>

<!-- Card -->
<!-- <div class="card shadow-1-strong pt-0 mt-0" style="width: 100%; height: auto; background-image: url('');">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <div class="card-body text-white px-0">
                    <h1 class="card-title">Card title</h1>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <a href="#!" class="btn btn-outline-light">Button</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Card -->

<section id="hero" class="" style="font-family: 'Montserrat', sans-serif;">
  <div class="container" data-aos="fade-up">

    <!-- <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
            <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1442544213729-6a15f1611937?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1572908721147-0a9eb395762d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="img-fluid d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1591866497533-403d44694fa1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="img-fluid d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">

            <h2>Sistem Informasi<br>Pedukuhan<br><span class="underline">Kedung Dayak</span></h2>
            <div>
                <a href="#about" class="btn btn-get-started scrollto">Get Started</a>
                <a href="#services" class="btn btn-services scrollto">Our Services</a>
            </div>
        </div> -->


    <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">

      <h2>Sistem Informasi<br>Padukuhan<span class=""> Kedung Dayak</span></h2>
      <div>
        <a href="/rumahdata" class="btn btn-get-started scrollto">Penduduk</a>
        <a href="/login" class="btn btn-services scrollto">Login</a>
      </div>
    </div>

  </div>
</section>

<div class="container mt-5" style="font-family: Montserrat, sans-serif;">
  <div class="row">
    <div id="carouselExampleCaptions" class="carousel slide slidehomee bigcrsl" data-bs-ride="carousel">
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
              <img src="<?= '/gambar/bigimg/' . $value['gambar']; ?>" class="img-fluid d-block w-100" alt="<?= $value['title']; ?>">
              <div class="carousel-caption d-none d-md-block">
                <h5 class=""><mark><?= $value['title']; ?></mark></h5>
                <p><mark><?= $value['subtitle']; ?></mark></p>
              </div>
            </div>
            <?php $bicount++; ?>
          <?php endforeach; ?>
        <?php else : ?>

          <div class="carousel-item active">
            <img src="https://dummyimage.com/1920x1080/737273/000000" class="img-fluid d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class=""><mark>First slide label</mark></h5>
              <p><mark>Some representative placeholder content for the first slide.</mark></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://dummyimage.com/1920x1140/737273/000000" class="img-fluid d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class=""><mark>Second slide label</mark></h5>
              <p class=""><mark>Some representative placeholder content for the second slide.</mark></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://dummyimage.com/1080x1920/737273/000000" class="img-fluid d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><mark>Third slide label</mark></h5>
              <p><mark>Some representative placeholder content for the third slide.</mark></p>
            </div>
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

<!-- mobile -->
<div class="d-sm-none">
  <div class="container">
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
  <div class="container py-3">
    <div class="row" style="font-family: Montserrat, sans-serif;">
      <div class="col mx-3 lapak">
        <a class="btn text-center py-4 d-flex justify-content-center lapak" href="/lapak">
          <span class="fs-2"><i class="bi bi-shop"></i> Lapak Kedung Dayak</span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row owlcrsl mb-4 mx-1 px-1">
    <!-- <div class="col-12 text-center text-white py-2">
            <h4 class="mb-0">Pemerintah Kabupaten Bantul</h4>
            <h4 class="my-0">Kecamatan Jatimulyo</h4>
            <h5>Padukuhan Kedung Dayak</h5>
        </div> -->
    <div class="col-12 justify-content-center owl-carousel mt-3">
      <?php if (!empty($smallimg)) : ?>
        <?php foreach ($smallimg as $x => $value) : ?>
          <div class="item">
            <div class="card h-100">
              <div class="card-img-top">
                <img src="<?= '/gambar/smallimg/' . $value['gambar']; ?>" class="w-100" style="width: 100%;" alt="<?= $value['nama']; ?>">
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-0"><?= $value['nama']; ?></h5>
                <p class="card-text"><?= $value['jabatan']; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php else : ?>

        <div class="item">
          <div class="card h-100">
            <div class="card-img-top">
              <img src="https://dummyimage.com/500x600/3b3b3b/ffffff.jpg" class="w-100" style="width: 100%;" alt="Boy">
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-0 pb-0">Budi</h5>
              <p class="card-text">Carik</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <div class="card-img-top">
              <img src="https://dummyimage.com/500x600/3b3b3b/ffffff.jpg" class="w-100" style="width: 100%;" alt="Boy">
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-0 pb-0">Budi</h5>
              <p class="card-text">Carik</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <div class="card-img-top">
              <img src="https://dummyimage.com/500x600/3b3b3b/ffffff.jpg" class="w-100" style="width: 100%;" alt="Boy">
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-0 pb-0">Budi</h5>
              <p class="card-text">Carik</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <div class="card-img-top">
              <img src="https://dummyimage.com/500x600/3b3b3b/ffffff.jpg" class="w-100" style="width: 100%;" alt="Boy">
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-0 pb-0">Budi</h5>
              <p class="card-text">Carik</p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card h-100">
            <div class="card-img-top">
              <img src="https://dummyimage.com/500x600/3b3b3b/ffffff.jpg" class="w-100" style="width: 100%;" alt="Boy">
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-0 pb-0">Budi</h5>
              <p class="card-text">Carik</p>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>