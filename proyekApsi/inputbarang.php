<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="build/js/sweetalert2.js"></script>
<?php

require_once( "db.php");

$kd = $_POST['kd_brg'];
$nm = $_POST['nm_brg'];
$jmlh = $_POST['jmlh'];
$rak = $_POST['rak'];
$harga = $_POST['harga'];
$tgl=date('l, d-m-Y');

$insert = "INSERT INTO tb_barang( kd_brg, nm_brg, jmlh, rak, harga) VALUES('$kd', '$nm', '$jmlh', '$rak', '$harga')";
$result = mysqli_query($db,$insert);
if ($result) {
		echo "<script>
			Swal.fire('Sukses.', 'Berhasil Memasukan Barang !', 'success').then(function(){
				setTimeout(document.location.href = 'masuk.php', 100);
				})
				</script>";

		$insert = "INSERT INTO tb_masuk(kd_brg, jmlh,tanggal) VALUES('$kd','$jmlh','$tgl')";

		if ($db->query($insert) === TRUE) {
			
		} else {

		}

	}
	else{
		echo "<script>
			Swal.fire('Gagal.', 'Gagal Memasukan Barang !', 'error').then(function(){
				setTimeout(document.location.href = 'masuk.php', 100);
				})
				</script>";
	}





?>
</body>
</html>
