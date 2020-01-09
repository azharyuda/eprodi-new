<?php
  include "dist/koneksi.php";


  $id=$_GET['id'];
  $hps="DELETE FROM tblskripsi_dulu WHERE id='$id'";
  $link->query($hps);

  if ($hps){
    echo "<script>window.alert('Berhasil')
   window.location='index2.php?ke=skrP'</script>";
  }
 ?>
