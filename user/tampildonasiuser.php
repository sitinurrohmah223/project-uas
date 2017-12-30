

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donasi User</title>
<style type="text/css">
body{
  font-family:arial;
  font-size: 14px;
  background-color: white;
}

#utama{
  width:300px;
  margin: 0 auto;
  margin-top: 12%;
  background-color: #fff;
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
  padding: 25px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}

input,select,textarea{
  padding: 10px;
  border: 0;
  width: 250px;
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
  padding: 85px;
  text-decoration: none;
  border-radius: 3px;
  color: #000;
  font-size: 16px;
}

</style>

</head>

<fieldset>
	<legend><strong>Tampil Data Donasi</strong></legend>
	
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
            <th>Jumlah</th>
            <th>Comment</th>
            <th>Tanggal</th>
            <th>Bank</th>
            <th>Status</th>
            <th>Status</th>

        </tr>

        <?php 
        $sql = mysql_query("select * from tb_donasi where id_user = '$_SESSION[id]'") or die (mysql_error());
        while ($data = mysql_fetch_array($sql)){
        	?>
			<tr>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['comment']; ?></td>
				<td><?php echo $data['tanggal']; ?></td>
				<td><?php echo $data['bank']; ?></td>
				<td><?php echo $data['status']; ?></td>
        <td><?php if ($data['status']=='pending'){ 
        echo '<a href="konfirmasi.php">Konfirmasi</a>';
         } ?></td>

			</tr>
			<?php
			}
		?>
    </table>
</fieldset>

      
      </body>
      </div>
      </body>
      </html>