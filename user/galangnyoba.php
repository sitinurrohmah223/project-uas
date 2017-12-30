<?php
@session_start();
if(!isset($_SESSION['user'])){
  header("location: login.php");
}else if($_SESSION['user'] != 'user'){
  header("location: login.php");
}

include "../inc/koneksi.php";

if(isset($_POST["galang"])){

      $ekstensi_diperbolehkan = array('png','jpg');
      $nama = $_FILES['file']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];

      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){      
          move_uploaded_file($file_tmp, '../images/'.$nama);
          $query=mysql_query("insert into tb_galang values('','$_POST[judul]','$_POST[deskripsi]','$_POST[cerita]','$_POST[kategori]','$_POST[lokasi]','$_POST[target]','$_POST[deadline]','$nama','$_SESSION[id]')") or die(mysql_error());
          
          if($query){
           ?> <script type="text/javascript">alert("Campaign anda akan di proses");</script> <?php
          }else{
            echo 'GAGAL';
          }

        }else{
          echo 'UKURAN FILE TERLALU BESAR';
        }

      }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
}
?>

<div class="page-header"><h3 align="center">Tambah Galang</h3>
  		</div>
  		<form class="form-horizontal" action="galangnyoba.php" method="POST" role="form" enctype="multipart/form-data">


  		<div class="form-group">
  			<label for="judul" class="control-label col-sm-3">Judul</label>
  			<div class="col-sm-8">
  				<input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul Campaign">
  			</div>	
  		</div>

      <div class="form-group">
        <label for="deskripsi" class="control-label col-sm-3">Deskripsi</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi Campaign
          "></textarea>
        </div>  
      </div>

      <div class="form-group">
        <label for="cerita" class="control-label col-sm-3">Cerita</label>
        <div class="col-sm-8">
          <textarea class="form-control" rows="3" name="cerita" id="cerita" placeholder="Masukan Cerita"></textarea>
        </div>  
      </div>


  		<div class="form-group">
  			<label for="kategori" class="control-label col-sm-3">Kategori</label>
  			<div class="col-sm-8">
  				<select class="form-control" name="kategori" id="kategori">
  					<option value="">--Pilih Kategori--</option>
  					<option value="Bencana Alam">Bencana Alam</option>
  					<option value="Anak Yatim">Anak Yatim</option>
            <option value="Sosial">Sosial</option>
  				</select>
  			</div>	
  		</div>

      <div class="form-group">
        <label for="lokasi" class="control-label col-sm-3">Lokasi</label>
        <div class="col-sm-8">
          <select class="form-control" name="lokasi" id="lokasi">
            <option value="">--Pilih Lokasi--</option>
            <option value="aceh">Aceh</option>
            <option value="jakarta">Jakarta</option>
            <option value="bandung">Bandung</option>
            <option value="medan">Medan</option>
          </select>
        </div>  
      </div>

      <div class="form-group">
        <label for="target" class="control-label col-sm-3">Target</label>
        <div class="col-sm-8">
          <input type="text" name="target" id="target" class="form-control" placeholder="Masukan Target Dana yang Dibutuhkan">
        </div>  
      </div>

      <div class="form-group">
        <label for="deadline" class="control-label col-sm-3">Deadline</label>
        <div class="col-sm-8">
          <input type="date" name="deadline" id="deadline" class="form-control" placeholder="Masukan Deadline Campaign">
        </div>  
      </div>

      <div class="form-group">
        <label for="foto" class="control-label col-sm-3">Foto</label>
        <div class="col-sm-8">
          <input type="file" name="file" required/>
        </div>  
      </div>

     

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="galang" name="galang" class="btn btn-dark btn-block" value="Galang Sekarang" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>
    
    