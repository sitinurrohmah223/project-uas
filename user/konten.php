<?php
@session_start();
include "inc/koneksi.php";

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
      <li><a href="index.php">HOME</a></li>
      <li><a href="galang.php">GALANG DANA</a></li>
      <li><a href="donasi.php">DONASI</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
    
    
          
   
  

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: 021 912 315</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: wattpad@gmail.com</p>
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


  <!-- Footer -->
<footer class="text-center">
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright 2017</a></p> 
</footer>
</div>
</body>
</html>