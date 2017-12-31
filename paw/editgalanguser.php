<?php
@session_start();
include "../inc/koneksi.php";

  $idgalanguser = @$_GET['idgalanguser'];
  $sql = mysql_query("select * from tb_galang where id_galang = '$idgalanguser' ") or die (mysql_error());
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
      <a class="navbar-brand" href="#">KitaMampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">H O M E</a></li>
      <li class="active"><a href="galang.php">GALANG DANA</a></li>
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
<body>
<div class="container-fluid">
<legend>Edit Data Galang </legend>
		
    </div>
  		<form class="form-horizontal" action="" method="POST" role="form">

  		<div class="form-group">
  			<label for="id_galang" class="control-label col-sm-3">Id Galang</label>
  			<div class="col-sm-8">
  				<input type="text" name="id_galang" id="id_galang" class="form-control" value="<?php echo $data['id_galang'] ?>" disables="disabled" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="judul" class="control-label col-sm-3">Judul</label>
  			<div class="col-sm-8">
  				<input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data['judul'] ?>">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="kategori" class="control-label col-sm-3">Kategori</label>
  			<div class="col-sm-8">
  				<select class="form-control" name="kategori" id="kategori">
  					<option value="">--Pilih Kategori--</option>
  					<option value="Bencana Alam">Bencana Alam</option>
  					<option value="Anak Sakit">Anak Sakit</option>
            <option value="Sosial">Sosial</option>
  				</select>
  			</div>	
  		</div>

      <div class="form-group">
        <label for="lokasi" class="control-label col-sm-3">Lokasi</label>
        <div class="col-sm-8">
          <select class="form-control" name="lokasi" id="lokasi">
            <option value="">--Pilih Lokasi--</option>
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
          <input type="text" name="target" id="target" class="form-control" value="<?php echo $data['target'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="deadline" class="control-label col-sm-3">Deadline</label>
        <div class="col-sm-8">
          <input type="date" name="deadline" id="deadline" class="form-control" value="<?php echo $data['deadline'] ?>">
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
   $id_galang = @$_POST['id_galang'];
   $judul = @$_POST['judul'];
   $kategori = @$_POST['kategori'];
   $lokasi = @$_POST['lokasi'];
   $target = @$_POST['target'];
   $deadline = @$_POST['deadline'];
  
   $edit_galang = @$_POST['edit'];
   if($edit_galang){
     if($status == ""){ 
       ?>
             <script type="text/javascript">
       alert("Inputan tidak boleh ada yang kosong");
       </script>
             <?php
     } else {
       mysql_query("update tb_galang set status = '$status' where id_galang = '$idgalang'") or die (mysql_error());
       ?>
             <script type="text/javascript">
       alert("Data Berhasil Diedit");
       window.location.href="?page=galangadmin";
       </script>
             <?php
     }
   }
   ?>  
   </body>