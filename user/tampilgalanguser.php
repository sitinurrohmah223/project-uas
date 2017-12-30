

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profil</title>
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
	<legend><strong>Tampil Data Galang Dana</strong></legend>
	
    <table width="100%" align="center" border="1px" style="border-collapse=collapse;">
    	<tr style="background-color: #336666;">
            <th>Judul</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Target</th>
            <th>Deadline</th>
        </tr>

        <?php 
        $sql = mysql_query("select * from tb_galang where kode = '$_SESSION[id]'") or die (mysql_error());
        while ($data = mysql_fetch_array($sql)){
        	?>
			<tr>
				<td><?php echo $data['judul']; ?></td>
				<td><?php echo $data['kategori']; ?></td>
				<td><?php echo $data['lokasi']; ?></td>
				<td><?php echo $data['target']; ?></td>
				<td><?php echo $data['deadline']; ?></td>

			</tr>
			<?php
			}
		?>
    </table>
</fieldset>

      <div id="contact" class="container">
  <h3 class="text-center">Contact</h3>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Bandung, INA</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: 021 912 315</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: kitamampu@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn btn-info" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  
</div>
<footer class="text-center">
  
  <p><a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">Copyright 2017</a></p> 
</footer>
      </body>
      </div>
      </body>
      </html>