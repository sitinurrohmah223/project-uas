<?php
@session_start();
if(isset($_SESSION['user'])){
  if($_SESSION['user']=='user')
    header("location:user/index.php");
  else if($_SESSION['user']=='admin')
    header("location:admin/indexadmin.php");

}

include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>home</title>
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
      background-color: #8FBC8F;
      color: #B0C4DE;
      padding: 10px;
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
      <a class="navbar-brand" href="#">Kita Mampu</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>     H O M E</a></li>
      <li><a href="login.php">GALANG DANA</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-gift"></span>     DONASI</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
          <img src="images/banner1.jpg" alt="New York">
            <div class="carousel-caption">
        
            </div> 
        </div>

      <div class="item">
        <img src="images/banner2.jpg" alt="Chicago">
        <div class="carousel-caption">
      
      </div> 
    </div>

    <div class="item">
      <img src="images/banner3.jpg" alt="Los Angeles">
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
            $awal = date_create();
            $akhir = date_create($data['deadline']);
            $diff = date_diff($awal, $akhir);
          ?>
 <div class="col-sm-4">
              <div class="panel panel-default">
              <div class="panel-heading" style="padding:0px">
                  <img width="358px" height="250px" src="images/<?php echo $data['foto']; ?>">
              </div>
              <div class="panel-body"> 
                  <b><font size="3px" style="margin-top:20px"><?php echo $data['judul']; ?></font></b>
                 <p><?php echo $gl['username'];?>          &nbsp;<span class="glyphicon glyphicon-ok-circle"></span></p>
                  <p><?php echo $data['deskripsi'] ?></p>
                  <div class="row">
                    <div class="col-sm-4">
                      <h5>Rp. <?php echo number_format($jumlah['jml']);?></h5>
                      <p>Terkumpul</p>
                    </div>
                    <div class="col-sm-4">
                      <h5><?php echo number_format($persen,2).'%';?></h5>
                      <p>Tercapai</p>
                    </div>
                    <div class="col-sm-4">
                      <h5><?php echo $diff->d ?></h5>
                      <p>Hari lagi</p>
                    </div>
                  </div>
              </div>
              <div class="panel-footer"><a href="login.php"><button class="btn btn-info" >Donasi</button></a></div>
            </div>
            </div>
              <?php } ?>
        </div>
          <?php  
          if($pages >= 1 && $page <= $pages){
            for($x=1; $x<=$pages; $x++){?>
              <ul class="pagination">
               <li class="page-item"><?php echo ($x == $page) ? '<a href="?page='.$x.'">'.$x.'</a> ' : ' <a href="?page='.$x.'">'.$x.' </a>'?></li>
  </ul>
        
    <?php }
}?>
    </div>
    <!--coba-->

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