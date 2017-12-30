<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
		 <div class="carousel-inner" role="listbox">
    		<div class="item active">
      		<img src="../images/banner1.jpg" alt="New York">
      			<div class="carousel-caption">
        
      			</div> 
    		</div>

    	<div class="item">
      	<img src="../images/banner2.jpg" alt="Chicago">
      	<div class="carousel-caption">
      
      </div> 
    </div>

    <div class="item">
      <img src="../images/banner3.jpg" alt="Los Angeles">
      <div class="carousel-caption">
        
      </div> 
    </div>

    <div class="item">
        <img src="../images/banner4.jpg" alt="Chicago">
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

            $persen = $jumlah['jml']/$data['target']*100;


          ?>
          <div class="col-sm-4">
              <div class="panel panel-default">
              <div class="panel-heading" style="padding:0px">
                  <img width="360px" height="250px" src="../images/<?php echo $data['foto']; ?>">
              </div>
              <div class="panel-body"> 
                  <b><font size="3px" style="margin-top:20px"><?php echo $data['judul']; ?></font></b>
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
        <?php } 
        if($pages >= 1 && $page <= $pages){
    for($x=1; $x<=$pages; $x++){?>
    <ul class="pagination">
    <li class="page-item"><a class="page-link"><?php echo ($x == $page) ? '<a href="?page='.$x.'">'.$x.'</a> ' : ' <a href="?page='.$x.'">'.$x.' </a>'?></a></li>
  </ul>
        
    <?php }
}?>
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
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright 2017</a></p> 
</footer>
