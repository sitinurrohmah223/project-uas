<?php
@session_start();
include "../inc/koneksi.php";

?>

<!DOCTYPE html>
<html>
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
      color: #222;
      background-color: #fff;
  }
    footer {
      background-color: #8FBC8F;
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
      <a class="navbar-brand" href="index.php">
<body>
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="indexadmin.php">KitaMampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="indexadmin.php"><span class="glyphicon glyphicon-home"></span>      HOME</a></li>
      <li><a href="?page=galangadmin"><span class="glyphicon glyphicon-th-list"></span>      GALANG DANA</a></li>
      <li><a href="?page=donasiadmin"><span class="glyphicon glyphicon-th-list"></span>      DONASI</a></li>
      <li><a href="?page=userdiadmin"><span class="glyphicon glyphicon-th-list"></span>      DATA USER</a></li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"></span>LAPORAN<span class="caret"></span></a>
      <ul class="dropdown-menu">
         <li><a href="?page=laporangalang">Laporan Data Galang dana</a></li>
         <li><a href="?page=laporandonasi">Laporan Data Donasi</a></li>
         <li><a href="?page=laporanuser">Laporan Data User</a></li>
      </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

    <div id="isi">
    <?php
  $page = @$_GET['page'];
  $action = @$_GET['action'];
  if($page == "galangadmin"){
    if($action == ""){
      include "data_galang.php";
    } else if($action == "edit"){
      include "edit_galangnyoba.php";
    }else if ($action == "hapus"){
      include "hapus_galang.php";
    }

  }else if($page == "donasiadmin"){
    if($action == ""){
      include "data_donasi.php";
    } else if($action == "edit"){
      include "editdonasi.php";
    }
  }else if($page == "userdiadmin"){
    if($action == ""){
    include "data_user.php";
  }else if ($action == "hapus"){
    include "hapus_user.php";
  }

  }else if($page == "laporangalang"){
    if($action == ""){
    include "laporan_galang.php";
  }

  }else if($page == "laporandonasi"){
    if($action == ""){
    include "laporan_donasi.php";
  }

  }else if($page == "laporanuser"){
    if($action == ""){
    include "laporan_user.php";
  }

  }else if($page == "profiladmin"){
  if($action == ""){
    include "editadmin.php";
  }
  
  } else if($page == ""){
    echo "Selamat datang di halaman utama";
  } else {
    echo "404! Halaman Tidak ditemukan";
  }
  ?>

  </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>