<div class="container-fluid">
<legend>Data Donasi </legend>
		<div class="row">

		<form action="" method="post" role="search" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Masukan Id Donasi. .">
                </div>
                <button type="submit" name="cari_donasi" value="cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
        </form>
		
	</div>
    <div class="row" >
		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover" >
			<thead style="background-color: #336666;"> 
					<th style="text-align: center;">Id Donasi</th>
		            <th style="text-align: center;">Id Galang</th>
		            <th style="text-align: center;">Id User</th>
		            <th style="text-align: center;">Jumlah</th>
		            <th style="text-align: center;">Tanggal</th>
		            <th style="text-align: center;">Comment</th>
		            <th style="text-align: center;">Metode Pembayaran</th>
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

				$sql = mysql_query("select * from tb_donasi LIMIT $posisi, $batas") or die (mysql_error());
				$no = $posisi + 1;

				$inputan_pencarian = @$_POST['inputan_pencarian'];
				$cari_donasi= @$_POST['cari_donasi'];
				if($cari_donasi){
					if($inputan_pencarian != ""){
						$sql = mysql_query("select * from tb_donasi where id_donasi like '%$inputan_pencarian%' or id_user like '%$inputan_pencarian%'") or die(mysql_error());
						} else {
							$sql = mysql_query("select * from tb_donasi") or die(mysql_error());
						}
				} else {
					$sql = mysql_query("select * from tb_donasi") or die(mysql_error());
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
						
						<td align="center"><?php echo $data['id_donasi']; ?></td>
						<td align="center"><?php echo $data['id_galang']; ?></td>
						<td align="center"><?php echo $data['id_user']; ?></td>
						<td align="center"><?php echo $data['jumlah']; ?></td>
						<td align="center"><?php echo $data['tanggal']; ?></td>
						<td align="center"><?php echo $data['comment']; ?></td>
						<td align="center"><?php echo $data['bank']; ?></td>
						
						<td align="center">
							<a href="?page=donasiadmin&action=edit&iddonasi=<?php echo $data['id_donasi']; ?>" class="                   btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
							
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
				$jml = mysql_num_rows(mysql_query("select * from tb_donasi"));
				echo "Jumlah Data : <b>".$jml."</b>"; ?>
			</div>	

			<br>
			<br>
			<a href="../laporan/cetakdonasi.php" target="_blank"><button>Cetak</button></a>

		</div>
      </div>
    </div> 
</div>