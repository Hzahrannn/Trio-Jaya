<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="build/js/sweetalert2.js"></script>
<?php

require_once( "db.php");

$kd = $_GET['id'];
$a=1;
$b=0;
                  $sql = "SELECT * FROM tb_cart WHERE kd_brg='$kd'";
                  $result = $db->query($sql);
                  if(mysqli_num_rows($result) == 0){
                                $insert = "INSERT INTO tb_cart( kd_brg, qty) VALUES('$kd','$a')";
                                $result = mysqli_query($db,$insert);
                                if ($result) {
		echo "<script>
			Swal.fire('Sukses.', 'Berhasil Memasukan Barang !', 'success').then(function(){
				setTimeout(document.location.href = 'transaksi.php', 100);
				})
				</script>";
			}
			else{
		echo "<script>
			Swal.fire('Gagal.', 'Gagal Memasukan Barang !', 'error').then(function(){
				setTimeout(document.location.href = 'transaksi.php', 100);
				})
				</script>";
	}
                            }
                            else{
								while($row = $result->fetch_assoc()){
								$b = ($row['qty'] + $a);
                            	}
                                $update = "UPDATE tb_cart SET qty='$b' WHERE kd_brg='$kd'";
								$result = mysqli_query($db,$update);
								if ($result) {
		echo "<script>
			Swal.fire('Sukses.', 'Berhasil Memasukan Barang !', 'success').then(function(){
				setTimeout(document.location.href = 'transaksi.php', 100);
				})
				</script>";
			}
			else{
		echo "<script>
			Swal.fire('Gagal.', 'Gagal Memasukan Barang !', 'error').then(function(){
				setTimeout(document.location.href = 'transaksi.php', 100);
				})
				</script>";
	}
                            }




?>
</body>
</html>
