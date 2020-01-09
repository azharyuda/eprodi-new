<?php
error_reporting(E_ALL);
  include "dist/koneksi.php";


  $nidn=$_GET['nidn'];
  $hps="DELETE FROM tbldosen WHERE NIDN='$nidn'";
  $link->query($hps);

  echo "<script>window.alert('Data Berhasil Dihapus!')
  window.location='../admin_page/index2.php?ke=d5n'</script>";
 ?>
