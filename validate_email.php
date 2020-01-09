<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";

  $mail=$_GET['_email'];

  $qry=$link->query("SELECT id FROM tblmahasiswa WHERE email='$mail'");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
