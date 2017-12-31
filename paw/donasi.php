 <?php
@session_start();
include "../inc/koneksi.php";

if(isset($_POST["donasi"])){
  $bank = $_POST['bank'];
  if($bank=='BCA')
    $bnk = 1;
  else if($bank=='BNI')
    $bnk = 2;
  else if($bank=='BNI SYARIAH')
    $bnk = 3;
  else if($bank=='MANDIRI')
    $bnk = 4;
  else if($bank=='BRI')
    $bnk = 5;

  $query=mysql_query("insert into tb_donasi values('','$_GET[id]','$_SESSION[id]','$_POST[jumlah]','$_POST[comment]','$_POST[tanggal]','$_POST[bank]','pending')") or die(mysql_error());
  if($query){
    header("location: donasi.php?stats=sukses&bnk=$bnk");
    //header("location: login.php");
  }else{
    echo "gagal";
  }
}
?>

<!--modal-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <!--header modal-->
    <div class="modal-header">
    <h4 class="modal-title">Hi <?php echo $_SESSION['uname'];?> </h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <!--body modal-->
    <div class="modal-body">
    <?php 
      $nm_rek='';
      $no_rek='';
      if(isset($_GET['bnk'])){
        if($_GET['bnk']==1){
          $nm_rek='BCA';
          $no_rek='1234 2334 45';
        }else if($_GET['bnk']==2){
          $nm_rek='BNI';
          $no_rek='1322 2335 56';

        }else if($_GET['bnk']==3){
          $nm_rek='BNI SYARIAH';
          $no_rek='1322 2335 67';

        }else if($_GET['bnk']==4){
          $nm_rek='MANDIRI';
          $no_rek='8097 5468 34';

        }else if($_GET['bnk']==5){
          $nm_rek='BRI';
          $no_rek='8765 2309 53 5';

        }
      }
    ?>
    Terimakasih telah berdonasi.
    Silahkan transfer ke rekening <?php echo $nm_rek." : ".$no_rek; ?> atas nama YAYASAN KITA MAMPU.
    Donasi anda akan segera di proses.
    </div>
    <!--footer modal-->
    <div class="modal-footer">
    <button type="button" class="btn btn-block btn-danger btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>KitaMampu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
    footer {
      background-color: #FFB6C1;
      color: #B0C4DE;
      padding: 32px;
  }
  footer a {
      color: #800000;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
    </style>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">KitaMampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">HOME</a></li>
      <li><a href="galang.php">GALANG DANA</a></li>
      <li><a href="#">ABOUT</a></li>
    </ul>
         <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['uname']; ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="tampildonasiuser.php">Donasi Saya</a></li>
        <li><a href="tampilgalanguser.php">Galang Dana Saya</a></li>
        <li><a href="edituser.php">Edit Profil</a></li>
      </ul>
      </li>
      <li class="utama"><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Donasi</title>

    
</head>
<body>
<div class="page-header"><h3 align="center">Silahkan Isi Donasi</h3>
      </div>

    <div id="inputan">
      <form action="" method="post">
        
        <div class="form-group">
        <label for="jumlah" class="control-label col-sm-3">Nominal Donasi</label>
        <div class="col-sm-8">
        <input type="text" name="jumlah" placeholder="Masukkan Nominal Donasi (Minimal Rp. 25.000-,)" class="form-control" style="width: 750px; margin:10px;"/>
        </div>
        </div>
        <div class="form-group">
        <label for="tanggal" class="control-label col-sm-3">Tanggal</label>
        <div class="col-sm-8">
        <input type="date" name="tanggal" value="<?php echo date('m/d/Y'); ?>" class="form-control" style="width: 750px;margin : 10px;" />
        </div>
        </div>
        <div class="form-group">
        <label for="comment" class="control-label col-sm-3">Komentar</label>
        <div class="col-sm-8">
        <textarea name="comment" class="form-control" placeholder="Berikan Komentar yang mendukung Campaign" style="width: 750px; margin: 10px;"></textarea>
        </div>
        </div>
        <div class="form-group">
        <label for="bank" class="control-label col-sm-3">Jenis Pembayaran</label>
        <div class="col-sm-8">
          <select class="form-control" name="bank" style="width: 750px; margin: 10px;">
            <option value="">-Pilihan-</option>
            <option value="BCA">Transfer BCA</option>
            <option value="BNI">Transfer BNI</option>
            <option value="BNI SYARIAH">Transfer BNI SYARIAH</option>
            <option value="MANDIRI">Transfer MANDIRI</option>
            <option value="BRI">Transfer BRI</option>
            
          </select>
        </div>
        </div>
        
          <div class="form-group">
      <label for="btn" class="control-label col-sm-3"></label>
      <div class="col-sm-8">
        <div class="col-sm-4">
          <input type="submit" name="donasi" value="Donasi Sekarang" class="btn btn-info btn-block"/>
          </div>
          <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>
          </div>
          </div>
             </form>
        </div>
   
      </div>
         <div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

  <div class="row">
    <div class="col-md-4">

      <p><span class="glyphicon glyphicon-map-marker"></span>Bandung, INA</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: 021 912 315</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: kitamampu@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn btn-info" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  
</div>
  <!-- Footer -->
<footer class="text-center">
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright &copy 2017</a></p> 
</footer>
      </div>
      </body>
      <?php
      if(isset($_GET['stats'])){
        if($_GET['stats']=="sukses"){
          echo "<script>$('#myModal').modal('show');</script>"; 
        }
      }
      ?>
      
      </html>