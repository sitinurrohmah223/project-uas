<?php
@session_start();
include "../inc/koneksi.php";

  $idgalang = @$_GET['idgalang'];
  $sql = mysql_query("select * from tb_galang where id_galang = '$idgalang' ") or die (mysql_error());
  $data = mysql_fetch_array($sql);

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Halaman Edit Galang</title>
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
    Edit Data Galang Dana
    </div>

    <div id="inputan">
      <form action="" method="post">
        <div style="margin-top: 10px;">
        <tr>
              <td>Id Galang</td>
                <td>:</td>
              <td><input type="text" name="id_galang" value="<?php echo $data['id_galang']; ?>" disables="disabled" /></td>
            </tr>
        </div>
        <div style="margin-top: 10px;">
         <tr>
              <td>Judul</td>
                <td>:</td>
              <td><input type="text" name="judul" value="<?php echo $data['judul']; ?>" /></td>
            </tr>
        </div>
        <div style="margin-top: 10px;">
        <tr>
              <td>Kategori</td>  
                <td>:</td>
                <td>
              <select name="lokasi" style="width:100%">
                    <option value="">-Pilih Lokasi-</option>
                    <option value="aceh">Aceh</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="bandung">Bandung</option>
                    <option value="medan">Medan</option>
                </select>
                </td>
            </tr>
        </div>
        <div style="margin-top: 10px;">
        <tr>
              <td>Lokasi</td>
                <td>:</td>
                <td>
                <select name="kategori" style="width:100%" >
                    <option value="">-Pilih Kategori-</option>
                    <option value="Bencana Alam">bencana alam</option>
                    <option value="Anak Sakit">Anak Sakit</option>
                    <option value="Sosial">Sosial</option>
                </select>
                </td>
            </tr>
          </div>
          <div style="margin-top: 10px;">
          <tr>
              <td>Target</td>
                <td>:</td>
              <td><input type="text" name="target" value="<?php echo $data['target']; ?>"/></td>
            </tr>
          </div>
          <div style="margin-top: 10px;">
          <tr>
              <td>Deadline</td>
                <td>:</td>
              <td><input type="date" style="width:100%" name="deadline" value="<?php echo $data['deadline']; ?>"/></td>
            </tr>
          </div>
          <div style="margin-top: 10px;">
          <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" value="<?php echo $data['status']; ?>"/></td>
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
      </html>