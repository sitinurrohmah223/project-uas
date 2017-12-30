<?php
$idgalang = @$_GET['idgalang'];

mysql_query("delete from tb_galang where id_galang = '$idgalang'")
?>

<script type="text/javascript">
	window.location.href="?page=galangadmin";
</script>