
    <?php 
    include 'koneksi/koneksi.php';
    session_start();
    include "koneksi/koneksi.php";
    if (!isset($_SESSION['username_user'])) {
        header('location:index.php');
    }
	include "partial_template/head.php"; 
	include "partial_template/sidebar.php"; 				
        if(!isset($_GET['halaman'])) {
            error_reporting(0);
        }
        // if ($_GET['halaman'] == 'dashboard') {
        //     include "dashboard/dashboard_admin.php";
        // }
        // Tutup Dashboard

        // Parsing halaman Pegawai
        if ($_GET['halaman'] == 'beranda') {
            include "data/beranda/tampil.php";
        }
        if ($_GET['halaman'] == 'penyakit') {
            include "data/penyakit/tampil.php";
        }
        if ($_GET['halaman'] == 'tambah_penyakit') {
            include "data/penyakit/tambah.php";
        }
        if ($_GET['halaman'] == 'edit_penyakit') {
            include "data/penyakit/edit.php";
        }
        if ($_GET['halaman'] == 'gejala') {
            include "data/gejala/tampil.php";
        }
        if ($_GET['halaman'] == 'tentang') {
            include "data/tentang/tampil.php";
        }
        if ($_GET['halaman'] == 'petunjuk') {
            include "data/petunjuk/tampil.php";
        }
        if ($_GET['halaman'] == 'saran') {
            include "data/saran_pengguna/tampil.php";
        }
        if ($_GET['halaman'] == 'user') {
            include "data/user/tampil.php";
        }
                
	include "partial_template/footer.php";  
	?>
