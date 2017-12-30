<?php
function ceklogin($a){
@session_start();

	if(isset($_SESSION['user'])){
		if($_SESSION['user']==$a){

		}else if($_SESSION['user']=="user"){
			header("location: ../user/index.php");
		}else if($_SESSION['user']=="admin"){
			header("location: ../admin/indexadmin.php");
		}else{
			header("location: ../index.php");	
		}

	}else{
		header("location: ../index.php");
	}
		
}
?>