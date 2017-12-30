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
      <a class="navbar-brand" href="index.php">
<body>
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div href="indexadmin.php">KitaMampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="indexadmin.php">HOME</a></li>
      <li><a href="?page=galangadmin">GALANG DANA</a></li>
      <li><a href="?page=donasiadmin">DONASI</a></li>
      <li><a href="?page=userdiadmin">DATA USER</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
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
      include "edit_donasi.php";
    }
  }else if($page == "userdiadmin"){
    if($action == ""){
    include "data_user.php";
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