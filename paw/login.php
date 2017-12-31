<?php
@session_start();
include "inc/koneksi.php";

if(isset($_POST['login'])){
  $user = @$_POST['user'];
  $pass = @$_POST['pass'];
  $pass = md5($pass);
  
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
        header("location: user/index.php");
      }else{
        echo "Login Gagal!";
      }
        }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
      padding: 20px;
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
          
          <li><a href="donasi.php">DONASI</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
    
    

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
