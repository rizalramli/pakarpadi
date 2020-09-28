<?php 
include 'koneksi/koneksi.php';
if(isset($_POST['hapus_aturan']))
{
    $Kd_penyakit = $_POST['kd_penyakit_edit'];
    $kodegejala = $_POST['kd_gejala_edit'];
    $query_delete_aturan = mysqli_query($koneksi,"DELETE FROM hamapenyakit WHERE Kd_gejala='$kodegejala' AND Kd_penyakit='$Kd_penyakit'");
    if($kodegejala)
    {
        echo '<script>window.location = "admin.php?halaman=edit_penyakit&edit='.$Kd_penyakit.'"</script>';   
    }
}
?>