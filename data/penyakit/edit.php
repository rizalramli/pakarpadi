<?php 
$id = $_GET['edit'];
$query = mysqli_query($koneksi,"SELECT * FROM hamapenyakit WHERE Kd_penyakit='$id' GROUP BY Kd_penyakit");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
        </div><!-- /.container-fxluid -->
    </div>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <a href="?halaman=penyakit"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_POST['update_penyakit']))
                    {
                        $id_penyakit = $_POST['id_penyakit'];
                        $nama_penyakit = $_POST['nama_penyakit'];
                        $bobot = $_POST['bobot'];
                        $kategori = $_POST['kategori'];
                        $definisi = $_POST['Definisi'];
                        $saran = $_POST['Saran'];
                        $foto = $_POST['foto'];
                        $post_foto = $_FILES['photo']['name'];
                        $kategori = $_POST['kategori'];
                        // echo $id_bantuan."-".$kategori."-".$foto."-".$deskripsi;
                        if($post_foto == NULL)
                        {
                            $query_update = mysqli_query($koneksi,"UPDATE hamapenyakit SET Nm_penyakit='$nama_penyakit',definisi='$definisi',kategori='$kategori',saran='$saran',foto='$foto',bobot='$bobot' WHERE Kd_penyakit='$id_penyakit'");    
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
                                    move_uploaded_file($file_tmp, 'assets/img/hamapenyakit/'.$photo);
                                }else{
                                    echo "<script>alert('Ukuran foto terlalu besar!');</script>";
                                }
                            }else{
                                    echo "<script>alert('Ekstensi file tidak diperbolehkan');</script>";
                            }
                            $query_update = mysqli_query($koneksi,"UPDATE hamapenyakit SET Nm_penyakit='$nama_penyakit',definisi='$definisi',kategori='$kategori',saran='$saran',foto='$photo',bobot='$bobot' WHERE Kd_penyakit='$id_penyakit'");    

                        }
                        if ($query_update) {
                            echo '<script>window.location = "admin.php?halaman=edit_penyakit&edit='.$id_penyakit.'"</script>';   
                        }
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                        <?php 
                        foreach($query as $data):
                        ?>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" autocomplete="off" required type="text" name="nama_penyakit" min="0" placeholder="" value="<?php echo $data['Nm_penyakit'] ?>" />
                                        <input class="form-control" autocomplete="off" required type="hidden" name="id_penyakit" min="0" placeholder="" value="<?php echo $data['Kd_penyakit'] ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Bobot</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" autocomplete="off" required type="text" name="bobot" min="0" placeholder="" value="<?php echo $data['bobot'] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Kategori</label>
                                    <div class="col-sm-8">
                                    <select name="kategori" id="" class="form-control col-sm-5">
                                            <option value="Hama" <?php if($data['kategori'] == "Hama"){echo "selected";} ?>>Hama</option>
                                            <option value="Penyakit" <?php if($data['kategori'] == "Penyakit"){echo "selected";} ?>>Penyakit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="foto" value="<?php echo $data['foto'] ?>">
                                        <input type="file" class="control" autocomplete="off" name="photo" id="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Definisi</label>
                                    <div class="col-sm-8">
                                        <textarea name="Definisi" id="" class="form-control" cols="30" rows="5" required><?php echo $data['Definisi'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Saran</label>
                                    <div class="col-sm-8">
                                        <textarea name="Saran" id="" class="form-control" cols="30" rows="5" required><?php echo $data['Saran'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="row">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-primary" type="submit" name="update_penyakit">Update Penyakit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row pt-5">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                            <h4>Aturan</h4>
                            <a style="margin-bottom:10px" href="#" data-toggle="modal" data-target="#modal_Add" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 7%; text-align: center;">No</th>
                                            <th style="width: 15%; text-align: center;">Kode Gejala</th>
                                            <th style="text-align: center;">Nama Gejala</th>
                                            <th style="width: 15%; text-align: center;">Nilai</th>
                                            <th style="width: 15%; text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query2 = mysqli_query($koneksi,"SELECT * FROM hamapenyakit WHERE Kd_penyakit='$id' ORDER BY Kd_gejala + 0");
                                        foreach ($query2 as $data2) {
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $no++ ?></td>
                                                <td><?php echo $data2['Kd_gejala']; ?></td>
                                                <td>
                                                    <?php echo $data2['Gejala']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data2['nilai']; ?>                                       
                                                </td>
                                                <td>
                                                    <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $data2['Kd_gejala']."-".$data['Kd_penyakit'] ?>">
                                                    <button class="btn-sm btn-primary">
                                                        Ubah
                                                    </button>
                                                    </a>
                                                    <form action="hapus_aturan.php" method="post">
                                                        <input type="hidden" name="kd_penyakit_edit" value="<?php echo $data['Kd_penyakit'] ?>">
                                                        <input type="hidden" name="kd_gejala_edit" value="<?php echo $data2['Kd_gejala'] ?>">
                                                        <button class="btn-sm btn-danger" name="hapus_aturan">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <?php 
            if(isset($_POST['simpan_aturan']))
            {
                $kd_penyakit_lawas = $_POST['kd_penyakit_lawas'];
                $nama_lawas = $_POST['nama_lawas'];
                $definisi_lawas = $_POST['definisi_lawas'];
                $kategori_lawas = $_POST['kategori_lawas'];
                $gabungan_gejala = $_POST['gabungan_gejala'];
                $pecah = explode("-",$gabungan_gejala);
                $kd_gejala_lawas = $pecah[0];
                $gejala_lawas = $pecah[1];
                $saran_lawas = $_POST['saran_lawas'];
                $bobot_lawas = $_POST['bobot_lawas'];
                $foto_lawas = $_POST['foto_lawas'];
                $nilai = $_POST['nilai'];
                $cek_insert = mysqli_query($koneksi,"SELECT * FROM hamapenyakit WHERE Kd_penyakit='$kd_penyakit_lawas' AND Kd_gejala='$kd_gejala_lawas'");
                $ceks = mysqli_num_rows($cek_insert);
                if($ceks == 0)
                {
                    $query_insert_aturan = mysqli_query($koneksi,"INSERT INTO hamapenyakit (id_penyakit,Kd_penyakit,Nm_penyakit,Definisi,kategori,Kd_gejala,Gejala,Saran,foto,bobot,nilai) VALUES(NULL,'$kd_penyakit_lawas','$nama_lawas','$definisi_lawas','$kategori_lawas','$kd_gejala_lawas','$gejala_lawas','$saran_lawas','$foto_lawas','$bobot_lawas','$nilai')");
                    echo '<script>window.location = "admin.php?halaman=edit_penyakit&edit='.$kd_penyakit_lawas.'"</script>';   
                }
                else 
                {
                    echo "<script>alert('Gejala tersebut sudah ada');</script>";      
                }

            }
            ?>
            <form class="form-horizontal" method="post" action="">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nama Gejala</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="kategori_lawas" value="<?php echo $data['kategori'] ?>">
                            <input type="hidden" name="definisi_lawas" value="<?php echo $data['Definisi'] ?>">
                            <input type="hidden" name="saran_lawas" value="<?php echo $data['Saran'] ?>">
                            <input type="hidden" name="bobot_lawas" value="<?php echo $data['bobot'] ?>">
                            <input type="hidden" name="nama_lawas" value="<?php echo $data['Nm_penyakit'] ?>">
                            <input type="hidden" name="kd_penyakit_lawas" value="<?php echo $data['Kd_penyakit'] ?>">
                            <input type="hidden" name="foto_lawas" value="<?php echo $data['foto'] ?>">
                            <select name="gabungan_gejala" id="" class="form-control">
                                <?php
                                $query3 = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY Kd_gejala + 0");
                                foreach($query3 as $data3):
                                ?>
                                <option value="<?php echo $data3['Kd_gejala']."-".$data3['Nm_gejala'] ?>"><?php echo $data3['Nm_gejala'] ?></option>
                                <?php 
                                endforeach
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nilai</label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="simpan_aturan">Simpan Aturan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
  if(isset($_POST['update_aturan']))
  {
        $kd_penyakit_lawas = $_POST['kd_penyakit_lawas'];
        $kd_gejala_lawas = $_POST['kd_gejala_lawas'];
        $nilai = $_POST['nilai'];
        $query_update_aturan = mysqli_query($koneksi,"UPDATE hamapenyakit SET nilai='$nilai' WHERE Kd_penyakit='$kd_penyakit_lawas' AND Kd_gejala='$kd_gejala_lawas'");
        echo '<script>window.location = "admin.php?halaman=edit_penyakit&edit='.$kd_penyakit_lawas.'"</script>';   
  }
foreach ($query2 as $data2) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $data2['Kd_gejala']."-".$data['Kd_penyakit']; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nama Gejala</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="kd_penyakit_lawas" value="<?php echo $data['Kd_penyakit'] ?>">
                            <input type="hidden" name="kd_gejala_lawas" value="<?php echo $data2['Kd_gejala'] ?>">
                            <input type="text" name="gejala_lawas" class="form-control" value="<?php echo $data2['Gejala'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nilai</label>
                        <div class="col-sm-8">
                            <input type="text" name="nilai" class="form-control" value="<?php echo $data2['nilai'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="update_aturan">Update Aturan</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- /.content -->
<?php endforeach ?>

<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>