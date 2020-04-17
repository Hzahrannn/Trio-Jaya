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
$jmlh = $_POST['jmlh'];
$j = $_POST['j1'];
$k = ($jmlh-$j);
$tgl=date('h:i:s a');


$update = "UPDATE tb_barang SET jmlh='$jmlh' WHERE kd_brg='$kd'";
$result = mysqli_query($db,$update);
if ($result) {
		echo "<script>
			Swal.fire('Sukses.', 'Berhasil Restock Barang !', 'success').then(function(){
				setTimeout(document.location.href = 'masuk.php', 100);
				})
				</script>";
		$insert = "INSERT INTO tb_masuk(kd_brg, jmlh,tanggal) VALUES('$kd','$k','$tgl')";

		if ($db->query($insert) === TRUE) {
			
		} else {

		}

}
	else{
		echo "<script>
			Swal.fire('Gagal.', 'Gagal Restock Barang !', 'error').then(function(){
				setTimeout(document.location.href = 'masuk.php', 100);
				})
				</script>";
	}


?>



</body>
</html>
