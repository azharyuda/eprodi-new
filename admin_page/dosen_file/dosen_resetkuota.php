<?php
  include "dist/koneksi.php";

  $qry=$link->query("UPDATE tbldosen SET
    kuota_pembimbing1=5,
     kuota_pembimbing2=5,
     kuota_penguji1=5, kuota_penguji2=5,
     kuotapenguji1_kkpi=5,
     kuotapenguji2_kkpi=5")
  OR DIE(mysqli_error());
  if($qry){
  echo "<script>window.alert('Berhasil reset')
  window.location='index.php?ke=d5n'</script>";
}

 ?>
