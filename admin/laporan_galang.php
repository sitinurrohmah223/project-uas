<fieldset>
	<legend>Laporan Data Galang Dana</legend>
<?php
//untuk koneksi database
include "../inc/koneksi.php";

//untuk menentukan tanggal awal dan tanggal akhir data di database
$min_tanggal = mysql_fetch_array(mysql_query("select min(deadline) as min_tgl from tb_galang"));
$max_tanggal = mysql_fetch_array(mysql_query("select max(deadline) as max_tgl from tb_galang"));
?>
<div class="page-header">
	<center>
		<form action="" method="post">
			<table width="854" border="0">
				<td width="105">Tanggal Awal</td>
				<td colspan="2"><input type="date" name="tgl_awal" size="15" placeholder="yyyy-mm-dd"/></td>

			<td width="105">Tanggal Akhir</td>
			<td colspan="2"><input type="date" name="tgl_akhir" size="15" placeholder="yyyy-mm-dd"/></td>

			<td width="188">
				<button type="submit" name="cari_laporan" class="btn btn-white btn-info btn-bold">Tampilkan Data</button>
			</td>
		</table>
	</form>
	</center>
	<br/>
</div>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari_laporan'])){

	//menangkap nilai form
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];
	if(empty($tgl_awal) and empty($tgl_akhir)){
		//jika tidak menginput apa-apa
		$query = mysql_query("select * from tb_galang");
	} else{
		?>

		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-header"><i><b>Informasi Data Laporan Galang Dana : </b> dari tanggal <b><?php echo $_POST['tgl_awal']?></b> sampai dengan tanggal <b><?php echo $_POST['tgl_akhir']?></b></i>
							
						</div>
						<?php
						$query = mysql_query("select * from tb_galang where deadline between '$tgl_awal' and '$tgl_akhir'");
					}?>

						<form action="" method="post" role="search" class="navbar-form navbar-right">
			                <div class="form-group">
			                  <input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Masukan Id Galang. .">
			                </div>
			                <button type="submit" name="cari_galang" value="cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
		       			 </form>
						
					</div>


		<div class="col-md-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover" >
			<thead style="background-color: #336666;">
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">Id Galang</th>
		            <th style="text-align: center;">Judul</th>
		            <th style="text-align: center;">Kategori</th>
		            <th style="text-align: center;">Lokasi</th>
		            <th style="text-align: center;">Target</th>
		            <th style="text-align: center;">Deadline</th>
			</thead>
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
								$sql = mysql_query("select * from tb_galang where id_galang like '%$inputan_pencarian%'") or die(mysql_error());
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

						//menampilkan data table
						while($row = mysql_fetch_array($query)){
							?>
							<tr>
								<td align="center">
									<?php echo $no++."."; ?>
								</td>
								<td align="center">
									<?php echo $row ['id_galang'];?>
								</td>
								<td align="center">
									<?php echo $row ['judul'];?>
								</td>
								<td align="center">
									<?php echo $row ['kategori'];?>
								</td>
								<td align="center">
									<?php echo $row ['lokasi'];?>
								</td>
								<td align="center">
									<?php echo $row ['target'];?>
								</td>
								<td align="center">
									<?php echo $row ['deadline'];?>
								</td>

							</tr>

							
							<?php
						}
					}
						?>
					</table>

					<a href="../laporan/cetakgalang.php?tgl_awal=<?=$tgl_awal?>&tgl_akhir=<?=$tgl_akhir?>" target="_blank" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Cetak</a>
						<div style="margin-top: 10px; float: left;">

	</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}else {
		unset($_POST['cari_laporan']);
	}
	?>
	<br>
	


</fieldset>	