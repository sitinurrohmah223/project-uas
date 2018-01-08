<?php
$iduser = @$_GET['iduser'];

mysql_query("delete from tb_user where id_user = '$iduser'")
?>

<script type="text/javascript">
	window.location.href="?page=userdiadmin";
</script>