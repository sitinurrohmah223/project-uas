<?php
@session_start();
include "/../inc/koneksi.php";

if(isset($_POST["register"])){
  $query=mysql_query("insert into tb_user values('','$_POST[username]','$_POST[password]','$_POST[nama_lengkap]','$_POST[jenis_kelamin]','$_POST[no_telepon]','$_POST[email]','$_POST[alamat]')") or die(mysql_error());
  if($query){
    ?> <script type="text/javascript">alert("Selamat datang orang baik, Silahkan Login");</script> <?php
    //header("location: login.php");
  }else{
    echo "gagal";
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
      <li><a href="index.php">HOME</a></li>
      <li><a href="galang.php">GALANG DANA</a></li>
      <li><a href="donasi.php">DONASI</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Registrasi</title>
<style type="text/css">
body{
  font-family:arial;
  font-size: 14px;
  background-color: white;
}

#utama{
  width:300px;
  margin: 0 auto;
  margin-top: 12%;
  background-color: #fff;
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
  padding: 25px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}

input,select,textarea{
  padding: 10px;
  border: 0;
  width: 250px;
}
textarea{
  font-family: arial;
  font-size: 13px;
}
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
  padding: 85px;
  text-decoration: none;
  border-radius: 3px;
  color: #000;
  font-size: 16px;
}

</style>

</head>
  <body>

  <div id="utama" style="margin-top: 20px;">
    <div id="judul">
    Halaman Register
    </div>

    <div id="inputan">
      <form action="daftar.php" method="post">
        <div>
          <input type="text" name="username" placeholder="username" class="lg" />
        </div>
        <div style="margin-top: 10px;">
          <input type="password" name="password" placeholder="Password" class="lg"/>
        </div>
        <div style="margin-top: 10px;">
          <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="lg"/>
        </div>
        <div style="margin-top: 10px;">
          <select name="jenis_kelamin">
            <option value="">-Pilih Jenis Kelamin-</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div style="margin-top: 10px;">
        <input type="text" name="no_telepon" placeholder="No Telepon" class="lg"/>
        </div>
        <div style="margin-top: 10px;">
        <input type="text" name="email" placeholder="Email" class="lg"/>
        </div>

        <div style="margin-top: 10px;">
          <textarea name="alamat" class="lg" placeholder="Alamat"></textarea>
        </div>
        <div style="margin-top: 10px;">
          <input type="submit" name="register" value="Register" class="btn"/>
          <span style="margin-left: 120px;">
            <a href="login.php" class="btn-right">Login</a>
          </span>
        </div>
      </form>
      </div>
      </div>
      </body>
      </div>
      </body>
      </html>