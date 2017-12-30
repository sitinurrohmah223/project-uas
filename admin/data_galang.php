<div class="container-fluid">
<legend>Data Galang </legend>
		<div class="row">

		<form action="" method="post" role="search" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Masukan Id Galang. .">
                </div>
                <button type="submit" name="cari_galang" value="cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
        </form>
		
	</div>
    <div class="row" >
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover" >
			<thead style="background-color: #336666;"> 
					<th style="text-align: center;">Id Galang</th>
		            <th style="text-align: center;">Judul</th>
		            <th style="text-align: center;">Kategori</th>
		            <th style="text-align: center;">Lokasi</th>
		            <th style="text-align: center;">Target</th>
		            <th style="text-align: center;">Deadline</th>
		            <th style="text-align: center;">Opsi</th>
			</thead>
			<tbody>
				<?php
				$no = 1;

				$batas = 3;
				$hal = @$_GET['hal'];
				if(empty($hal)){
					$posisi = 0;
					$hal = 1;
				} else {
					$posisi = ($hal - 1) * $batas;
				}

				$sql = mysql_query("select * from tb_galang LIMIT $posisi, $batas") or die (mysql_error());
				$no = $posisi + 1;

				$inputan_pencarian = @$_POST['inputan_pencarian'];
				$cari_galang = @$_POST['cari_galang'];
				if($cari_galang){
					if($inputan_pencarian != ""){
						$sql = mysql_query("select * from tb_galang where id_galang like '%$inputan_pencarian%' or judul like '%$inputan_pencarian%'") or die(mysql_error());
						} else {
							$sql = mysql_query("select * from tb_galang") or die(mysql_error());
						}
				} else {
					$sql = mysql_query("select * from tb_galang") or die(mysql_error());
				}

				$cek = mysql_num_rows($sql);
				if($cek < 1){
					?>
					<tr>
						<td colspan="10" align="center" style="padding: 10px;">Data tidak ditemukan.</td>
					</tr>
					<?php

				} else {

				while ($data = mysql_fetch_array($sql)){
				?>
				
					<tr>
						
						<td align="center"><?php echo $data['id_galang']; ?></td>
						<td align="center"><?php echo $data['judul']; ?></td>
						<td align="center"><?php echo $data['kategori']; ?></td>
						<td align="center"><?php echo $data['lokasi']; ?></td>
						<td align="center"><?php echo $data['target']; ?></td>
						<td align="center"><?php echo $data['deadline']; ?></td>
					
						
						<td align="center">
							<a href="?page=galangadmin&action=edit&idgalang=<?php echo $data['id_galang']; ?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
							<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=galangadmin&action=hapus&idgalang=<?php echo $data['id_galang']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
				<?php
				}
				}
				?>				
			</tbody>	
			</table>
			<div style="margin-top: 10px; float: left;">
				<?php 
				$jml = mysql_num_rows(mysql_query("select * from tb_galang"));
				echo "Jumlah Data : <b>".$jml."</b>"; ?>
			</div>	

			<br>
			<br>
			<a href="../laporan/cetakgalang.php" target="_blank"><button>Cetak</button></a>

			
		</div>
      </div>
    </div> 
</div>