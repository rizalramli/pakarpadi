<?php 
if(isset($_POST['simpan']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    if($password == $konfirmasi_password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT); // fungsi mengenkripsi data
        $query_insert = mysqli_query($koneksi, "INSERT INTO admin (Kd_admin,username,password,role) VALUES (NULL,'$username','$password','Admin') ");
        if ($query_insert) {
            echo "<script>window.location = 'admin.php?halaman=user'</script>";
        }
    }
    else
    {
        echo "<script>alert('Password dan konfirmasi tidak sama');</script>";
    }
}
if(isset($_GET['hapus']))
{
    $kd_admin = $_GET['hapus'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM admin WHERE Kd_admin='$kd_admin'");
    if($query_delete)
    {
        echo "<script>window.location = 'admin.php?halaman=user'</script>";   
    }
}
if(isset($_POST['update']))
{
	$kd_admin = $_POST['kd_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    if($password == $konfirmasi_password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT); // fungsi mengenkripsi data
        $query_update = mysqli_query($koneksi,"UPDATE admin SET username='$username',password='$password' WHERE Kd_admin='$kd_admin'");
        if ($query_update) {
            echo "<script>window.location = 'admin.php?halaman=user'</script>";
        }
    }
    else
    {
        echo "<script>alert('Password dan konfirmasi tidak sama');</script>";
    }
	
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
            <h3>Data User</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="#" data-toggle="modal" data-target="#modal_Add" class="btn btn-block btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 1%;">No.</th>
                                    <th style="width: 1%;">Username</th>
                                    <th style="width: 8%;">Password</th>
                                    <th style="width: 1%;">Role</th>
                                    <th style="text-align: center; width: 2%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            $query = mysqli_query($koneksi,"SELECT * FROM admin ORDER BY role ASC");
                            foreach($query as $data) :
                            ?>
                                    <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td>xxxxx</td>
                                    <td><?php echo $data['role'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $data['Kd_admin'] ?>">
                                                <button class="btn-sm btn-primary">
                                                    Ubah
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data?')" href="?halaman=user&hapus=<?php echo $data['Kd_admin'] ?>" title="Hapus">
                                                <button class="btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="">
                <div class="modal-body">
                    <div class="form-group">
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="type" required autocomplete="off" class="form-control" name="username" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" required autocomplete="off" class="form-control" name="password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Konfirmasi Password</label>
                            <div class="col-sm-12">
                                <input type="password" required autocomplete="off" class="form-control" name="konfirmasi_password" placeholder="">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
foreach ($query as $data) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $data['Kd_admin']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="">
                    <div class="modal-body">
                        <input type="hidden" name="kd_admin" value="<?php echo $data['Kd_admin'] ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="type" required autocomplete="off" class="form-control" name="username" placeholder="" value="<?php echo $data['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" required autocomplete="off" class="form-control" name="password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Konfirmasi Password</label>
                            <div class="col-sm-12">
                                <input type="password" required autocomplete="off" class="form-control" name="konfirmasi_password" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>