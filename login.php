<?php 
    include "koneksi/koneksi.php";
    if(isset($_POST['login']))
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username'");
        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        if($cek > 0)
        {
            if(password_verify($_POST['password'],$data['password']))
            {

                $_SESSION['kd_admim'] = $data['Kd_admin'];
                $_SESSION['username_user'] = $data['username'];
                $_SESSION['role'] = $data['role'];

                if($data['role'] == 'Admin')
                {
                    header("location:admin.php?halaman=beranda");
                }
                if($data['role'] == 'Customer')
                {
                    header("location:konsultasi.php");
                }
            }
            else
            {
            echo "<script>alert('username atau password anda salah');</script>";
            }
        }
        else{
            echo "<script>alert('username atau password anda salah');</script>";
        }
    }
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
                                <h2 style="padding-top:150px">Login User</h2>
                                <div style="padding:30px 200px 200px 200px">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-control" id="contact-name" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" id="contact-email" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="login" class="btn alazea-btn mt-15">Login</button>
                                                <br>
                                                <a href="register.php" style="color:white">belum punya akun?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

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