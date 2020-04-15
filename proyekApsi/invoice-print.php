<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nota</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> FOTOKOPI TRIO JAYA
          <?php
          require_once( "db.php");
          $kd = $_GET['id'];
          $sql = "SELECT * FROM tb_nota kd_nota ='$kd';";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                    $a = $row['kd_nota'];
                    $b = $row['id_trn'];
                    $c = $row['tanggal'];
                    $d = $row['total'];
                  }
          ?>
          <small class="float-right">Date: <?php echo $c;?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <!-- /.col -->
      <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <b>No Nota <?php echo $a;?></b><br>
                  <b>ID Transaksi:</b> <?php echo $b;?><br><br>
                </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
                      <th>Qty  </th>
                      <th>Barang  </th>
                      <th>Kode Barang  </th>
                      <th>Harga  </th>
                      <th>Subtotal  </th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php
                  require_once( "db.php");
                  $sub=0;
                  $sql = "SELECT * FROM ((
                  tb_nota INNER JOIN tb_transaksi ON tb_nota.id_trn = tb_transaksi.id_trn) 
                      INNER JOIN tb_barang ON tb_transaksi.kd_brg = tb_barang.kd_brg) WHERE kd_nota ='$a';";
                  $result = $db->query($sql);
                  if(mysqli_num_rows($result) == 0){
                                echo '<tr><td colspan="8">Tidak ada data.</td></tr>';
                            }
                            else{
                                while($row = $result->fetch_assoc()){
                                    echo '
                                    <tr>
                                        
                                        <td>'.$row['qty'].'</td>
                                        <td>'.$row['nm_brg'].'</td>
                                        <td>'.$row['kd_brg'].'</td>
                                        <td>Rp '.number_format($row['harga']).'</td>
                                        <td>Rp '.number_format($row['harga'] * $row['qty']) .'</td>
                                         
                                        
                                    </tr>
                                    ';
                                    $sub = $sub + ($row['harga'] * $row['qty'] );
                                }
                            }
                            ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Tanggal Transaksi 2/01/2020</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp <?php echo number_format($d);?></td>
                      </tr>
                      <tr>
                        <th>Pajak</th>
                        <td>Rp 0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>Rp 0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>Rp <?php echo number_format($d);?></td>
                      </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->


<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
<br><a href="transaksi.php">Kembali</a>
</body>
</html>
