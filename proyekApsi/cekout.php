<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script src="build/js/sweetalert2.js"></script>
<?php

require_once( "db.php");


                  $sql = "SELECT * FROM tb_cart INNER JOIN tb_barang ON tb_cart.kd_brg = tb_barang.kd_brg;";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                  	$a = $row['kd_brg'];
                  	$b = $row['qty'];
                  	$c = $row['harga'];
                  }

?>
</body>
</html>
