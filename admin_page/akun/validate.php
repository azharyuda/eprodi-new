<?php
  include "koneksi.php";
  $dosbing1=$_GET['_lama'];
  $dosbing2=$_GET['_bimbing2'];

  $qry=$link->query("SELECT NIDN FROM tbldosen WHERE nm_dosen='$dosbing1' AND nm_dosen='$dosbing2'");
  $cek=mysqli_num_rows($qry);

  if($cek>0){
    $result=false;
    }else{
        $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);

 ?>
