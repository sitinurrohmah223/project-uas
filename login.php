<?php
@session_start();
include "inc/koneksi.php";

if(isset($_POST['login'])){
  $user = @$_POST['user'];
  $pass = @$_POST['pass'];
  
    if($user == "" || $pass == ""){
      ?> <script type="text/javascript">alert("Username / password tidak boleh kosong");</script> <?php
        }else {
          $sql = mysql_query("select * from tb_login where username = '$user' and password = '$pass'") or die (mysql_error());
          $sql2 = mysql_query("select * from tb_user where username = '$user' and password = '$pass'") or die (mysql_error());
      $data = mysql_fetch_array($sql);
      $data2 = mysql_fetch_array($sql2);
      $cek = mysql_num_rows($sql);
      $cek2 = mysql_num_rows($sql2);
      if($cek >= 1){
          $_SESSION['user'] = "admin";
          $_SESSION['uname'] = $data['username'];
          header("location: admin/indexadmin.php");
      }else if($cek2 >= 1){
        $_SESSION['user'] = "user";
        $_SESSION['uname'] = $data2['username'];
        $_SESSION['id'] = $data2['id_user'];
        header("location: user1/index.php");
      }else{
        echo "Login Gagal!";
      }
        }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PAW</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <link href="css/album.css" rel="stylesheet">
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
  #sidebar {
  width:25%;
  float:left;
  margin-right:10px;
}

#sidebar-left {
  width:280px;
  float:left;
}

.sidebar {
  margin:0px 8px 0px 12px;
}

#sidebar .sidebar h2,  #sidebar-left .sidebar h2{
  padding:11px;
  margin-top:0px;
  -moz-box-shadow:inset 0px 1px 0px 0px  #778899;
  -webkit-box-shadow:inset 0px 1px 0px 0px  #778899;
  box-shadow:inset 0px 1px 0px 0px  #778899;
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #778899), color-stop(1, #778899) );
  background:-moz-linear-gradient( center top, #778899 5%, #778899 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#778899', endColorstr='#778899');
  background-color:#778899;
  font-size:15px;
  color:#fff;
  border-radius: 16px 0px 16px 0px;
}


#sidebar .sidebar ul {
  margin-left:-26px;
}

#sidebar .sidebar li {
  list-style-type:none;
  border-bottom:1px dashed #cecece;
}

#sidebar .sidebar a {
  text-decoration:none;
}

#sidebar .sidebar a:hover {
  color:red;
}

#sidebar .sidebar li:hover {
  background:#e3e3e3;
}
    </style>
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Kita Mampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">H O M E</a></li>
      <li><a href="login.php">GALANG DANA</a></li>
      <li><a href="login.php">DONASI</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  <body>

    <div class="top=content">
      <div class="inner-bg">
        <div class="container">
          <div class="row">
          <div class="col-sm-6 col-sm-offset-3 form-box">
          <div class="form-top">
          <div class="form-top-left">
            <h3>Login to our site</h3>
            <p>Enter your username and password to log on</p>
          </div>
          <div class="form-top-right">
            <i class="fa fa-key"></i>
          </div>
          </div>
          <div class="form-bottom">
            <form role="form" action="" method="post" class="login-form">
              <div class="form-group">
                <label class="sr-only" for="form-username">Username</label>
                <input type="text" name="user" placeholder="Username ..." class="form-username form-control" id="form-username">  
              </div>
              <div class="form-group">
                <label class="sr-only" for="form-password">Password</label>
                <input type="password" name="pass" placeholder="Password ..." class="form-password form-control" id="form-password">  
              </div>
              
              <button type="submit" name="login" value="login" class="btn btn-info">Sign In</button>
          
            </form>
          </div>
          </div>  
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jqueryo.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
