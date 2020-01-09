<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  /* Sesi */
  $NIM=$_SESSION['NIM'];

  /* dari form */
  $tgl_input=date('Y-m-d');


  /* untuk file */
  foreach ($_FILES["_syarat"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["_syarat"]["tmp_name"][$key];
    $name = $_FILES["_syarat"]["name"][$key];


  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-Prodi.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/'.$name, $name);
       $zip->close();
     }
   }
 }
 if(empty($NIM)){
   echo "<script>window.alert('Data Kosong!')
  window.location='user_page/index.php?ke=dadar-dftr'</script>";
 }else{
 $savedir='files_upload/seminar_file/pendadaran_persyaratan/';


 $qry=$link->query("INSERT INTO tbldaftar_pendadaran VALUES(
    '',
   '$NIM',
   '$namezip',
   'Belum Ada',
   '$savedir',
   '$tgl_input',
   'Menunggu Konfirmasi')") OR die(mysqli_error());
   echo "<script>window.alert('Pendaftaran Berhasil')
  window.location='../user_page/index.php?ke=home'</script>";

   $hapus=glob('../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/*.jpg');
   foreach($hapus as $data){
     unlink($data);
   }
}

 ?>
