 <?php
 error_reporting(E_ALL ^ (E_NOTICE));
    include "dist/koneksi.php";

     $id= addslashes($_POST['_idtopik']);
     $topik= addslashes($_POST['_topik']);


     $input=$link->query("INSERT INTO tbltopik_skripsi VALUES(
       '$id',
       '$topik')") or die (mysqli_error());


       echo "<meta http-equiv='refresh' content='0; url=index2.php?ke=tpK' />";

?>
