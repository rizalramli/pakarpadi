<?php 
if(isset($_POST['update']))
{
    $id_tentang = $_POST['id_tentang'];
    $nama_tentang = $_POST['nama_tentang'];
    $query_update = mysqli_query($koneksi,"UPDATE tentang SET Nm_tentang='$nama_tentang' WHERE id_tentang='$id_tentang'");
    if ($query_update) {
        echo "<script>window.location = 'admin.php?halaman=tentang'</script>";
    }
}
?>
<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
<script src="assets/plugins/ckeditor/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <h3>Data Tentang</h3>
                <div class="card card-outline">
                    <div class="card-header">
                        <!--<h3 class="card-title">
                            Data Tentang
                        </h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <form class="form-horizontal" method="post" action="">
                            <div class="mb-3">
                                <?php
                                $query = mysqli_query($koneksi,"SELECT * FROM tentang");
                                foreach ($query as $data) {
                                ?><input type="hidden" class="form-control" name="id_tentang" value="<?php echo $data['id_tentang']; ?>">
                                    <textarea name="nama_tentang" class="form-control" rows="10"><?php echo $data['Nm_tentang']; ?></textarea>
                                <?php } ?>
                            </div>
                            <p class="text-sm mb-0">
                                <button type="submit" name="update" class="btn btn-primary">Simpan Data</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
</div>
<script>
    CKEDITOR.replace('nama_tentang');
</script>