<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="build/js/sweetalert2.js"></script>
<?php

require_once( "db.php");

$tgl=date('l, d-m-Y  h:i:s a');
$tgl1=date('h:i:s a');
$a=0;
$h=0;
$sub=0;
                  $sql = "SELECT * FROM tb_cart
                          INNER JOIN tb_barang ON tb_cart.kd_brg = tb_barang.kd_brg;";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                  	$h = ($row['harga'] * $row['qty']);
                  	$a = ($row['qty'] + $a);
                  	$sub = $sub + $h; 
                  }


                  $sql = "SELECT count(kd_nota) AS kode FROM tb_nota;";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                  	$kode = $row['kode'];
                  }

$c = "#KN0".$kode;
$b = md5($tgl1 ."". $a);

				  $sql = "SELECT * FROM tb_cart;";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                  	$d1 = $row['kd_brg'];
                  	$d2 = $row['qty'];
                  	$insert = "INSERT INTO tb_transaksi(id_trn, kd_brg,qty) VALUES('$b','$d1','$d2')";
					if ($db->query($insert) === TRUE){
					}
					else{
					}

                  }

                  $insert = "INSERT INTO tb_nota(kd_nota,id_trn,tanggal,total) VALUES('$c','$b','$tgl','$sub')";
					if ($db->query($insert) === TRUE){
						echo "<script>
			Swal.fire('Transaksi Berhasil', 'Cetak Nota !', 'success').then(function(){
				setTimeout(document.location.href = 'invoice-print.php?id=$c', 100);
				})
				</script>";
					
				$delete = "DELETE FROM tb_cart";
					if ($db->query($delete) === TRUE){
					}
					else{
					}

					}
					else{
					}
?>
</body>
</html>
