contact
WA	: 0822-8846-7823
SMS	: 0822-8846-7823
Call	: 0822-8846-7823
BBM	: D7DB3491
ebsofmail@gmail.com
Suckittrees.com
Tutorial Blog dan Website PHP MYSQL or MYSQLi
Home
Buy Produk
Members
Tools Online
Demos
Panduan Dasar
Tutorial Website
Tips & Trik
Blogging
Hubungi
Jasa Pasang Iklan

 

CONTACT US

PayPal - The safer, easier way to pay online! 
SPONSOR
STATISTIK
108575


 User hari ini : 3755
 Hits hari ini : 6540
 User Online: 32
TAGS
TemplateCodeigniterYoutubeebookJavascriptOOPBootstrapMysqlSoftwareHTMLwindowshostingAndroidpostgresqlframeworklinuxProdukAplikasiWordpressajaxKomputerJSONWysiwyginternetlaravelxamppBlogspotseoMs.ExelsecurityJqueryPHPSource CodeMysqliCSS3Ms.OfficeHTML5Ms.WordGammuTinyMceDatabase





 






<?php 
// koneksi ke mysqli
$servername = "localhost";
$username = "root";
$password = "";
$db = "mahasiswa";
// Create connection
$koneksi = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$koneksi) {
die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include 'koneksi.php';
  ?>
  <div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>DataTabels dengan PHP dan Bootstrap Suckittrees.Com</h3>
    <hr>
      <table class="table table-stripped table-hover datatab">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Action</th>                         
          </tr>
        </thead>  
        <tbody>
          <?php 
          $query = mysqli_query($koneksi, "SELECT * FROM mhs");
          $no = 1;
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['nama']; ?></td>
              <td><?php echo $data['fakultas']; ?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal"data-target="#myModal<?php echo $data['id']; ?>">Edit</a>
              </td>
            </tr>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Data Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="editmhs.php" method="get">
                        <?php
                        $id = $data['id']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="id_mhs" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['nama']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Fakultas</label>
                          <input type="text" name="fakultas_mhs" class="form-control" value="<?php echo $row['fakultas']; ?>">      
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>
          <?php               
          } 
          ?>
        </tbody>
      </table>          
  </div>
</body>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.datatab').DataTable();
  } );
  </script>
</html>
 


 <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>

            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Data Mahasiswa</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="editmhs.php" method="get">
                        <?php
                        $id = $data['id']; 
                        $query_edit = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="id_mhs" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_mhs" class="form-control" value="<?php echo $row['nama']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Fakultas</label>
                          <input type="text" name="fakultas_mhs" class="form-control" value="<?php echo $row['fakultas']; ?>">      
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>

<?php
include('koneksi.php');
$id = $_GET['id_mhs'];
$nama = $_GET['nama_mhs'];
$fakultas = $_GET['fakultas_mhs'];
//query update
$query = "UPDATE mhs SET nama='$nama' , fakultas='$fakultas' WHERE id='$id' ";
if (mysqli_query($koneksi, $query)) {
    # credirect ke page index
    header("location:index.php");    
}
else{
    echo "ERROR, data gagal diupdate". mysqli_error();
}
?>


 
Diskusi

SEARCH WEBSITE
Search site


 
Jasa Pembuatan Website Pemda
Aplikasi SPPD Terbaru
....Klik Untuk Aplikasi Lain....
RANDOM POSTS
Aplikasi Pembelajaran Bahasa Jepang Berbasis Web
Sistem Informasi Pengolahan Data Pegawai PLN Berbasis Web
Sistem Informasi Penjualan Air di PT ABC
Sistem Informasi Pembuatan Akta Notaris online
Aplikasi Pajak Bumi dan Bangunan Berbasis Web
Aplikasi Tes Buta Warna Berbasis Web Metode Ishihara
Website Landing Page for Internet Marketing
Aplikasi Pendataan Alumni Berbasis Website

 
Copyright@Suckittrees.com 2013 - 2020.Allright Reserved Load 0.2392 detikTheme by Suckittrees.Com @WebDeveloper Back To Top
