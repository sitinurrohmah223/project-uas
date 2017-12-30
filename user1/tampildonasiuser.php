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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donasi User</title>
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

<fieldset>
	<legend><strong>Tampil Data Donasi</strong></legend>
	
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Coment</th>
            <th>Bank</th>
            <th>Status</th>
            <th>Status</th>

        </tr>

        <?php 
        $sql = mysql_query("select * from tb_donasi where id_user = '$_SESSION[id]'") or die (mysql_error());
        while ($data = mysql_fetch_array($sql)){
        	?>
			<tr>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['comment']; ?></td>
				<td><?php echo $data['bank']; ?></td>
				<td><?php echo $data['status']; ?></td>
        <td><?php if ($data['status']=='pending'){ 
        echo '<a href="konfirmasi.php?id='.$data['id_donasi'].'">Konfirmasi</a>';
         } ?></td>

			</tr>
			<?php
			}
		?>
    </table>
</fieldset>

      <div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
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
<footer class="text-center">
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright &copy Tari Miftahul Jannah</a></p> 
</footer>
      </body>
      </div>
      </body>
      </html>