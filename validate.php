<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";

  $nim=$_GET['_nim'];

  $qry=$link->query("SELECT id FROM tblmahasiswa WHERE NIM=$nim");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
