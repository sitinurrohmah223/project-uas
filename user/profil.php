<?php
@session_start();
include "../inc/koneksi.php";

  $sql = mysql_query("select * from tb_user") or die (mysql_error());
  $data = mysql_fetch_array($sql);

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
      <li><a href="indexprofil.html">ABOUT</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="indexprofil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['uname']; ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
         <li><a href="tampildonasiuser.php">Donasi Saya</a></li>
         <li><a href="tampilgalanguser.php">Galang Dana Saya</a></li>
         <li><a href="profil.php">Profil</a></li>
         <li><a href="edituser.php">Edit Profil</a></li>
      </ul>
      </li>
      <li class="utama"><a href="../inc/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<fieldset>

	<legend><strong>Biodata Pribadi</strong></legend>
	
    
    <table width="100%" style="border-collapse=collapse;">
    
 		<tr>
    		<td><strong>Id User</strong></td>
    		<td>:</td>
    		<td><?php echo $data['id_user']; ?></td>
    	</tr>

        <tr>
            <td><strong>Username</strong></td>
            <td>:</td>
            <td><?php echo $data['username']; ?></td>
        </tr>

          <tr>
            <td><strong>Password</strong></td>
            <td>:</td>
            <td><?php echo $data['password']; ?></td>
        </tr>

        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>:</td>
            <td><?php echo $data['nama_lengkap']; ?></td>
        </tr>

          <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>:</td>
            <td><?php echo $data['jenis_kelamin']; ?></td>
        </tr>

          <tr>
            <td><strong>No Telepon</strong></td>
            <td>:</td>
            <td><?php echo $data['no_telepon']; ?></td>
        </tr>

          <tr>
            <td><strong>Email</strong></td>
            <td>:</td>
            <td><?php echo $data['email']; ?></td>
        </tr>

          <tr>
            <td><strong>Alamat</strong></td>
            <td>:</td>
            <td><?php echo $data['alamat']; ?></td>
        </tr>

    	
    </table>
</fieldset>