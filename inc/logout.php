<?php
@session_start();
session_destroy();
header("location: /TBS PAW/index.php");
?>