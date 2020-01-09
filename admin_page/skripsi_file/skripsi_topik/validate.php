<?php
  error_reporting(E_ALL);
  include "../../dist/koneksi.php";

  $id=$_GET['_idtopik'];

  $qry=$link->query("SELECT id_topik FROM tbltopik_skripsi WHERE id_topik='$id'");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
