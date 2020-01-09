<?php
  error_reporting(E_ALL);
  include "../dist/koneksi.php";

  $nidn=$_GET['_NIDN'];

  $qry=$link->query("SELECT NIDN FROM tbldosen WHERE NIDN=$nidn");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
