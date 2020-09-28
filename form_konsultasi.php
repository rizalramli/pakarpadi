<?php 
    include 'koneksi/koneksi.php';
    include 'koneksi/function.php';
    if (!isset($_SESSION['username_user'])) {
        header('location:index.php');
    }
    $selected = (array) $_POST['gejala'];
?>
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
                                <!-- Search Icon -->

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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(assets/alazea-gh-pages/img/bg-img/bg1.jpg);">
            <h2>Konsultasi</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Konsultasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-12">
                <h4>Gejala Terpilih</h4>
                <form action="" method="post">
                    <div class="contact--thumbnail">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;">Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi,"SELECT Kd_gejala, Nm_gejala FROM gejala WHERE Kd_gejala IN ('".implode("','", $selected)."')");
                                    foreach ($query as $data) {
                                    $gejala[$data['Kd_gejala']] = $data['Nm_gejala'];
                                    ?>
                                        <tr>
                                            <td><?php echo $data['Kd_gejala']; ?></td>
                                            <td>
                                                <?php echo $data['Nm_gejala']; ?>
                                                <input type="hidden" value="<?php echo $data['Nm_gejala']; ?>" name="namagejala[]">
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <div class="welcome-btn-group mb-30">
                                    <!-- <a href="konsultasi.php" class="btn alazea-btn active">Kembali</a>
                                    <button name="kirim_konsultasi" class="btn alazea-btn mr-30">Simpan</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-12 col-md-12 mt-5">
                <h4>Gejala Terpilih</h4>
                <form action="" method="post">
                    <div class="contact--thumbnail">
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Penyakit</th>
                                    <th>Bobot Penyakit</th>
                                    <th>Gejala Dipilih</th>
                                    <th>Bobot Aturan</th>
                                    <th>Perkalian</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <?php 
                            $rows = mysqli_query($koneksi,"SELECT * FROM hamapenyakit GROUP BY Nm_penyakit");
                            foreach($rows as $row){
                                $penyakit[$row['Kd_penyakit']] = $row;
                            }

                            $data = get_data($selected);
                            $bayes = bayes($data, $penyakit);
                            
                            foreach($data as $key => $val):?>
                            <tr>
                                <td rowspan="<?=count($val)?>"><?=$penyakit[$key]['Nm_penyakit']?></td>
                                <td rowspan="<?=count($val)?>"><?=$penyakit[$key]['bobot']?></td>        
                                <td><?=$gejala[key($val)]?></td>
                                <td><?=current($val)?></td>
                                <td rowspan="<?=count($val)?>"><?=round($bayes['kali'][$key], 4)?></td>
                                <td rowspan="<?=count($val)?>"><?=round($bayes['hasil'][$key], 4)?></td>
                            </tr>
                            <?php 
                            /** menghilangkan elemen pertama array tanpa menghilangkan key */
                            unset($val[key($val)]); 
                                
                            foreach($val as $k => $v):?>
                            <tr>
                                <td><?=$gejala[$k]?></td>
                                <td><?=$v?></td>
                            </tr>    
                            <?php endforeach?>      
                            <?php endforeach?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td colspan="2"><?=round($bayes['total'], 4)?></td>
                            </tr>
                        </table>
                        </div>
                        <?php
                        arsort($bayes['hasil']);
                        ?>   
                        <div style="padding:10px 0px 10px 0px" class="text-center">
                        Hasil Terbesar Didapatkan oleh Penyakit = <strong><?=$penyakit[key($bayes['hasil'])]['Nm_penyakit']?></strong> dengan Nilai = <strong><?=round(current($bayes['hasil']), 4)?></strong>
                            <div style="margin-top:10px" class="welcome-btn-group mb-30">
                                <a href="konsultasi.php" class="btn alazea-btn mr-30">Konsultasi Lagi</a>
                            </div>
                        </div>      
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->
    
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