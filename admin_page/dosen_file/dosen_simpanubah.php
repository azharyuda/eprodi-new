<?php
  error_reporting(E_ALL);
  include "dist/koneksi.php";

    $NIDN= addslashes($_POST['_NIDN']);
    $nm_dosen= addslashes($_POST['_nm_dosen']);
    $kuota_pembimbing1= addslashes($_POST['_kuota_pembimbing1']);
    $kuota_pembimbing2= addslashes($_POST['_kuota_pembimbing2']);
    $kuota_penguji1= addslashes($_POST['_kuota_penguji1']);
    $kuota_penguji2= addslashes($_POST['_kuota_penguji2']);
    $uji1kkpi= addslashes($_POST['_penguji1_kkpi']);
    $uji2kkpi= addslashes($_POST['_penguji2_kkpi']);
    if(empty($NIDN) || empty($nm_dosen) || empty($kuota_pembimbing1) || empty($kuota_pembimbing2) ||
    empty($kuota_penguji1) || empty($kuota_penguji2) || empty($uji1kkpi) || empty($uji2kkpi)){
      echo "<script>window.alert('Ada data yang kosong')
     window.location='../admin_page/index2.php?ke=ubh_dsn&nidn=$NIDN'</script>";
   }else{
      $qry="UPDATE tbldosen SET
        NIDN='$NIDN',
        nm_dosen='$nm_dosen',
        kuota_pembimbing1='$kuota_pembimbing1',
        kuota_pembimbing2='$kuota_pembimbing2',
        kuota_penguji1='$kuota_penguji1',
        kuota_penguji2='$kuota_penguji2',
        kuotapenguji1_kkpi='$uji1kkpi',
        kuotapenguji2_kkpi='$uji2kkpi'
      WHERE NIDN='$NIDN'";
      $link->query($qry);
      echo "<script>window.alert('Data Berhasil disimpan!')
      window.location='../admin_page/index2.php?ke=d5n'</script>";
  }
?>
