<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  if (isset($_POST['update'])){
    $id= addslashes($_POST['_idtopik']);
    $topik= addslashes($_POST['_topik']);

      $qry=$link->query("UPDATE tbltopik_skripsi SET
        id_topik='$id',
        topik_skripsi='$topik'
      WHERE id_topik='$id'") or die(mysqli_error());

      if ($qry){
        echo "<meta http-equiv='refresh' content='0; url=index2.php?ke=tpK' />";
      }

    }
?>
