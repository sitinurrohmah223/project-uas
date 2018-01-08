<?php
session_start();
include "../inc/koneksi.php";

$idadmin= $_GET['idadmin'];
  $sql = mysql_query("select * from tb_login where kode_user = '$idadmin' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);
?>

<body>
<div class="container-fluid">
<legend>Edit Data Admin </legend>
		
    </div>
  		<form class="form-horizontal" action="" method="POST" role="form">

  		<div class="form-group">
  			<label for="username" class="control-label col-sm-3">Username</label>
  			<div class="col-sm-8">
  				<input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username'] ?>">
  			</div>	
  		</div>

  		<div class="form-group">
  			<label for="password" class="control-label col-sm-3">Password</label>
  			<div class="col-sm-8">
  				<input type="password" name="password" class="form-control" value="<?php echo $data['password'] ?>">
  			</div>	
  		</div>

      <div class="form-group">
        <label for="nama_lengkap" class="control-label col-sm-3">Nama Lengkap</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="nama_lengkap" id="nama_lengkap" value="<?php echo $data['nama_lengkap'] ?>">
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
         $kode_user = @$_POST['kode_user'];
         $username = @$_POST['username'];
         $password = @$_POST['password'];
         $nama_lengkap = @$_POST['nama_lengkap'];
        
         $edit_profil = @$_POST['edit'];
         if($edit_profil){
           if($username == ""|| $password == ""|| $nama_lengkap == ""){ 
             ?>
                   <script type="text/javascript">
             alert("Inputan tidak boleh ada yang kosong");
             </script>
                   <?php
           } else {
             mysql_query("update tb_login set username = '$username', password = '$password', nama_lengkap = '$nama_lengkap' where kode_user = '$idadmin'") or die (mysql_error());
             ?>
                   <script type="text/javascript">
             alert("Data Berhasil Diedit");
             window.location.href="profil.php";
             </script>
                   <?php
           }
         }
   ?>
   </body>