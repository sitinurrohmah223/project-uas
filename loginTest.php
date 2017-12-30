<?php
 require_once "PHPUnit/Framework/TestCase.php";
 
 class loginTest extends PHPUnit_Framework_TestCase
 {
    public function test_login()
    {
       include "inc/koneksi.php";

        if(isset($_POST['login'])){
          $user = @$_POST['user'];
          $pass = @$_POST['pass'];
          
            if($user == "" || $pass == ""){
              ?> <script type="text/javascript">alert("Username / password tidak boleh kosong");</script> <?php
                }else {
                  $sql = mysql_query("select * from tb_login where username = '$user' and password = '$pass'") or die (mysql_error());
                  $sql2 = mysql_query("select * from tb_user where username = '$user' and password = '$pass'") or die (mysql_error());
              $data = mysql_fetch_array($sql);
              $data2 = mysql_fetch_array($sql2);
              $cek = mysql_num_rows($sql);
              $cek2 = mysql_num_rows($sql2);
              if($cek >= 1){
                  $_SESSION['user'] = "admin";
                  $_SESSION['uname'] = $data['username'];
                  echo "Login sebagai Admin";
                  //header("location: admin/index.php");
              }else if($cek2 >= 1){
                $_SESSION['user'] = "user";
                $_SESSION['uname'] = $data2['username'];
                echo "Login sebagai User";
               // header("location: user/index.php");
              }else{
                echo "Login Gagal!";
              }
                }

        }
    }
 }
?>