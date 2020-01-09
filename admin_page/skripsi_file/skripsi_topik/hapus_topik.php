<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";


  $id=$_GET['topik'];
  $hps=$link->query("DELETE FROM tbltopik_skripsi WHERE id_topik='$id'") or die (mysqli_error());
  if ($hps){
    echo "<meta http-equiv='refresh' content='0; index2.php?ke=tpK&success=2' />";

  }
 ?>
