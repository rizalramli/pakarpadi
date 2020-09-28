<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Sistem Pakar Padi</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/alazea-gh-pages/img/core-img/icon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="assets/alazea-gh-pages/style.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">


</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="assets/alazea-gh-pages/img/core-img/icon.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +1 234 122 122</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                <?php 
                                session_start();
                                if (!isset($_SESSION['username_user'])) {
                                    echo '<a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>';
                                }
                                else 
                                {
                                    echo '<a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i><span>('.$_SESSION["username_user"].') Logout</span></a>';
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Beranda</a></li>
                                    <li><a href="hama_penyakit.php">Info Hama Penyakit</a></li>
                                    <li><a href="konsultasi.php">Konsultasi</a></li>
                                    <li><a href="tentang.php">Tentang</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="petunjuk.php">Petunjuk</a></li>
                                </ul>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(assets/alazea-gh-pages/img/bg-img/bg1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-50 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2 style="padding-top:150px">SISTEM PAKAR DIAGNOSA HAMA PENYAKIT TANAMAN PADI</h2>
                                <p>Merupakan sistem informasi yang memudahkan petani bawang merah di daerah Kabupaten Probolinggo untuk mendiagnosa hama penyakit bawang merah serta memberikan informasi penanganannya.</p>
                                <div class="welcome-btn-group">
                                    <a href="login.php" class="btn alazea-btn mr-30">MULAI</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(assets/alazea-gh-pages/img/bg-img/bg2.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-50 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2 style="padding-top:150px">SISTEM PAKAR DIAGNOSA HAMA PENYAKIT TANAMAN PADI</h2>
                                <p>Merupakan sistem informasi yang memudahkan petani bawang merah di daerah Kabupaten Probolinggo untuk mendiagnosa hama penyakit bawang merah serta memberikan informasi penanganannya.</p>
                                <div class="welcome-btn-group">
                                    <a href="login.php" class="btn alazea-btn mr-30">MULAI</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>SISTEM PAKAR DIAGNOSA HAMA PENYAKIT TANAMAN PADI</h2>
                        <p>
                            <?php
                            include 'koneksi/koneksi.php';
                            $query = mysqli_query($koneksi,"SELECT * FROM tentang");
                            foreach ($query as $data) {
                                echo $data['Nm_tentang'];

                                # code...
                            }
                            ?>
                        </p>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="assets/alazea-gh-pages/img/core-img/b1.png" alt="">
                                    <h5>Quality Products</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="assets/alazea-gh-pages/img/core-img/b2.png" alt="">
                                    <h5>Perfect Service</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="assets/alazea-gh-pages/img/core-img/b3.png" alt="">
                                    <h5>100% Natural</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="assets/alazea-gh-pages/img/core-img/b4.png" alt="">
                                    <h5>Environmentally friendly</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Daftar Hama Pada Tanaman Padi</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row alazea-portfolio">

                <!-- Single Portfolio Area -->
                <?php 
                $query2 = mysqli_query($koneksi,"SELECT * FROM hamapenyakit WHERE kategori='Hama' GROUP BY Kd_penyakit");
                foreach($query2 as $data2):
                ?>
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(assets/img/hamapenyakit/<?php echo $data2['foto'] ?>);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="assets/img/hamapenyakit/<?php echo $data2['foto'] ?>" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3><?php echo $data2['Nm_penyakit'] ?></h3>
                                <h5>Kode : [<?php echo $data2['Kd_penyakit'] ?>]</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section class="alazea-portfolio-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Daftar Penyakit Pada Tanaman Padi</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row alazea-portfolio">

                <!-- Single Portfolio Area -->
                <?php 
                $query3 = mysqli_query($koneksi,"SELECT * FROM hamapenyakit WHERE kategori='Penyakit' GROUP BY Kd_penyakit");
                foreach($query3 as $data3):
                ?>
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(assets/img/hamapenyakit/<?php echo $data3['foto'] ?>);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="assets/img/hamapenyakit/<?php echo $data3['foto'] ?>" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3><?php echo $data3['Nm_penyakit'] ?></h3>
                                <h5>Kode : [<?php echo $data3['Kd_penyakit'] ?>]</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Hubungi Kami</h2>
                        <p>Kirim saran/masukan anda apabila ada yang perlu kami bantu:</p>
                    </div>
                    <?php 
                    if(isset($_POST['kirim_bantuan']))
                    {
                        $nama_depan = $_POST['nama_depan'];
                        $nama_belakang = $_POST['nama_belakang'];
                        $isi_pesan = $_POST['isi_pesan'];
                        $nama_kritik = $nama_depan." ".$nama_belakang;
                        $query_insert_bantuan = mysqli_query($koneksi, "INSERT INTO komplain (id_komplain,nama_user,komplain_user) VALUES (NULL,'$nama_kritik','$isi_pesan') ");
                        if($query_insert_bantuan)
                        {
                            echo "<script>alert('Sukses mengirimkan saran')</script>";
                        }
                    }
                    ?>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nama_depan" class="form-control" id="contact-name" placeholder="Nama Depan">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nama_belakang" class="form-control" id="contact-email" placeholder="Nama Belakang">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="isi_pesan" id="message" cols="30" rows="10" placeholder="Isi pesan"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="kirim_bantuan" class="btn alazea-btn mt-15">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-4 col-lg-4">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>info Aplikasi</h5>
                            </div>
                            <nav class="widget-nav">
                                <p>Merupakan Sistem Pakar Diagnosa Penyakit dan Hama pada Tanaman Padi yang dibangun dengan menggunakan metode Naive Bayes</p>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-4 col-lg-4">
                        <div class="single-footer-widget">
                        <div class="widget-title">
                                <h5>LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Beranda</a></li>
                                    <li><a href="#">Info Hama & Penyakit</a></li>
                                    <li><a href="#">Konsultasi</a></li>
                                    <li><a href="#">Tentang</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Petunjuk</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-4 col-lg-4">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> 505 Silk Rd, New York</p>
                                <p><span>Phone:</span> +1 234 122 122</p>
                                <p><span>Email:</span> info.deercreative@gmail.com</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                                <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>Copyright &copy; 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="assets/alazea-gh-pages/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/alazea-gh-pages/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/alazea-gh-pages/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/alazea-gh-pages/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/alazea-gh-pages/js/active.js"></script>
</body>

</html>