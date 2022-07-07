<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome -->
    <!-- <script src="https://kit.fontawesome.com/13fe8f9056.js" crossorigin="anonymous"></script> -->

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@400;700&family=Montserrat:wght@100;300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="<?= base_url('/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') ?>">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/indexhome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/mycustom.css'); ?>">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/Logo-Bantul-1x1-min.png') ?>" />

    <title><?= $title; ?></title>
</head>

<body style="background-color: #F1F5F8;">

    <nav class="navbar navbar-expand-xl navbar-light" style="font-family: 'Open Sans', sans-serif; background-color: #F1F5F8;">
        <div class="container-lg">
            <a class="navbar-brand" href="/" style="color: #198754;"><span class="h4" style="font-family: 'Charmonman', cursive; font-weight:bold;">Kedung Dayak</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrophome" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
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
                            <li><a class="dropdown-item" href="/potensi/kerajinan">Potensi Unggulan</a></li>
                            <li><a class="dropdown-item" href="/potensi/kuliner">Potensi Kerajinan</a></li>
                            <li><a class="dropdown-item" href="/potensi/unggulan">Potensi Kuliner</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="navbarDropdownproduk" href="/produkhukum">Produk Hukum</a></li>
                    <li class="nav-item"><a class="nav-link" id="navbarDropdownproduk" href="/berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" id="navbarDropdowndata" href="/rumahdata">Rumah Data</a></li>
                    <hr class="d-xl-none">
                    <!-- <form class="d-flex cariiform mt-1" action="/cari" method="POST">
                        <input class="form-control form-control-sm" type="search" name="cari" placeholder="Cari" aria-label="Search">
                        <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i></button>
                    </form> -->
                    <div class="navbardivider d-none d-xl-block"></div>
                    <li class="nav-item d-none d-xl-block"><a class="nav-link illoginn" id="navbarDropdownlogin" href="/login"><i class="bi bi-person-circle"></i></a></li>
                    <li class="nav-item d-xl-none lloginn"><a class="nav-link lloginn" id="navbarDropdownlogin" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <!-- Back to top button -->
    <button type="button" class="btn btn-success btn-floating btn-sm" id="btn-back-to-top" style="display: none; position: fixed; border-radius: 20px; bottom: 20px; right: 20px;">
        <i class="bi bi-arrow-up"></i>
    </button>

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
                <p class="mb-0 text-muted"><small>Made with &hearts; by <a class="text-muted" style="text-decoration: none;" href="https://instagram.com/kknupy.kelompok49" target="_blank">Kelompok 49 KKN UPY 2022</a></small></p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- jQuery -->
    <script src="<?= base_url('/node_modules/jquery/dist/jquery.js') ?>"></script>
    <!-- OwlCarousel -->
    <script src="<?= base_url('/node_modules/owl.carousel/dist/owl.carousel.min.js') ?>"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
            loop: true,
            margin: 10,
            nav: true,
            navText: ['<i class="bi bi-caret-left-fill" aria-hidden="true"></i>', '<i class="bi bi-caret-right-fill" aria-hidden="true"></i>'],
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
    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>