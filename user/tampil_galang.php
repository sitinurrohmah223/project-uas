<fieldset>
	<legend><strong>Tampil Data Galang Dana</strong></legend>
	
	<div style="margin-bottom:15px;" align="right">
	<form action="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="Masukan id penggalang..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_galang" value="cari" style="padding:3px;" />
	</form>
	</div>
    
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
        	<th>Id Galang</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Target</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_galang = @$_POST['cari_galang'];
		if($cari_galang){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tb_galang where id_galang like '%%$inputan_pencarian%%'") or die (mysql_error());
			} else {
				$sql = mysql_query("select * from tb_galang") or die (mysql_error());
			}
		}else {
			$sql = mysql_query("select * from tb_galang") or die (mysql_error());
		}
		
		$cek = mysql_num_rows($sql);
		if($cek < 1){
			?>
			<tr>
				<td colspan="7" align="center" style="padding:10px;">Data tidak ditemukan</td>
			</tr>
			<?php
		} else {
			
			while($data = mysql_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $data['id_galang']; ?></td>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['kategori']; ?></td>
				<td><?php echo $data['lokasi']; ?></td>
				<td><?php echo $data['target']; ?></td>
				<td><?php echo $data['deadline']; ?></td>
				<td><?php echo $data['status']; ?></td>

				<td align="center">
					<a href="?page=galangadmin&action=edit&idgalang=<?php echo $data['id_galang'];?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin Ingin Menghapus Data?')" href="?page=galangadmin&action=hapus&idgalang=<?php echo $data['id_galang'];?>"><button>Hapus</button></a>
				</td>
			</tr>
			<?php
			}
		}
		?>
    </table>
</fieldset>