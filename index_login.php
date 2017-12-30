<?php
session_start();
if($_SESSION){
	if($_SESSION['level']=="Admin")
	{
		header("location: index_admin.php");
	}
	if($_SESSION['level']=="Dosen")
	{
		header("location: index_dokter.php");
	}
}

include "login.php"
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Halaman Utama Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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
	  						<input type="text" name="username" placeholder="Username ..." class="form-username form-control" id="form-username">	
  						</div>
  						<div class="form-group">
	  						<label class="sr-only" for="form-password">Password</label>
	  						<input type="password" name="password" placeholder="Password ..." class="form-password form-control" id="form-password">	
  						</div>
  						<div class="form-group">
							<select name="level" class="form-control" required>
								<option value="">--Pilih Level User--</option>
								<option value="1">Administrator</option>
								<option value="2">Dokter</option>	
							</select>	
  						</div>
  						<button type="submit" name="submit" class="btn btn-info">Sign In</button>
  						<?php echo $error; ?>
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
