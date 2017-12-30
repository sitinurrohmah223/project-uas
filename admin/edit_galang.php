<fieldset>
	<legend>Edit Data Galang Dana</legend>
    
    <?php
	$idgalang = @$_GET['idgalang'];
	$sql = mysql_query("select * from tb_galang where id_galang = '$idgalang' ") or die (mysql_error());
	$data = mysql_fetch_array($sql);
	?>

	<form action="" method="post">
    	<table style="color: black" align="center">
        	<tr>
            	<td>Id Galang</td>
                <td>:</td>
            	<td><input type="text" name="id_galang" value="<?php echo $data['id_galang']; ?>" disables="disabled" /></td>
            </tr>
            
            <tr>
            	<td>Judul</td>
                <td>:</td>
            	<td><input type="text" name="judul" value="<?php echo $data['judul']; ?>" /></td>
            </tr>
            
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
			
			<tr>
            	<td>Target</td>
                <td>:</td>
            	<td><input type="text" name="target" value="<?php echo $data['target']; ?>"/></td>
            </tr>
			
			<tr>
            	<td>Deadline</td>
                <td>:</td>
            	<td><input type="date" style="width:100%" name="deadline" value="<?php echo $data['deadline']; ?>"/></td>
            </tr>

            <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" value="<?php echo $data['status']; ?>"/></td>
            </tr>
                        
            <tr>
            	<td></td>
                <td></td>
                <td><input type="submit" name="edit" value="Edit" /> <input type="reset" value="Batal" /></td>
            </tr> 
        </table>
     </form>
     
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

        
</fieldset>