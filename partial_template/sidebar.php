
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!--WARNA PADA MENU-->
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">

    <span class="brand-text font-weight-light" style="color: #0099cc
    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SISTEM PAKAR</b></span>
  </a>

  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
        <li class="nav-item">
          <a href="?halaman=beranda" class="nav-link <?php if($_GET['halaman'] == 'beranda'){echo 'active';} ?>">
            <i class="fa fa-home nav-icon"></i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=penyakit" class="nav-link <?php if($_GET['halaman'] == 'penyakit'){echo 'active';} if($_GET['halaman'] == 'edit_penyakit'){echo 'active';} if($_GET['halaman'] == 'tambah_penyakit'){echo 'active';} ?>">
            <i class="fa fa-bug nav-icon"></i>
            <p>Data Hama Penyakit</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=gejala" class="nav-link <?php if($_GET['halaman'] == 'gejala'){echo 'active';} ?>">
            <i class="fa fa-eye-dropper nav-icon"></i>
            <p>Data Gejala</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="fa fa-history nav-icon"></i>
            <p>Data Riwayat</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=user" class="nav-link <?php if($_GET['halaman'] == 'user'){echo 'active';} ?>">
            <i class="fa fa-users nav-icon"></i>
            <p>User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=tentang" class="nav-link <?php if($_GET['halaman'] == 'tentang'){echo 'active';} ?>">
            <i class="fa fa-info nav-icon"></i>
            <p>Tentang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=petunjuk" class="nav-link <?php if($_GET['halaman'] == 'petunjuk'){echo 'active';} ?>">
            <i class="fa fa-question nav-icon"></i>
            <p>Petunjuk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?halaman=saran" class="nav-link <?php if($_GET['halaman'] == 'saran'){echo 'active';} ?>">
            <i class="fa fa-file nav-icon"></i>
            <p>Saran Pengguna</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>