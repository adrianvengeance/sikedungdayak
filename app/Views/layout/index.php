<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="kedungdayak.com" />
  <meta name="keyword" content="kedungdayak, kedung dayak, kedungdayak.com" />
  <title><?= $title; ?></title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/Logo-Bantul-1x1-min.png') ?>" />
  <link href="<?= base_url('/assets/css/mycustom.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/assets/css/indexstyles.css') ?>" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="<?= base_url('/assets/css/styles.css') ?>" rel="stylesheet" />
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@400;700&family=Montserrat:wght@100;300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&family=Crimson+Text&family=Kameron&display=swap" rel="stylesheet">
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  <!-- simple datatable -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- autocolors -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"></script> -->
  <!-- OwlCarousel2 -->
  <link rel="stylesheet" href="<?= base_url('/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') ?>">

</head>

<body style="background-color: #F1F5F8;">
  <nav class="navbar navbar-expand-xl navbar-light" style="font-family: 'Open Sans', sans-serif;">
    <div class="container-lg">
      <a class="navbar-brand" href="/" style="color: #fff;"><span class="h4" style="font-family: 'Charmonman', cursive; font-weight:bold;">Kedung Dayak</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="color:#F1F5F8;">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-2">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbardrophome" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
            <ul class="dropdown-menu" aria-labelledby="navbardrophome">
              <li><a class="dropdown-item" href="/profile/wilayah">Profil Wilayah Padukuhan</a></li>
              <li><a class="dropdown-item" href="/profile/peta">Peta Wilayah Padukuhan</a></li>
              <li><a class="dropdown-item" href="/profile/sejarah">Sejarah Padukuhan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardroppemerintahan" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pemerintahan</a>
            <ul class="dropdown-menu" aria-labelledby="navbardroppemerintahan">
              <li><a class="dropdown-item" href="/pemerintahan/visimisi">Visi dan Misi</a></li>
              <li class="d-none d-xl-block d-xxl-none">
                <a class="dropdown-item" href="#">
                  Lembaga Masyakat &raquo;
                </a>
                <ul class="dropdown-menu dropdown-submenu">
                  <li><a class="dropdown-item" href="/pemerintahan/karangtaruna">Karang Taruna</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/kelompoktani">Kelompok Tani</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/kelompokwanitatani">Kelompok Wanita Tani</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/linmas">LINMAS</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/pkk">PKK</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/pokgiat">POKGIAT</a></li>
                  <li><a class="dropdown-item" href="/pemerintahan/posyandu">POSYANDU</a></li>
                </ul>
              </li>
              <li class="d-xl-none d-xxl-block">
                <p class="dropdown-item mb-0 lmbmsykrt">Lembaga Masyarakat &raquo;</p>
              </li>
              <div class="ms-3 d-xl-none d-xxl-block">
                <li><a class="dropdown-item" href="/pemerintahan/karangtaruna">Karang Taruna</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/kelompoktani">Kelompok Tani</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/kelompokwanitatani">Kelompok Wanita Tani</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/linmas">LINMAS</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/pkk">PKK</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/pokgiat">POKGIAT</a></li>
                <li><a class="dropdown-item" href="/pemerintahan/posyandu">POSYANDU</a></li>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Monografi</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/monografi/semester_1">Semester I Tahun 2021</a></li>
              <li><a class="dropdown-item" href="/monografi/semester_2">Semester II Tahun 2021</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownkatalog" role="button" data-bs-toggle="dropdown" aria-expanded="false">Potensi</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownkatalog">
              <li><a class="dropdown-item" href="/potensi/kerajinan">Potensi Kerajinan</a></li>
              <li><a class="dropdown-item" href="/potensi/kuliner">Potensi Kuliner</a></li>
              <li><a class="dropdown-item" href="/potensi/unggulan">Potensi Unggulan</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" id="navbarDropdownproduk" href="/produkhukum">Produk Hukum</a></li>
          <li class="nav-item"><a class="nav-link" id="navbarDropdownproduk" href="/artikel">Artikel</a></li>
          <li class="nav-item"><a class="nav-link" id="navbarDropdowndata" href="/rumahdata">Rumah Data</a></li>

          <hr class="d-xl-none d-xxl-block">
          <!-- <form class="d-flex cariiform mt-1" action="/cari" method="POST">
                        <input class="form-control form-control-sm" type="search" name="cari" placeholder="Cari" aria-label="Search">
                        <button class="btn btn-outline-light btn-sm" type="submit"><i class="bi bi-search"></i></button>
                    </form> -->
          <div class="navbardivider d-none d-xl-block"></div>
          <!-- <li class="nav-item">
                        <a href="#" class="nav-link carii " id="carii" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" title="#popoverhead" data-bs-content="#popovercontent"><i class="bi bi-search"></i></a>
                    </li>
                    <div id="popoverhead" class="d-none">Cari</div>
                    <div id="popover-content" class="d-none">
                        <form class="">
                            <input class="form-control form-control-sm me-2" type="search" placeholder="Cari" aria-label="Search">
                            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div> -->
          <li class="nav-item d-none d-xl-block"><a class="nav-link illoginn" id="navbarDropdownlogin" href="/login"><i class="bi bi-person-circle"></i></a></li>
          <li class="nav-item d-xl-none lloginn"><a class="nav-link lloginn" id="navbarDropdownlogin" href="/login">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page content-->
  <div class="container mt-5" style="font-family: 'Montsterrat', sans-serif;">
    <div class="row">

      <!-- CONTENT -->
      <?= $this->renderSection('leftcontent'); ?>

      <!-- Side widgets-->
      <div class="col-lg-4 mb-3">
        <!-- <div class="sticky-lg-top"> -->
        <div class="card mb-4">
          <div class="card-header"><span class="me-2"><i class="bi bi-megaphone"></i></span>Pengunguman</div>
          <div class="card-body">
            <div class="pengunguman gy-2">
              <?php if (!empty($announce)) : ?>
                <?php foreach ($announce as $a => $value) : ?>
                  <?php $tanggal = (date("Y-m-j", strtotime($value['waktu']))); ?>
                  <div class="isipengunguman mb-2">
                    <p class="mb-0 lead"><?= $value['isi']; ?></p>
                    <p class="mb-0 text-muted"><?= ($days[date("w", strtotime($tanggal))]) . date(', d ', strtotime($value['waktu'])) . ($months[date("n", strtotime($tanggal))]) . date(' Y', strtotime($value['waktu'])) . '. Pukul ' . date('G:i', strtotime($value['waktu'])) . ' WIB'; ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <div class="isipengunguman mb-2">
                  <p class="mb-0 text-muted">Belum ada Pengunguman</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header"><span class="me-2"><i class="bi bi-chat-left-text"></i></span>Kritik dan Saran </div>
          <div class="card-body">
            <div class="krtkdansrn">
              <form action="/kritiksaranprocess" method="POST">
                <?= csrf_field(); ?>
                <!-- <fieldset disabled="disabled"> -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control form-control-sm" placeholder="" name="niknama" id="floatingInput" required>
                  <label for="floatingInput"><small>NIK atau Nama</small></label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control form-control-sm" placeholder="" name="isi" id="floatingTextarea" spellcheck="false" required></textarea>
                  <label for="floatingTextarea"><small>Komentar</small></label>
                </div>
                <div class="row mx-0 ">
                  <button class="col-4 mx-auto btn btn-outline-success btn-sm" type="submit">Submit</button>
                </div>
                <!-- </fieldset> -->
              </form>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header"><span class="me-2"><i class="bi bi-play-btn"></i></span>Video</div>
          <div class="card-body">
            <div class="videoyt-box">
              <?php if (!is_null($videoyt)) : ?>
                <?= $videoyt['link']; ?>
              <?php else : ?>
                <p class="text-center text-muted">Belum ada Link Video.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header">
            <span class="me-2"><i class="bi bi-person-badge"></i></span>Aparatur
          </div>
          <div class="card-body">
            <div class="owlcrsl">
              <div class="justify-content-center owl-carousel text-light">
                <?php if (!empty($smallimg)) : ?>
                  <?php foreach ($smallimg as $x => $value) : ?>
                    <div class="item">
                      <div class="card h-100">
                        <div class="card-img-top">
                          <img src="<?= '/gambar/smallimg/' . $value['gambar']; ?>" loading="lazy" class="w-100" style="width: 100%;" alt="<?= $value['nama']; ?>">
                        </div>
                        <div class="card-body text-center">
                          <h6 class="card-title mb-0 pb-0"><?= $value['nama']; ?></h6>
                          <small class="card-text"><?= $value['jabatan']; ?></small>
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
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header"><span class="me-2"><i class="bi bi-bar-chart-line"></i></span>Statistik Pengunjung</div>
          <div class="card-body">
            <dl class="row mb-0">
              <dt class="col-6">Hari ini</dt>
              <dd class="col-6 text-end visitornum h5"><span><?= sprintf('%06d', $vstoday); ?></span></dd>

              <dt class="col-6">Minggu lalu</dt>
              <dd class="col-6 text-end visitornum h5"><span><?= sprintf('%06d', $vslastwk); ?></span></dd>

              <dt class="col-6">Bulan ini</dt>
              <dd class="col-6 text-end visitornum h5"><span><?= sprintf('%06d', $vscurmon); ?></span></dd>

              <dt class="col-6">Total</dt>
              <dd class="col-6 text-end visitornum h5"><span><?= sprintf('%06d', $vstotal); ?></span></dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-6 footer-info">
            <h3>Padukuhan<br>Kedung Dayak</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>
          <div class="col-lg-4 col-sm-6 footer-contact">
            <h4>Hubungi Kami</h4>
            <p>
              Kedung Dayak, Jatimulyo<br>
              Dlingo, Bantul<br>
              Yogyakarta 55783 <br>
              <strong>Telepon:</strong><a href="http://wa.me" style="text-decoration: none; color:#ecf5ff;"> +62 812 345 6789</a><br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-youtube"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <!-- manually add jquery -->
  <script src="<?= base_url('/node_modules/jquery/dist/jquery.js'); ?>"></script>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core theme JS-->
  <!-- <script src="js/scripts.js"></script> -->

  <!-- datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

  <!-- simple datatable -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->

  <!-- OwlCarousel -->
  <script src="<?= base_url('/node_modules/owl.carousel/dist/owl.carousel.min.js') ?>"></script>

  <!-- owl carousel -->
  <script>
    $(document).ready(function() {
      $('.owl-carousel').owlCarousel();
    });

    $('.owl-carousel').owlCarousel({
      items: 4,
      autoplay: true,
      autoWidth: true,
      default: 5000,
      lazyLoad: true, //added
      center: true, //added
      dots: false, //added
      loop: true,
      margin: 10,
      nav: false,
      //navText: ['<i class="bi bi-caret-left-fill" aria-hidden="true"></i>', '<i class="bi bi-caret-right-fill" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 2,
          nav: false
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    })
  </script>

  <!-- datatable -->
  <script>
    $(document).ready(function() {
      $('#inforumah').DataTable({
        "scrollX": true,
        "lengthChange": false,
        "searching": false,
        "paging": false,
        "info": false
      });
    });
  </script>

  <!-- Copy URL then Toast -->
  <script>
    $(document).ready(function() {
      $(document).on("click", "#liveToastBtn", function(e) {
        $("body").append('<input id="copyURL" type="text" value="" />');
        $("#copyURL").val(window.location.href).select();
        document.execCommand("copy");
        $("#copyURL").remove();
      });
    });

    function showToast() {
      var Toasting = document.getElementById('liveToast');
      var toast = new bootstrap.Toast(Toasting);
      toast.show();
    }
  </script>

  <!-- mychart -->
  <script type="text/javascript">
    <?php if (isset($batasumur)) { ?>
      var batasumur = <?php echo json_encode($batasumur); ?>;
    <?php } else {
    } ?>
    <?php if (isset($umurpria)) { ?>
      var umurpria = <?php echo json_encode($umurpria); ?>;
    <?php } else {
    } ?>
    <?php if (isset($umurwanita)) { ?>
      var umurwanita = <?php echo json_encode($umurwanita); ?>;
    <?php } else {
    } ?>
    <?php if (isset($kategoripnddkn)) { ?>
      var kategoripnddkn = <?php echo json_encode($kategoripnddkn); ?>;
    <?php } else {
    } ?>
    <?php if (isset($pnddknbyusia)) { ?>
      var pnddknbyusia = <?php echo json_encode($pnddknbyusia); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jmlhrt)) { ?>
      var jmlhrt = <?php echo json_encode($jmlhrt); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jmlhkk)) { ?>
      var jmlhkk = <?php echo json_encode($jmlhkk); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jobs)) { ?>
      var jobs = <?php echo json_encode($jobs); ?>;
    <?php } else {
    } ?>
    <?php if (isset($job)) { ?>
      var job = <?php echo json_encode($job); ?>;
    <?php } else {
    } ?>

    // CHART RT 1
    <?php if (isset($kkrt1)) { ?>
      var kkrt1 = <?php echo json_encode($kkrt1); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jjrt1)) { ?>
      var jjrt1 = <?php echo json_encode($jjrt1); ?>;
    <?php } else {
    } ?>
    <?php if (isset($totalrt1)) { ?>
      var totalrt1 = <?php echo json_encode($totalrt1); ?>;
    <?php } else {
    } ?>
    // CHART RT 2
    <?php if (isset($kkrt2)) { ?>
      var kkrt2 = <?php echo json_encode($kkrt2); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jjrt2)) { ?>
      var jjrt2 = <?php echo json_encode($jjrt2); ?>;
    <?php } else {
    } ?>
    <?php if (isset($totalrt2)) { ?>
      var totalrt2 = <?php echo json_encode($totalrt2); ?>;
    <?php } else {
    } ?>
    // CHART RT 3
    <?php if (isset($kkrt3)) { ?>
      var kkrt3 = <?php echo json_encode($kkrt3); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jjrt3)) { ?>
      var jjrt3 = <?php echo json_encode($jjrt3); ?>;
    <?php } else {
    } ?>
    <?php if (isset($totalrt3)) { ?>
      var totalrt3 = <?php echo json_encode($totalrt3); ?>;
    <?php } else {
    } ?>
    // CHART RT 4
    <?php if (isset($kkrt4)) { ?>
      var kkrt4 = <?php echo json_encode($kkrt4); ?>;
    <?php } else {
    } ?>
    <?php if (isset($jjrt4)) { ?>
      var jjrt4 = <?php echo json_encode($jjrt4); ?>;
    <?php } else {
    } ?>
    <?php if (isset($totalrt4)) { ?>
      var totalrt4 = <?php echo json_encode($totalrt4); ?>;
    <?php } else {
    } ?>
  </script>

  <script src="<?= base_url('/assets/js/umurchart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/pendidikanchart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/kkchart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/pekerjaanchart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/kkrt1chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/jjrt1chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/kkrt2chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/jjrt2chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/kkrt3chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/jjrt3chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/kkrt4chart.js'); ?>"></script>
  <script src="<?= base_url('/assets/js/rtchart/jjrt4chart.js'); ?>"></script>

  <!-- Chart per RT -->
  <script>
    $(document).ready(function() {
      var rt = ['rt1', 'rt2', 'rt3', 'rt4'];
      for (let i = 0; i < rt.length; i++) {
        $('#kk' + rt[i] + 'chart').hide();
        $('#jj' + rt[i] + 'chart').hide();
      }
    });

    $('#rt1234 input[type="checkbox"]').on('change', function() {
      $('#rt1234 input[type="checkbox"]').not(this).prop('checked', false);
    });

    function showChart(rt) {
      var checked = $('#' + rt).is(":checked");
      var notcheck = $('#' + rt).is(":not(:checked)");
      var rtlist = ['rt1', 'rt2', 'rt3', 'rt4'];

      if (checked && rt == 'rt1') {
        var rtsatu = [rt];
        var hasil = $(rtlist).not(rtsatu).get();
        for (let i = 0; i < hasil.length; i++) {
          $('#' + hasil[i] + 'divkk').removeClass("kotakChart").hide();
          $('#' + hasil[i] + 'divjj').removeClass("kotakChart").hide();
          $('#kk' + hasil[i] + 'chart').hide();
          $('#jj' + hasil[i] + 'chart').hide();
        }
        $('#chartrumahdata').hide();
        $('#rt1divkk').addClass("kotakChart").show();
        $('#rt1divjj').addClass("kotakChart").show();
        $('#kkrt1chart').show();
        $('#jjrt1chart').show();

      } else if (checked && rt == 'rt2') {
        var rtdua = [rt];
        var hasil = $(rtlist).not(rtdua).get();
        for (let i = 0; i < hasil.length; i++) {
          $('#' + hasil[i] + 'divkk').removeClass("kotakChart").hide();
          $('#' + hasil[i] + 'divjj').removeClass("kotakChart").hide();
          $('#kk' + hasil[i] + 'chart').hide();
          $('#jj' + hasil[i] + 'chart').hide();
        }
        $('#chartrumahdata').hide();
        $('#rt2divkk').addClass("kotakChart").show();
        $('#rt2divjj').addClass("kotakChart").show();
        $('#kkrt2chart').show();
        $('#jjrt2chart').show();

      } else if (checked && rt == 'rt3') {
        var rttiga = [rt];
        var hasil = $(rtlist).not(rttiga).get();
        for (let i = 0; i < hasil.length; i++) {
          $('#' + hasil[i] + 'divkk').removeClass("kotakChart").hide();
          $('#' + hasil[i] + 'divjj').removeClass("kotakChart").hide();
          $('#kk' + hasil[i] + 'chart').hide();
          $('#jj' + hasil[i] + 'chart').hide();
        }
        $('#chartrumahdata').hide();
        $('#rt3divkk').addClass("kotakChart").show();
        $('#rt3divjj').addClass("kotakChart").show();
        $('#kkrt3chart').show();
        $('#jjrt3chart').show();

      } else if (checked && rt == 'rt4') {
        var rtempat = [rt];
        var hasil = $(rtlist).not(rtempat).get();
        for (let i = 0; i < hasil.length; i++) {
          $('#' + hasil[i] + 'divkk').removeClass("kotakChart").hide();
          $('#' + hasil[i] + 'divjj').removeClass("kotakChart").hide();
          $('#kk' + hasil[i] + 'chart').hide();
          $('#jj' + hasil[i] + 'chart').hide();
        }
        $('#chartrumahdata').hide();
        $('#rt4divkk').addClass("kotakChart").show();
        $('#rt4divjj').addClass("kotakChart").show();
        $('#kkrt4chart').show();
        $('#jjrt4chart').show();

      } else if (notcheck) {
        $('#' + rt + 'divkk').removeClass("kotakChart").hide();
        $('#' + rt + 'divjj').removeClass("kotakChart").hide();
        $('#kk' + rt + 'chart').hide();
        $('#jj' + rt + 'chart').hide();
        $('#chartrumahdata').show();
      }
    }
  </script>

</body>

</html>