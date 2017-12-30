<?php
@session_start();
include "../inc/koneksi.php";

  $iddonasi = @$_GET['iddonasi'];
  $sql = mysql_query("select * from tb_donasi where id_donasi = '$iddonasi' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Edit Donasi</title>
<style type="text/css">
body{
  font-family:arial;
  font-size: 14px;
  background-color: #ceeab3;
}

#utama{
  width:400px;
  margin: 0 auto;
  margin-top: 12%;
  background-color: #ceeab3;
}

#judul{
  padding: 15px;
  text-align: center;
  color: #fff;
  font-size: 20px;
  background-color: #336666;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
  border-bottom: 3px solid #336666;
}

#inputan{
  background-color: #ccc;
  padding: 20px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}

input,select,textarea{
  padding: 10px;
  border: 0;
  width: 350px;
}
textarea{
  font-family: arial;
  font-size: 13px;
}
.lg{
  width: 240px;
}

.btn{
  background-color: #336666;
  border-radius: 10px;
  color: #fff;
}

.btn:hover{
  background-color: #336666;
  cursor: pointer;
}
.btn-right{
  padding: 10px;
  text-decoration: none;
  border-radius: 3px;
  color: #fff;
}

</style>
    
</head>
<body>
<div id="utama" style="margin-top: 20px;">
    <div id="judul">
    Edit Data Donasi
    </div>

    <div id="inputan">
      <form action="" method="post">
        <div style="margin-top: 10px;">
        <tr>
              <td>Id Donasi</td>
                <td>:</td>
              <td><input type="text" name="id_donasi" value="<?php echo $data['id_donasi']; ?>" disables="disabled" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
         <tr>
              <td>Id Galang</td>
                <td>:</td>
              <td><input type="text" name="id_galang" value="<?php echo $data['id_galang']; ?>" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
         <tr>
              <td>Id User</td>
                <td>:</td>
              <td><input type="text" name="id_user" value="<?php echo $data['id_user']; ?>" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
         <tr>
              <td>Jumlah</td>
                <td>:</td>
              <td><input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
         <tr>
              <td>Tanggal</td>
                <td>:</td>
              <td><input type="text" name="tanggal" value="<?php echo $data['tanggal']; ?>" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
         <tr>
              <td>Comment</td>
                <td>:</td>
              <td><input type="text" name="comment" value="<?php echo $data['comment']; ?>" /></td>
            </tr>
        </div>

        <div style="margin-top: 10px;">
        <tr>
              <td>Metode Pembayaran</td>  
                <td>:</td>
                <td>
              <select name="lokasi" style="width:100%">
                    <option value="">-Pilih Pembayaran-</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="BNI SYARIAH">BNI Syariah</option>
                    <option value="MANDIRI">Mandiri</option>
                    <option value="BCA">BCA</option>
                </select>
                </td>
            </tr>
        </div>

          <div style="margin-top: 10px;">
          <tr>
              <td></td>
                <td></td>
                <td><input type="submit" name="edit" value="Edit" /> <input type="reset" value="Batal" /></td>
            </tr> 
          </div>
        </div>
      </form>
      </div>
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
     if($bank == ""){ 
       ?>
             <script type="text/javascript">
       alert("Inputan tidak boleh ada yang kosong");
       </script>
             <?php
     } else {
       mysql_query("update tb_donasi set status = '$status' where id_donasi = '$iddonasi'") or die (mysql_error());
       ?>
             <script type="text/javascript">
       alert("Data Berhasil Diedit");
       window.location.href="?page=donasiadmin";
       </script>
             <?php
     }
   }
   ?>
      </body>
      </html>