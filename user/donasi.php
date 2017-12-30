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
    <h4 class="modal-title">Modal Heading</h4>
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
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<style type="text/css">
body{
  font-family:arial;
  font-size: 14px;
  background : #ceeab3;
}

#utama{
  width:800px;
  margin: 0 auto;
  margin-top: 12%;
  background : #ceeab3;
}

#judul{
  padding: 15px;
  text-align: center;
  color: #fff;
  font-size: 20px;
  background-color: #336666;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
  border-bottom: 3px solid #336666;
}

#inputan{
  background-color: #ccc;
  padding: 20px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}

input,select,textarea{
  padding: 10px;
  border: 0;
  width: 750px;
}
textarea{
  font-family: arial;
  font-size: 13px;
}
.lg{
  width: 240px;
}

.btn{
  background-color: #336666;
  border-radius: 10px;
  color: #fff;
}

.btn:hover{
  background-color: #336666;
  cursor: pointer;
}
.btn-right{
  padding: 10px;
  text-decoration: none;
  border-radius: 3px;
  color: #fff;
}

</style>
    
</head>
<body>
<div id="utama" style="margin-top: 20px;">
    <div id="judul">
    Silahkan isi form donasi
    </div>

    <div id="inputan">
      <form action="" method="post">
        
        <div style="margin-top: 10px;">
        <input type="text" name="jumlah" placeholder="Jumlah Donasi" class="lg" style="width: 750px;" />
        </div>
        <div style="margin-top: 10px;">
        <tr>
        <td>Tanggal</td>
        <td>:</td>
        <input type="date" name="tanggal" placeholder="Tanggal" class="lg" style="width: 750px;" />
        </tr>
        </div>
        <div style="margin-top: 10px;">
        <textarea name="comment" class="lg" placeholder="Comment" style="width: 750px;"></textarea>
        </div>
        <div style="margin-top: 10px;">
        <tr>
        <td>Metode Pembayaran</td>
        <td>:</td>
        <select name="bank" >
            <option value="">-Pilih Pembayaran-</option>
            <option value="Bencana Alam">BRI</option>
            <option value="Anak Sakit">BNI</option>
            <option value="Sosial">BNI Syariah</option>
            <option value="Sosial">Mandiri</option>
            <option value="Sosial">BCA</option>
          </select> 
          </tr>       
          </div>
        
          <div style="margin-top: 10px;">
          <input type="submit" name="galang" value="Donasi Sekarang" class="btn"/>
          </div>
        </div>
      </form>
      </div>
 </div>
      </body>
      <?php
      if(isset($_GET['stats'])){
        if($_GET['stats']=="sukses"){
          echo "<script>$('#myModal').modal('show');</script>"; 
        }
      }
      ?>
      <!-- Container (Contact Section) -->

</div>
</body>
</html>