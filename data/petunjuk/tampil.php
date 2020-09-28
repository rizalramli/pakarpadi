<?php 
if(isset($_POST['simpan']))
{               
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $photo = $_FILES['photo']['name'];
    $x = explode('.', $photo);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];	

     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'assets/img/petunjuk/'.$photo);
        }else{
            echo "<script>alert('Ukuran foto terlalu besar!');</script>";
        }
    }else{
            echo "<script>alert('Ekstensi file tidak diperbolehkan');</script>";
    }
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $query_insert = mysqli_query($koneksi,"INSERT INTO bantuan (id_bantuan,kategori,foto,deskripsi) VALUES(NULL,'$kategori','$photo','$deskripsi')");
    if ($query_insert) {
        echo "<script>window.location = 'admin.php?halaman=petunjuk'</script>";
    }    
}

if(isset($_POST['update']))
{
    $id_bantuan = $_POST['id_bantuan'];
    $foto = $_POST['foto'];
    $post_foto = $_FILES['photo']['name'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    // echo $id_bantuan."-".$kategori."-".$foto."-".$deskripsi;
    if($post_foto == NULL)
    {
        $query_update = mysqli_query($koneksi,"UPDATE bantuan SET kategori='$kategori',foto='$foto',deskripsi='$deskripsi' WHERE id_bantuan='$id_bantuan'");    
    }
    else 
    {
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $photo = $_FILES['photo']['name'];
        $x = explode('.', $photo);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];	

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, 'assets/img/petunjuk/'.$photo);
            }else{
                echo "<script>alert('Ukuran foto terlalu besar!');</script>";
            }
        }else{
                echo "<script>alert('Ekstensi file tidak diperbolehkan');</script>";
        }
        $query_update = mysqli_query($koneksi,"UPDATE bantuan SET kategori='$kategori',foto='$photo',deskripsi='$deskripsi' WHERE id_bantuan='$id_bantuan'");        
    }
    if ($query_update) {
        echo "<script>window.location = 'admin.php?halaman=petunjuk'</script>";
    }
}

if(isset($_GET['hapus']))
{
    $id_bantuan = $_GET['hapus'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM bantuan WHERE id_bantuan='$id_bantuan'");
    if($query_delete)
    {
        echo "<script>window.location = 'admin.php?halaman=petunjuk'</script>";   
    }
}
?>
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
            <div class="col-12">
                <!-- /.card -->
                <h3>Data Petunjuk</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="#" data-toggle="modal" data-target="#modal_Add" class="btn btn-block btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                                <!-- <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Tambah Data</button> -->
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 8%;">Gambar</th>
                                    <th style="width: 15%;">Keterangan</th>
                                    <th style="width: 3%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($koneksi,"SELECT * FROM bantuan");
                                foreach ($query as $data) : // menampilkan data bantuan
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++; ?>.</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal_foto<?php echo $data['id_bantuan']; ?>"><img width="100%" src="assets/img/petunjuk/<?php echo $data['foto']; ?>" /></a>
                                        </td>
                                        <td>
                                            <?php echo $data['deskripsi']; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $data['id_bantuan']; ?>">
                                                <button class="btn-sm btn-primary">
                                                    Ubah
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data?')" href="?halaman=petunjuk&hapus=<?php echo $data['id_bantuan'] ?>" title="Hapus">
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
<!-- </div>
/.content-wrapper -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" name="kategori" id="" class="form-control col-md-12" value="" required autocomplete="off" placeholder="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <textarea name="deskripsi" rows="8" class="form-control" required placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-12">
                            <input class="col-md-12" type="file" required name="photo" id="photo" />
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
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $data['id_bantuan']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Kategori</label>
                            <div class="col-sm-12">
                                <input type="hidden" value="<?php echo $data['id_bantuan']; ?>" name="id_bantuan">
                                <input type="text" name="kategori" id="" required class="form-control col-md-12" value="<?php echo $data['kategori']; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <textarea name="deskripsi" rows="8" required class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-12">
                                <input type="hidden" value="<?php echo $data['foto']; ?>" name="foto">
                                <input type="file" class="control" name="photo">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="update">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>