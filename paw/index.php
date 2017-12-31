<?php
session_start();
include "../inc/ceklogin.php";
ceklogin('user');
include "../inc/koneksi.php";

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
		
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
		 <div class="carousel-inner" role="listbox">
    		<div class="item active">
      		<img src="../images/ban2.jpg" alt="New York">
      			<div class="carousel-caption">
        
      			</div> 
    		</div>

    	<div class="item">
      	<img src="../images/ban1.jpg" alt="Chicago">
      	<div class="carousel-caption">
      
      </div> 
    </div>

    <div class="item">
      <img src="../images/ban3.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        
      </div> 
    </div>
  </div>
</div>
          
<div class="row" style="margin-top: 20px;">
   <?php 


      $per_page = 3;
 
      $page_query = mysql_query("SELECT COUNT(*) FROM tb_galang");
      $pages = ceil(mysql_result($page_query, 0) / $per_page);
       
      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $per_page;
      $sql = mysql_query("select * from tb_galang LIMIT $start, $per_page");
      while($data = mysql_fetch_array($sql)){

      $id_galang = $data['id_galang'];
      $jumlah = mysql_fetch_array(mysql_query("select sum(jumlah) as jml from tb_donasi where id_galang='$id_galang'"));

      $gl = mysql_fetch_array(mysql_query("select a.username from tb_user a join tb_galang b on a.id_user=b.id_user where id_galang=$id_galang"));

      $persen = $jumlah['jml']/$data['target']*100;


    ?>
    <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding:0px">
              <img width="360px" height="250px" src="../images/<?php echo $data['foto']; ?>">
          </div>
          <div class="panel-body"> 
              <b><font size="3px" style="margin-top:20px" text-align="justify"><?php echo $data['judul']; ?></font></b>
               <p><?php echo $gl['username'];?>          &nbsp;<span class="glyphicon glyphicon-ok-circle"></span></p>
              <p><?php echo $data['deskripsi'] ?></p>
              <div class="row">
                <div class="col-sm-4">
                  <h5>Rp. <?php echo number_format($jumlah['jml']);?></h5>
                  <p>Terkumpul</p>
                </div>
                <div class="col-sm-4">
                  <h5><?php echo $persen.'%';?></h5>
                  <p>Tercapai</p>
                </div>
                <div class="col-sm-4">
                  <h5>12</h5>
                  <p>Hari lagi</p>
                </div>
              </div>
          </div>
          <div class="panel-footer"><a href="donasi.php?id=<?php echo $data['id_galang']; ?>"><button class="btn btn-info" >Donasi</button></a></div>
        </div>
    </div>

    <?php } ?>
  </div>


        <div>
          <?php  
          if($pages >= 1 && $page <= $pages){
            for($x=1; $x<=$pages; $x++){?>
              <ul class="pagination">
                <li class="page-item"><?php echo ($x == $page) ? '<a href="?page='.$x.'">'.$x.'</a> ' : ' <a href="?page='.$x.'">'.$x.' </a>'?></li>
              </ul>
          <?php } } ?>
        </div>

	
	
  

<!-- Container (Contact Section) -->
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
  <!-- Footer -->
<footer class="text-center">
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright &copy 2017</a></p> 
</footer>
</div>
</body>
</html>