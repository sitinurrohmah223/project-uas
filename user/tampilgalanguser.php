<?php
session_start();
include "../inc/koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>dashboard user</title>
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
      <li><a href="about.php">ABOUT</a></li>
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


<div class="container-fluid">
<legend>Tampil Data Galang Dana </legend>
    <div class="row">

    <form action="" method="post" role="search" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Masukan Id Galang. .">
                </div>
                <button type="submit" name="cari_galang" value="cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    
  </div>
    <div class="row" >
    <div class="col-md-12 col-xs-12">
      <table class="table table-bordered table-striped table-hover" >
      <thead style="background-color: #336666;"> 
          <th style="text-align: center;">Judul</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Lokasi</th>
                <th style="text-align: center;">Target</th>
                <th style="text-align: center;">Deadline</th>
                <th style="text-align: center;">Opsi</th>
      </thead>
      <tbody>
        <?php
        $no = 1;

        $batas = 3;
        $hal = @$_GET['hal'];
        if(empty($hal)){
          $posisi = 0;
          $hal = 1;
        } else {
          $posisi = ($hal - 1) * $batas;
        }

        $sql = mysql_query("select * from tb_galang LIMIT $posisi, $batas") or die (mysql_error());
        $no = $posisi + 1;

        $inputan_pencarian = @$_POST['inputan_pencarian'];
        $cari_galang = @$_POST['cari_galang'];
        if($cari_galang){
          if($inputan_pencarian != ""){
            $sql = mysql_query("select * from tb_galang where judul like '%$inputan_pencarian%' or lokasi like '%$inputan_pencarian%'") or die(mysql_error());
            } else {
              $sql = mysql_query("select * from tb_galang") or die(mysql_error());
            }
        } else {
          $sql = mysql_query("select * from tb_galang") or die(mysql_error());
        }

        $cek = mysql_num_rows($sql);
        if($cek < 1){
          ?>
          <tr>
            <td colspan="10" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
          </tr>
          <?php

        } else {

        while ($data = mysql_fetch_array($sql)){
        ?>
        
          <tr>
            
            <td align="center"><?php echo $data['judul']; ?></td>
            <td align="center"><?php echo $data['kategori']; ?></td>
            <td align="center"><?php echo $data['lokasi']; ?></td>
            <td align="center"><?php echo $data['target']; ?></td>
            <td align="center"><?php echo $data['deadline']; ?></td>
          
            
            <td align="center">
              <a href="?page=galangadmin&action=edit&judul=<?php echo $data['judul']; ?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
          </tr>
        <?php
        }
        }
        ?>        
      </tbody>  
      </table>
      <div style="margin-top: 10px; float: left;">
        <?php 
        $jml = mysql_num_rows(mysql_query("select * from tb_galang"));
        echo "Jumlah Data : <b>".$jml."</b>"; ?>
      </div> 
      
    </div>
      </div>
    </div> 
</div>