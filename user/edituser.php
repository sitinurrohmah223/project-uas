<?php
@session_start();
include "../inc/koneksi.php";

  $id = @$_SESSION['id'];
  $sql = mysql_query("select * from tb_user where kode = '$id' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);

?>
<body>
<div class="container-fluid">
<legend>Edit Data Diri </legend>
    
    </div>
      <form class="form-horizontal" action="" method="POST" role="form">

      <div class="form-group">
        <label for="kode" class="control-label col-sm-3">Id User</label>
        <div class="col-sm-8">
          <input type="text" name="kode" id="kode" class="form-control" value="<?php echo $data['kode'] ?>" disables="disabled" >
        </div>  
      </div>

      <div class="form-group">
        <label for="username" class="control-label col-sm-3">Username</label>
        <div class="col-sm-8">
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="password" class="control-label col-sm-3">Password</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="password" id="password" value="<?php echo $data['password'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="nama_lengkap" class="control-label col-sm-3">Nama Lengkap</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" rows="3" name="nama_lengkap" id="nama_lengkap" value="<?php echo $data['nama_lengkap'] ?>">
        </div>  
      </div>


      <div class="form-group">
        <label for="jenis_kelamin" class="control-label col-sm-3">Jenis Kelamin</label>
        <div class="col-sm-8">
          <select class="form-control" name="kategori" id="kategori">
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>  
      </div>


      <div class="form-group">
        <label for="no_telepon" class="control-label col-sm-3">No Telepon</label>
        <div class="col-sm-8">
          <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="<?php echo $data['no_telepon'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="email" class="control-label col-sm-3">Email</label>
        <div class="col-sm-8">
          <input type="text" name="email" id="email" class="form-control" value="<?php echo $data['email'] ?>">
        </div>  
      </div>

      <div class="form-group">
        <label for="alamat" class="control-label col-sm-3">Alamat</label>
        <div class="col-sm-8">
          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $data['alamat'] ?>">
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
</div>

<?php
   $kode = @$_POST['kode'];
   $username = @$_POST['username'];
   $password = @$_POST['password'];
   $nama_lengkap = @$_POST['nama_lengkap'];
   $jenis_kelamin = @$_POST['jenis_kelamin'];
   $no_telepon = @$_POST['no_telepon'];
   $email = @$_POST['email'];
   $alamat = @$_POST['alamat'];
  
   $edit_user = @$_POST['edit'];
   if($edit_user){
     if($username== "" || $password =="" || $nama_lengkap == "" || $jenis_kelamin == "" || $no_telepon == "" || $email == "" || $alamat == ""){ 
       ?>
             <script type="text/javascript">
       alert("Inputan tidak boleh ada yang kosong");
       </script>
             <?php
     } else {
       mysql_query("update tb_user set username = '$username', password = '$password', nama_lengkap = '$nama_lengkap', jenis_kelamin ='$jenis_kelamin', no_telepon = '$no_telepon', email='$email', alamat='$alamat' where kode = '$id'") or die (mysql_error());
       ?>
             <script type="text/javascript">
       alert("Data Berhasil Diedit");
       window.location.href="?page=edit";
       </script>
             <?php
     }
   }
   ?>  
   </body>