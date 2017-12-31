<?php
session_start();
include "../inc/koneksi.php";

$id= $_SESSION['id'];
  $sql = mysql_query("select * from tb_user where id_user = '$id' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);
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


<body>
<div class="container-fluid">
<legend>Edit Data Galang </legend>
		
    </div>
  		<form class="form-horizontal" action="" method="POST" role="form">

  		<div class="form-group">
  			<label for="username" class="control-label col-sm-3">Username</label>
  			<div class="col-sm-8">
  				<input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username'] ?>">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="password" class="control-label col-sm-3">Password</label>
  			<div class="col-sm-8">
  				<input type="password" name="password" class="form-control" value="<?php echo $data['pasword'] ?>">
  			</div>	
  		</div>

      <div class="form-group">
        <label for="nama_lengkap" class="control-label col-sm-3">Nama Lengkap</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="nama_lengkap" id="nama_lengkap" value="<?php echo $data['nama_lengkap'] ?>">
        </div>  
      </div>


  		<div class="form-group">
  			<label for="jenis_kelamin" class="control-label col-sm-3">Jenis Kelamin</label>
  			<div class="col-sm-8">
  				<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
  					<option value="">--Pilihan--</option>
  					<option value="Laki-Laki">Laki - Laki</option>
  					<option value="Perempuan">Perempuan</option>
  				</select>
  			</div>	
  		</div>

      <div class="form-group">
        <label for="no_telepon" class="control-label col-sm-3">No Telepon</label>
        <div class="col-sm-8">
          <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?php echo $data['no_telepon'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="email" class="control-label col-sm-3">Email</label>
        <div class="col-sm-8">
          <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="alamat" class="control-label col-sm-3">Alamat</label>
        <div class="col-sm-8">
          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $data['alamat'] ?>">
        </div>  
      </div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="edit" name="edit" class="btn btn-dark btn-block" value="Edit Data" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>
    </div> 

    <?php
         $id_user = @$_POST['id_user'];
         $username = @$_POST['username'];
         $password = @$_POST['password'];
         $nama_lengkap = @$_POST['nama_lengkap'];
         $jenis_kelamin = @$_POST['jenis_kelamin'];
         $no_telepon = @$_POST['no_telepon'];
         $email = @$_POST['email'];
         $alamat = @$_POST['alamat'];
        
         $edit_profil = @$_POST['edit'];
         if($edit_profil){
           if($username == ""|| $password == ""|| $nama_lengkap == "" || $jenis_kelamin == "" || $no_telepon == "" || $email == "" || $alamat == ""){ 
             ?>
                   <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
                   <?php
           } else {
             mysql_query("update tb_user set username = '$username', password = '$password', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', no_telepon = '$no_telepon', email = '$email', alamat = '$alamat' where id_user = '$id'") or die (mysql_error());
             ?>
                   <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="?page=edit";
             </script>
                   <?php
           }
         }
   ?>
   </body>