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
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>     H O M E</a></li>
      <li><a href="galang.php">GALANG DANA</a></li>
      <li><a href="about.php">ABOUT</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['uname']; ?><span class="caret"></span></a>
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

<div class="container-fluid">
<legend>Data Donasi </legend>
		<div class="row">

		<form action="" method="post" role="search" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Masukan Id Donasi. .">
                </div>
                <button type="submit" name="cari_donasi" value="cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
        </form>
		
	</div>
    <div class="row" >
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover" >
			<thead style="background-color: #336666;"> 
					<th style="text-align: center;">Judul</th>
		            <th style="text-align: center;">Comment</th>
		            <th style="text-align: center;">Tanggal</th>
		            <th style="text-align: center;">Bank</th>
		            <th style="text-align: center;">No Rekening</th>
		            <th style="text-align: center;">Status</th>
		            <th style="text-align: center;">Status</th>
		         
			</thead>
			<tbody>
				
				<?php 
		        $sql = mysql_query("select a.*,b.no_rek from tb_donasi a join tb_rekening b on a.bank=b.bank where id_user = '$_SESSION[id]'") or die (mysql_error());
		        	while ($data = mysql_fetch_array($sql)){
		          ?>

				
					<tr>	
						<td align="center"><?php echo $data['jumlah']; ?></td>
						<td align="center"><?php echo $data['comment']; ?></td>
						<td align="center"><?php echo $data['tanggal']; ?></td>
						<td align="center"><?php echo $data['bank']; ?></td>
						<td align="center"><?php echo $data['no_rek']; ?></td>
						<td align="center"><?php echo $data['status']; ?></td>
						<td align="center"><?php if ($data['status']=='pending'){ 
        					echo '<a href="konfirmasi.php?id='.$data['id_donasi'].'">Konfirmasi</a>';
         					} ?></td>
						
					</tr>
				<?php
				}
				?>				
			</tbody>	
			</table>

			

		</div>
      </div>
    </div> 
</div>