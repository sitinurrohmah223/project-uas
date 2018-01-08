<?php
 require_once "PHPUnit/Framework/TestCase.php";
 
 class jumlahTest extends PHPUnit_Framework_TestCase
 {
    public function jum()
    {
      $jumlah = 20;
      $target = 40;
      $persen = $jumlah/$target*100;
      $this->assertEquals($persen,50);
        
    }
 }
?>