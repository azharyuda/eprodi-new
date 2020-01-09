<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  if (isset($_POST['update'])){
    $id=addslashes($_POST['_id']);
    $nim= addslashes($_POST['_NIM']);
    $nm= addslashes($_POST['_nm_mhs']);
    $tpk= addslashes($_POST['_tpk']);
    $jdl= addslashes($_POST['_judul']);

      $qry="UPDATE tblskripsi_dulu SET
        id='$id',
        NIM='$nim',
        nm_mahasiswa='$nm',
        id_topik='$tpk',
        judul_skripsi='$jdl'
      WHERE id='$id'";
      $link->query($qry);

      if ($qry){
        echo "<script>window.alert('Berhasil Simpan!')
       window.location='index2.php?ke=skrP'</script>";
      }

    }
?>
