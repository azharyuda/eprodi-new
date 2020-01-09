<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  /* Sesi */
  $NIM=$_SESSION['NIM'];
  $ambil=$link->query("SELECT kode_daftar FROM tbldaftar_pendadaran WHERE NIM='$NIM'");
  $take=$ambil->fetch_array();
  $kode=$take['kode_daftar'];

  /* dari form */
  $tgl_input=date('Y-m-d');
  $tglsem=htmlspecialchars(addslashes(trim($_POST['_tglseminar'])));
  $jam=htmlspecialchars(addslashes(trim($_POST['_jam'])));


  /* untuk file */
  foreach ($_FILES["_persyaratan"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["_persyaratan"]["tmp_name"][$key];
    $name = $_FILES["_persyaratan"]["name"][$key];


  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/'.$name, $name);
       $zip->close();
     }
   }
 }

 if(empty($NIM) || empty($tglsem) || empty($jam)){
   echo "<script>window.alert('Data Kosong!')
  window.location='../user_page/index.php?ke=dadar-ruang'</script>";
 }else{
 $qry=$link->query("UPDATE tbldaftar_pendadaran SET file_persyaratan2='$namezip' WHERE kode_daftar='$kode'") or die(mysqli_error());
 $qry=$link->query("INSERT INTO tblseminar_pendadaran VALUES(
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
   '0',
   'Menunggu ruangan seminar')") OR die(mysqli_error());
   echo "<script>window.alert('Data Tersimpan!')
  window.location='../user_page/index.php?ke=home'</script>";

   $hapus=glob('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/*.jpg');
   foreach($hapus as $data){
     unlink($data);
   }
}

 ?>
