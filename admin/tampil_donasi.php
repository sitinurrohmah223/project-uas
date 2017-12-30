<fieldset>
	<legend><strong>Tampil Data Donasi</strong></legend>
	
	<div style="margin-bottom:15px;" align="right">
	<form action="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="Masukan id donasi..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_donasi" value="cari" style="padding:3px;" />
	</form>
	</div>
    
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
        	<th>Id Donasi</th>
            <th>Id Galang</th>
            <th>Id User</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Comment</th>
            <th>Metode Pembayaran</th>
            <th>Opsi</th>
        </tr>

        <?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_donasi = @$_POST['cari_donasi'];
		if($cari_donasi){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tb_donasi where id_donasi like '%%$inputan_pencarian%%'") or die (mysql_error());
			} else {
				$sql = mysql_query("select * from tb_donasi") or die (mysql_error());
			}
		}else {
			$sql = mysql_query("select * from tb_donasi") or die (mysql_error());
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
				<td><?php echo $data['id_donasi']; ?></td>
				<td><?php echo $data['id_galang']; ?></td>
				<td><?php echo $data['id_user']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['comment']; ?></td>
				<td><?php echo $data['bank']; ?></td>

				<td align="center">
					<a href="?page=donasiadmin&action=edit&iddonasi=<?php echo $data['id_donasi'];?>"><button>Edit</button></a>
				</td>
			</tr>
			<?php
			}
		}
		?>
    </table>
</fieldset>