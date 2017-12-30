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
<title>Edit Profil</title>
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
    Edit
    </div>

    <div id="inputan">
      <form action="" method="post">
      
        <div>
          <input type="text" name="username"  class="lg" value="<?php echo $data['username']; ?>" />
        </div>
        <div style="margin-top: 10px;">
          <input type="password" name="password" class="lg" value="<?php echo $data['password']; ?>"/>
        </div>
        <div style="margin-top: 10px;">
          <input type="text" name="nama_lengkap" class="lg" value="<?php echo $data['nama_lengkap']; ?>"/>
        </div>
        <div style="margin-top: 10px;">
          <select name="jenis_kelamin">
            <option value="">-Pilih Jenis Kelamin-</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div style="margin-top: 10px;">
        <input type="text" name="no_telepon"  class="lg" value="<?php echo $data['no_telepon']; ?>"/>
        </div>
        <div style="margin-top: 10px;">
        <input type="text" name="email"  class="lg" value="<?php echo $data['email']; ?>"/>
        </div>

        <div style="margin-top: 10px;">
          <input name="alamat" class="lg"  value="<?php echo $data['alamat']; ?>">
        </div>
        <div style="margin-top: 10px;">
          <input type="submit" name="edit" value="Edit" class="btn"/>
          <br>
          <input type="button" name="batal" value="Batal" class="btn"/>
        </div>
      </form>
      </div>
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
<br>

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