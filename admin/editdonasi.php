<?php
@session_start();
include "../inc/koneksi.php";

  $iddonasi = @$_GET['iddonasi'];
  $sql = mysql_query("select * from tb_donasi where id_donasi = '$iddonasi' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);

?>
<body>
<div class="container-fluid">
<legend>Edit Data Donasi </legend>
		
    </div>
  		<form class="form-horizontal" action="" method="POST" role="form">

  		<div class="form-group">
  			<label for="id_donasi" class="control-label col-sm-3">Id Donasi</label>
  			<div class="col-sm-8">
  				<input type="text" name="id_donasi" id="id_donasi" class="form-control" value="<?php echo $data['id_donasi'] ?>" disables="disabled" >
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="id_galang" class="control-label col-sm-3">Id Galang</label>
  			<div class="col-sm-8">
  				<input type="text" name="id_galang" id="id_galang" class="form-control" value="<?php echo $data['id_galang'] ?>">
  			</div>	
  		</div>

      <div class="form-group">
        <label for="id_user" class="control-label col-sm-3">Id User</label>
        <div class="col-sm-8">
          <input type="text" name="id_user" id="id_user" class="form-control" value="<?php echo $data['id_user'] ?>">
        </div>  
      </div>



      <div class="form-group">
        <label for="jumlah" class="control-label col-sm-3">Jumlah</label>
        <div class="col-sm-8">
          <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?php echo $data['jumlah'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="tanggal" class="control-label col-sm-3">Tanggal</label>
        <div class="col-sm-8">
          <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $data['tanggal'] ?>">
        </div>  
      </div>

       <div class="form-group">
        <label for="comment" class="control-label col-sm-3">Comment</label>
        <div class="col-sm-8">
          <input type="text" name="comment" id="comment" class="form-control" value="<?php echo $data['comment'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="bank" class="control-label col-sm-3">Metode Pembayaran</label>
        <div class="col-sm-8">
          <select class="form-control" name="bank" id="bank">
            <option value="">--Pilihan--</option>
            <option value="BCA">BCA</option>
            <option value="BNI">BNI</option>
            <option value="BNI SYARIAH">BNI SYARIAH</option>
            <option value="MANDIRI">MANDIRI</option>
            <option value="BRI">BRI</option>
          </select>
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
   $id_donasi = @$_POST['id_donasi'];
   $id_galang = @$_POST['id_galang'];
   $id_user = @$_POST['id_user'];
   $jumlah = @$_POST['jumlah'];
   $tanggal = @$_POST['tanggal'];
   $comment = @$_POST['comment'];
  $bank = @$_POST['bank'];

  
   $edit_donasi = @$_POST['edit'];
   if($edit_donasi){
     if($comment == ""){ 
       ?>
             <script type="text/javascript">
       alert("Inputan tidak boleh ada yang kosong");
       </script>
             <?php
     } else {
       mysql_query("update tb_donasi set comment = '$comment' where  id_donasi= '$iddonasi'") or die (mysql_error());
       ?>
             <script type="text/javascript">
       alert("Data Berhasil Diedit");
       window.location.href="?page=galangdonasi";
       </script>
             <?php
     }
   }
   ?>  
   </body>