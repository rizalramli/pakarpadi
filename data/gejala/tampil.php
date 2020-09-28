<?php 
 // Membuat Kode otomatis
 $sql = mysqli_query($koneksi, "SELECT max(Kd_gejala) FROM gejala");
 $kode_faktur = mysqli_fetch_array($sql);
 if ($kode_faktur) {
   $nilai = substr($kode_faktur[0], 1);
   $kode = (int) $nilai;
   //tambahkan sebanyak + 1
   $kode = $kode + 1;
   $auto_kode = "G" . str_pad($kode, 1, "0",  STR_PAD_LEFT);
 } else {
   $auto_kode = "G1";
 }
if(isset($_POST['simpan']))
{
    $kodegejala = $_POST['kodegejala'];
    $namagejala = $_POST['namagejala'];
    $query_insert = mysqli_query($koneksi, "INSERT INTO gejala (Kd_gejala,Nm_gejala) VALUES ('$kodegejala','$namagejala') ");
    if ($query_insert) {
        echo "<script>window.location = 'admin.php?halaman=gejala'</script>";
    }
}
if(isset($_GET['hapus']))
{
    $kodegejala = $_GET['hapus'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM gejala WHERE Kd_gejala='$kodegejala'");
    if($query_delete)
    {
        echo "<script>window.location = 'admin.php?halaman=gejala'</script>";   
    }
}
if(isset($_POST['update']))
{
    $kodegejala = $_POST['kodegejala'];
    $namagejala = $_POST['namagejala'];
    $query_update = mysqli_query($koneksi,"UPDATE gejala SET Nm_gejala='$namagejala' WHERE Kd_gejala='$kodegejala'");
    if ($query_update) {
        echo "<script>window.location = 'admin.php?halaman=gejala'</script>";
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
            <h3>Data Gejala</h3>
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
                                    <th style="width: 1%;">Kode Gejala</th>
                                    <th style="width: 8%;">Nama Gejala</th>
                                    <th style="text-align: center; width: 2%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            $query = mysqli_query($koneksi,"SELECT * FROM gejala");
                            foreach($query as $data) :
                            ?>
                                    <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td><?php echo $data['Kd_gejala'] ?></td>
                                    <td><?php echo $data['Nm_gejala'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $data['Kd_gejala'] ?>">
                                                <button class="btn-sm btn-primary">
                                                    Ubah
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data?')" href="?halaman=gejala&hapus=<?php echo $data['Kd_gejala'] ?>" title="Hapus">
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
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Kode Gejala</label>
                        <div class="col-sm-8">
                            <input type="type" required autocomplete="off" class="form-control" value="<?php echo $auto_kode ?>" name="kodegejala" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nama Gejala</label>
                        <div class="col-sm-8">
                            <textarea name="namagejala" required class="form-control" rows="3"></textarea>
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
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $data['Kd_gejala']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="kodegejala" value="<?php echo $data['Kd_gejala']; ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Gejala</label>
                            <div class="col-sm-12">
                                <textarea name="namagejala" required class="form-control" rows="3"><?php echo $data['Nm_gejala']; ?></textarea>
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