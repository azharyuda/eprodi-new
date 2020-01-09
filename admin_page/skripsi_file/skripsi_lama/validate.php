<?php
  error_reporting(E_ALL ^ (E_NOTICE));
  include "../../dist/koneksi.php";

  $nim=$_GET['_NIM'];

  $qry=$link->query("SELECT NIM FROM tblskripsi_dulu WHERE NIM=$nim");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
