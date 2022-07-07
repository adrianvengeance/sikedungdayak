<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="kedungdayak.com" />
  <meta name="keyword" content="kedungdayak, kedung dayak, kedungdayak.com" />
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/Logo-Bantul-1x1-min.png') ?>" />
  <title><?= $title; ?></title>
  <link href="<?= base_url('/assets/sb/css/styles.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/assets/css/mycustom.css') ?>" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@700&display=swap" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/ngokv92udy33oth50sbxqbjtcdj2h991ihu42z7hdo3gawrg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/highcharts.js"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/exporting.js"></script>
  <script type='text/javascript' src="<?= base_url() ?>/assets/js/visitor/jquery.tsv-0.96.min.js"></script>

</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= site_url('/home') ?>" style="font-family: 'Charmonman', cursive;">Kedung Dayak</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> -->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
    <!-- Navbar-->
    <ul class="navbar-nav justify-content-end ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="/home/account">Account Settings</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Rumah Data</div>
            <a class="nav-link <?= ($uri == base_url('/home') || $uri->getSegment(2) == 'penduduk' || $uri->getSegment(2) == 'pindah' || $uri->getSegment(2) == 'meninggal') ? 'active' : ''; ?>" href="/home">
              <div class="sb-nav-link-icon"><i class="fas fa-home fa-fw"></i></i></div>
              Dashboard
            </a>
            <a class="nav-link <?= ($uri->getSegment(2) == 'data') ? 'active' : ''; ?>" href="/home/data">
              <div class="sb-nav-link-icon"><i class="fas fa-warehouse fa-fw"></i></div>
              Data Master
            </a>
            <a class="nav-link <?= ($uri->getSegment(2) == 'info') ? 'active' : ''; ?>" href="/home/info">
              <div class="sb-nav-link-icon"><i class="fas fa-house-user fa-fw"></i></div>
              Papan Rumah
            </a>
            <div class="sb-sidenav-menu-heading">Content</div>
            <a class="nav-link <?= ($uri->getSegment(2) == 'berita') ? 'active' : ''; ?>" href="/home/berita">
              <div class="sb-nav-link-icon"><i class="fas fa-newspaper fa-fw"></i></div>Berita
            </a>
            <a class="nav-link <?= ($uri->getSegment(2) == 'lapak') ? 'active' : ''; ?>" href="/home/lapak">
              <div class="sb-nav-link-icon"><i class="fas fa-store fa-fw"></i></div>Lapak
            </a>
            <div class="sb-sidenav-menu-heading">Website</div>
            <a class="nav-link collapsed <?= ($uri->getSegment(2) == 'widget') || ($uri->getSegment(2) == 'pictures') ? 'active' : ''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAddons" aria-expanded="false" aria-controls="collapseAddons">
              <div class="sb-nav-link-icon"><i class="fas fa-paperclip fa-fw"></i></div>
              Add-ons
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAddons">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link <?= ($uri->getSegment(2) == 'widget') ? 'active' : ''; ?>" href="/home/widget">
                  <div class="sb-nav-link-icon"><i class="fas fa-thumbtack fa-fw"></i></div> Widget
                </a>
                <a class="nav-link <?= ($uri->getSegment(2) == 'pictures') ? 'active' : ''; ?>" href="/home/pictures">
                  <div class="sb-nav-link-icon"><i class="far fa-images fa-fw"></i></div> Gambar
                </a>
              </nav>
            </div>
            <a class="nav-link" href="/">
              <div class="sb-nav-link-icon"><i class="fas fa-globe fa-fw"></i></div>Halaman Awal
            </a>
            <a class="nav-link <?= ($uri->getSegment(2) == 'register' || $uri->getSegment(2) == 'accounts') ? 'active' : ''; ?>" href="/home/accounts">
              <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>List Akun
            </a>

            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Pages
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.html">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div> -->
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?= $user->name; ?>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">

      <?= $this->renderSection('content'); ?>

      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Kedung Dayak <?= date('Y'); ?></div>
            <!-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> -->
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- The Modal -->
  <div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you sure want to leave?</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- manually add jquery -->
  <script src="<?= base_url('/node_modules/jquery/dist/jquery.js'); ?>"></script>

  <script>
    function spass($id) {
      var input = document.getElementById($id);
      if (input.type === 'password') {
        input.type = 'text';
      } else {
        input.type = 'password';
      }
    }
    var loadFile = function(event) {
      var output = document.getElementById('previewimg');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
  <script>
    <?php if (isset($batasumur)) : ?>
      var batasumur = <?php echo json_encode($batasumur); ?>;
    <?php endif; ?>
    <?php if (isset($umurpria)) : ?>
      var umurpria = <?php echo json_encode($umurpria); ?>;
    <?php endif; ?>
    <?php if (isset($umurwanita)) : ?>
      var umurwanita = <?php echo json_encode($umurwanita); ?>;
    <?php endif; ?>
    <?php if (isset($jumlahrt)) : ?>
      var jumlahrt = <?php echo json_encode($jumlahrt); ?>;
    <?php endif; ?>
    <?php if (isset($jumlahkk)) : ?>
      var jumlahkk = <?php echo json_encode($jumlahkk); ?>;
    <?php endif; ?>
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('/assets/js/scripts.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('/assets/js/chart-jeniskel.js') ?>"></script>
  <script src="<?= base_url('/assets/js/chart-rt.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="<?= base_url('/assets/js/datatables-simple-demo.js') ?>"></script>
  <script type="text/javascript" src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>
  <!-- <script src="https://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> -->
  <!-- manually add jquery -->
  <script src="<?= base_url('/node_modules/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- datatables -->
  <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script> -->
  <!-- <script src="<?php // base_url('assets/js/datatables-demo.js') 
                    ?>"></script> -->

  <script>
    tinymce.init({
      selector: 'textarea#inputbody',
      // plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker link',
      // toolbar: 'bold italic underline alignleft aligncenter alignright alignjustify checklist bullist numlist link fontsize fontfamily code', //a11ycheck addcomment showcomments casechange export editimage pageembed permanentpen formatpainter image table tableofcontents
      // toolbar_mode: 'floating',
      // tinycomments_mode: 'embedded',
      // tinycomments_author: 'Author name',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code',
      toolbar_mode: 'floating',
    });
  </script>

  <script>
    $(document).on("click", "#infoEdit", function() {
      var nama = $(this).data('nama');
      var numkk = $(this).data('numkk');
      var nik = $(this).data('nik');
      $(".modal-body #namaInput").val(nama);
      $(".modal-body #numkkInput").val(numkk);
      $(".modal-body #nikInput").val(nik);
      $(".modal-body #edit").attr("action", "<?= base_url('/home/info/edit/ubah') ?>" + '/' + nik)
      $(".modal-body #move").attr("action", "<?= base_url('/home/info/edit/pindah') ?>" + '/' + nik)
      $(".modal-body #died").attr("action", "<?= base_url('/home/info/edit/died') ?>" + '/' + nik)
    });
  </script>

  <!-- ksModaldelete -->
  <script>
    $(document).on("click", "#ksDeleteBtn", function() {
      var nama = $(this).data('nama');
      var id = $(this).data('id');
      console.log(nama)

      $("#ksModal .modal-body").append(nama);
      $("#ksModal .modal-footer form").attr("action", "<?= base_url('/home/kritiksaran/delete') ?>" + '/' + id);
    });
  </script>

  <script>
    $(document).on("click", "#deleteAkun", function() {
      var nama = $(this).data('nama');
      var id = $(this).data('id');
      // console.log(nama, id)

      $(".modal-body #deleteNama").text(nama);
      $(".modal-footer #deleteForm").attr("action", "<?= base_url('/home/accounts/delete') ?>" + '/' + id);
    });
  </script>

  <script>
    <?php if (isset($iden)) : ?>
      var datanik = <?php echo json_encode($iden); ?>;
    <?php endif; ?>
    $(document).ready(function() {
      $("#inputUsername").change(function() {
        var uname = document.getElementById("inputUsername").value;
        var biograpi = datanik.filter(p => p.nik == uname);
        $('<input>').attr('value', $('#inputName').val(biograpi[0].namaagt));
      });
    });
  </script>

</body>

</html>