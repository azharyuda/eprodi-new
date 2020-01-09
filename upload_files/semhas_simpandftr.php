<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  /* Sesi */
  $NIM=$_SESSION['NIM'];
  $qry=$link->query("SELECT kode_daftar FROM tbldaftarseminar_skripsi WHERE NIM='$NIM'") or die(mysqli_error());
  $take=$qry->fetch_array();
  $kode=$take['kode_daftar'];

  /* dari form */
  $tgl_input=date('Y-m-d');
  $tglsem=trim($_POST['_tglseminar']);
  $jam=htmlspecialchars(addslashes(trim($_POST['_jam'])));


  /* untuk file */
  foreach ($_FILES["_persyaratan"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["_persyaratan"]["tmp_name"][$key];
    $name = $_FILES["_persyaratan"]["name"][$key];


  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-$tgl_input.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/'.$name, $name);
       $zip->close();
     }
   }
 }

  if(empty($NIM) || empty($tglsem) || empty($jam)){
   echo "<script>window.alert('Data Kosong!')
  window.location='../user_page/index.php?ke=sempr0-ruang'</script>";
 }else{
$qry=$link->query("UPDATE tbldaftarseminar_skripsi SET persyaratan2='$namezip' WHERE kode_daftar='$kode'");

 $qry=$link->query("INSERT INTO tblseminar_2 VALUES(
   '$kode',
   '$NIM',
   '$tglsem',
   '$jam',
   '0',
   '0',
   '0',
   '0',
   '0',
   '0',
   'Menunggu ruangan seminar')") OR die(mysqli_error());
   echo "<script>window.alert('Data Tersimpan!')
  window.location='../user_page/index.php?ke=home'</script>";

   $hapus=glob('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/*.jpg');
   foreach($hapus as $data){
     unlink($data);
   }
}

 ?>
