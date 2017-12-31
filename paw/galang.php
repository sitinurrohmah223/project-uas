<?php
@session_start();
if(!isset($_SESSION['user'])){
  header("location: login.php");
}else if($_SESSION['user'] != 'user'){
  header("location: login.php");
}

include "../inc/koneksi.php";

if(isset($_POST["galang"])){

      $ekstensi_diperbolehkan = array('png','jpg');
      $nama = $_FILES['file']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){      
          move_uploaded_file($file_tmp, '../images/'.$nama);
          $query=mysql_query("insert into tb_galang values('','$_POST[judul]','$_POST[deskripsi]','$_POST[cerita]','$_POST[kategori]','$_POST[lokasi]','$_POST[target]','$_POST[deadline]','$nama','$_SESSION[id]')") or die(mysql_error());
          
          if($query){
           ?> <script type="text/javascript">alert("Campaign anda akan di proses");</script> <?php
          }else{
            echo 'GAGAL';
          }

        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }

      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
}
?>
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
      <li><a href="index.php">H O M E</a></li>
      <li><a href="galang.php">GALANG DANA</a></li>
      <li><a href="donasi.php">DONASI</a></li>
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
<title>Halaman Registrasi</title>

    
</head>
<body>
<div class="page-header"><h3 align="center">Silahkan Isi Campaign</h3>
      </div>

    <div id="inputan">
      <form enctype="multipart/form-data" action="galang.php" method="post">
        <div class="form-group">
        <label for="judul" class="control-label col-sm-3">Judul</label>
        <div class="col-sm-8">
        <input type="text" name="judul" placeholder="Masukkan Judul Campaign" class="form-control" style="width: 750px; margin: 10px;" />
        </div>
        </div>
        <br>
        <div class="form-group">
        <label for="deskripsi" class="control-label col-sm-3">Deskripsi</label>
        <div class="col-sm-8">
        <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Campaign" style="width: 750px;margin: 10px;"></textarea>
        </div>
        </div>
        <div class="form-group">
        <label for="cerita" class="control-label col-sm-3">Cerita</label>
        <div class="col-sm-8">
        <textarea name="cerita" class="form-control" placeholder="Cerita" style="width: 750px; margin: 10px;"></textarea>
        </div>
        </div>
        <div class="form-group">
        <label for="kategori" class="control-label col-sm-3">Kategori</label>
        <div class="col-sm-8">
        <select class="form-control" name="kategori" style="width: 750px; margin: 10px;">
            <option value="">-Pilih Kategori-</option>
            <option value="Bencana Alam">bencana alam</option>
            <option value="Anak Sakit">Anak Sakit</option>
            <option value="Sosial">Sosial</option>
          </select>
          </div>
          </div>
          <div class="form-group">
        <label for="lokasi" class="control-label col-sm-3">Lokasi</label>
        <div class="col-sm-8">
          <select class="form-control" name="lokasi" style="width: 750px; margin: 10px;">
            <option value="">-Pilih Lokasi-</option>
            <option value="aceh">Aceh</option>
            <option value="jakarta">Jakarta</option>
            <option value="bandung">Bandung</option>
            <option value="medan">Medan</option>
          </select>
          </div>
          </div>
          <div class="form-group">
        <label for="target" class="control-label col-sm-3">Target</label>
        <div class="col-sm-8">
          <input type="text" name="target" placeholder="Masukkan Target Dana yang Dibutuhkan" class="form-control" style="width: 750px; margin: 10px;"/>
          </div>
          </div>
         
          <div class="form-group">
        <label for="deadline" class="control-label col-sm-3">Deadline</label>
        <div class="col-sm-8">
          <input type="date" name="deadline" class="form-control" placeholder="Masukkan Deadline Campaign" style="width: 750px; margin: 10px;"/>
          </div>
          </div>
         
          <div class="form-group">
        <label for="foto" class="control-label col-sm-3">Foto</label>
        <div class="col-sm-8">
          <input name="file" type="file" class="form-control" style="width: 750px;margin: 10px;" required/>
          </div>
          </div>
          <div class="form-group">
      <label for="btn" class="control-label col-sm-3"></label>
      <div class="col-sm-8">
        <div class="col-sm-4">
          <input type="submit" id="galang" name="galang" class="btn btn-info btn-block" value="Galang Sekarang" />
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
      </html>