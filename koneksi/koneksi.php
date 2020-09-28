<?php

$koneksi = mysqli_connect("localhost", "root", "", "pakarpadi");
if (!$koneksi) {
	echo "koneksi gagal = " . mysqli_connect_error();
}
?>