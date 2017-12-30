<fieldset>
	<legend><strong>Tampil Data User</strong></legend>
	
	<div style="margin-bottom:15px;" align="right">
	<form action="" method="post">
		<input type="text" name="inputan_pencarian" placeholder="Masukan nama user..." style="width:200px; padding:5px;" />
		<input type="submit" name="cari_galang" value="cari" style="padding:3px;" />
	</form>
	</div>
    
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
        	<th>Id User</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>

        <?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_user= @$_POST['cari_user'];
		if($cari_user){
			if($inputan_pencarian != ""){
				$sql = mysql_query("select * from tb_user where id_user like '%%$inputan_pencarian%%'") or die (mysql_error());
			} else {
				$sql = mysql_query("select * from tb_user") or die (mysql_error());
			}
		}else {
			$sql = mysql_query("select * from tb_user") or die (mysql_error());
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
				<td><?php echo $data['id_user']; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['nama_lengkap']; ?></td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
				<td><?php echo $data['no_telepon']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['alamat']; ?></td>

				<td align="center">
					<a href="?page=userdiadmin&action=edit&id_user=<?php echo $data['id_user'];?>"><button>Edit</button></a>
					<a onclick="return confirm('Yakin Ingin Menghapus Data?')" href="?page=userdiadmin&action=hapus&id_user=<?php echo $data['id_user'];?>"><button>Hapus</button></a>
				</td>
			</tr>
			<?php
			}
		}
		?>
    </table>
</fieldset>