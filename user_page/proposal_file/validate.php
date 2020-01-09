<?php
  error_reporting(E_ALL);
  include "../dist/koneksi.php";

  $judul=$_GET['_judul'];
  $qry=$link->query("SELECT judul_skripsi FROM tblmahasiswa WHERE judul_skripsi='$judul'");
  $cek=$qry->fetch_array();

  if($cek>0){
    $result=false;
  }else{
    $result=true;
}
header('Content-Type: application/json');
echo json_encode($result);
?>
