<?php
@session_start();
include "../inc/koneksi.php";

  $idgalang = @$_GET['idgalang'];
  $sql = mysql_query("select * from tb_galang where id_galang = '$idgalang' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);

?>
<body>
<div class="container-fluid">
<legend>Edit Data Galang </legend>
		
    </div>
  		<form class="form-horizontal" action="" method="POST" role="form">

  		<div class="form-group">
  			<label for="id_galang" class="control-label col-sm-3">Id Galang</label>
  			<div class="col-sm-8">
  				<input type="text" name="id_galang" id="id_galang" class="form-control" value="<?php echo $data['id_galang'] ?>" disables="disabled" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="judul" class="control-label col-sm-3">Judul</label>
  			<div class="col-sm-8">
  				<input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data['judul'] ?>">
  			</div>	
  		</div>

      <div class="form-group">
        <label for="deskripsi" class="control-label col-sm-3">Deskripsi</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="deskripsi" id="deskripsi" value="<?php echo $data['deskripsi'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="cerita" class="control-label col-sm-3">Cerita</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="cerita" id="cerita" value="<?php echo $data['cerita'] ?>">
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
          <input type="text" name="target" id="target" class="form-control" value="<?php echo $data['target'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="deadline" class="control-label col-sm-3">Deadline</label>
        <div class="col-sm-8">
          <input type="date" name="deadline" id="deadline" class="form-control" value="<?php echo $data['deadline'] ?>">
        </div>  
      </div>

 		<div class="form-group">
 			<label for="btn" class="control-label col-sm-3"></label>
	 		<div class="col-sm-8">
        <div class="col-sm-4">
        <input type="submit" id="edit" name="edit" class="btn btn-dark btn-block" value="Edit Data" />
        </div>
        <div class="col-sm-4">
        <input type="reset" id="reset" class="btn btn-danger btn-block" value="Batal" />
        </div>

	 			
	 		</div>
 			
 		</div>
  			
  	</form>
    </div> 


<?php
   $id_galang = @$_POST['id_galang'];
   $judul = @$_POST['judul'];
   $kategori = @$_POST['kategori'];
   $lokasi = @$_POST['lokasi'];
   $target = @$_POST['target'];
   $deadline = @$_POST['deadline'];
     $status = @$_POST['status'];
  
   $edit_galang = @$_POST['edit'];
   if($edit_galang){
     if($status == ""){ 
       ?>
             <script type="text/javascript">
       alert("Inputan tidak boleh ada yang kosong");
       </script>
             <?php
     } else {
       mysql_query("update tb_galang set status = '$status' where id_galang = '$idgalang'") or die (mysql_error());
       ?>
             <script type="text/javascript">
       alert("Data Berhasil Diedit");
       window.location.href="?page=galangadmin";
       </script>
             <?php
     }
   }
   ?>  
   </body>