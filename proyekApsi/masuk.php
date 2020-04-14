<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Input Barang Masuk</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Cari Barang" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="starter.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="transaksi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Transaksi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Barang Masuk</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Barang Masuk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Letak Rak</th>
                  <th>Harga</th>
                  <th>Restok</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  require_once( "db.php");
                  $sql = "SELECT * FROM tb_barang";
                  $result = $db->query($sql);
                  while($row = $result->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $row["kd_brg"];?></td>
                  <td><?php echo $row["nm_brg"];?></td>
                  <td><?php echo $row["jmlh"];?></td>
                  <td><?php echo $row["rak"];?></td>
                  <td>Rp <?php echo $row["harga"];?>,00</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" 
                    data-target="#restok<?php echo $row["kd_brg"];?>">
                    <i class="fas fa-plus"></i> Restok
                  </button></td>
                  <div id="restok<?php echo $row["kd_brg"];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Restok Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body p-4">
      <div class="row">
        <div class="col-md-12">
          <form action="restok.php" method="POST">
            <div class="form-group">
              <input type="hidden" class="form-control" id="field-1" name="kd_brg" value="<?php echo $row["kd_brg"];?>" required="">
              <input type="hidden" class="form-control" id="field-1" name="j1" value="<?php echo $row["jmlh"];?>" required="">
              <label for="field-1" class="control-label" >Jumlah :</label>
              <input type="nama" class="form-control" id="field-1" name="jmlh" value="<?php echo $row["jmlh"];?>" required="">
            </div>
        </div> 
      </div>                   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" name="submit">Restok</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>
                </tr>
                <?php
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Barang</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Letak Rak</th>
                  <th>Restok</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="row no-print">
          <div class="col-12">
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#daftar">
              <i class="fas fa-plus"></i> Tambah Barang Baru
            </button>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div id="daftar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Barang Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body p-4">
      <div class="row">
        <div class="col-md-12">
          <form action="inputbarang.php" method="POST">
            <div class="form-group">
              <label for="field-1" class="control-label" >Kode Barang :</label>
              <input type="nama" class="form-control" id="field-1" name="kd_brg" required="">
            </div>
        </div> 
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="field-1" class="control-label" >Nama Barang :</label>
              <input type="nama" class="form-control" id="field-1" name="nm_brg" required="">
            </div>
        </div> 
      </div>
                                            
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="field-5" class="control-label">Jumlah Barang :</label>
            <input type="text" class="form-control" id="field-5" name="jmlh" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="field-5" class="control-label">Lokasi Rak :</label>
            <input type="text" class="form-control" id="field-5" name="rak" required="">
          </div>
        </div>                                              
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="field-1" class="control-label" >Harga Barang :</label>
              <input type="nama" class="form-control" id="field-1" name="harga" required="">
            </div>
        </div> 
      </div>
                      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" name="submit">Masukan</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
