<?php 
 // Membuat Kode otomatis
 $sql = mysqli_query($koneksi, "SELECT max(Kd_penyakit) FROM hamapenyakit");
 $kode_faktur = mysqli_fetch_array($sql);
 if ($kode_faktur) 
    {
        $nilai = substr($kode_faktur[0], 2);
        $kode = (int) $nilai;
        //tambahkan sebanyak + 1
        $kode = $kode + 1;
        $auto_kode = "HP" . str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
        $auto_kode = "HP01";
    }
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
            move_uploaded_file($file_tmp, 'assets/img/hamapenyakit/'.$photo);
        }else{
            echo "<script>alert('Ukuran foto terlalu besar!');</script>";
        }
    }else{
            echo "<script>alert('Ekstensi file tidak diperbolehkan');</script>";
    }
    $kode_penyakit = $_POST['kode'];
    $nama_hama_penyakit = $_POST['namapenyakit'];
    $definisi = $_POST['Definisi'];
    $kategori = $_POST['kategori'];
    $saran = $_POST['Saran'];
    $bobot = $_POST['bobot'];
    for ($i = 0; $i < count($_POST['gejala']); $i++) {
        $kode_gejala = $_POST['gejala'][$i];
        $nama_gejala = $_POST['namagejala'][$i];
        $nilai = $_POST['nilai'][$i];
        $query_insert = mysqli_query($koneksi,"INSERT INTO hamapenyakit (id_penyakit,Kd_penyakit,Nm_penyakit,Definisi,kategori,Kd_gejala,Gejala,Saran,foto,bobot,nilai) VALUES(NULL,'$kode_penyakit','$nama_hama_penyakit','$definisi','$kategori','$kode_gejala','$nama_gejala','$saran','$photo','$bobot','$nilai')");
    }
    if ($query_insert) {
        echo "<script>window.location = 'admin.php?halaman=penyakit'</script>";
    }    
}
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
                    <form action="" method="post" enctype="multipart/form-data">
                    <h4>Kode : <?php echo $auto_kode; ?></h4>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" autocomplete="off" required type="text" name="namapenyakit" min="0" placeholder="" />
                                        <input class="form-control" autocomplete="off" required type="hidden" name="kode" min="0" placeholder="" value="<?php echo $auto_kode ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Bobot</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" autocomplete="off" required type="text" name="bobot" min="0" placeholder="" />
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
                                            <option value="Hama">Hama</option>
                                            <option value="Penyakit">Penyakit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="control" autocomplete="off" required name="photo" id="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Definisi</label>
                                    <div class="col-sm-8">
                                        <textarea name="Definisi" id="" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Saran</label>
                                    <div class="col-sm-8">
                                        <textarea name="Saran" id="" class="form-control" cols="30" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-4 control-label">Pilih Gejala :</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 7%; text-align: center;">#</th>
                                            <th style="width: 15%; text-align: center;">Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                            <th style="width: 15%; text-align: center;">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY Kd_gejala + 0");
                                        foreach ($query as $data) {
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><input type="checkbox" id="checkItem" name="gejala[]" value="<?php echo $data['Kd_gejala']; ?>"></td>
                                                <td><?php echo $data['Kd_gejala']; ?></td>
                                                <td>
                                                    <?php echo $data['Nm_gejala']; ?>
                                                    <input type="hidden" value="<?php echo $data['Nm_gejala']; ?>" name="namagejala[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="nilai[]">
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col justify-content-center">
                            <div class="col-12 col-sm-12 col-lg">
                                <div class="single-benefits-area wow fadeInDown mb-10" data-wow-delay="80ms">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary col-md-2" name="simpan">Simpan Data</button>
                                    </div>
                                </div>
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
<!-- /.content -->
<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>