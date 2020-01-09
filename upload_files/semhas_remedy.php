<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  /* Sesi */
  $NIM=$_SESSION['NIM'];

  /* dari form */
  $tgl_input=date('Y-m-d');
  $usul=htmlspecialchars(addslashes(trim($_POST['_dosenuji2'])));


  /* untuk file */
  foreach ($_FILES["_persyaratan"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["_persyaratan"]["tmp_name"][$key];
    $name = $_FILES["_persyaratan"]["name"][$key];


  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-Prodi.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/'.$name, $name);
       $zip->close();
     }
   }
 }

 $savedir='files_upload/seminar_file/seminar2_persyaratan/';

 if(empty($NIM) || empty($usul)){
   echo "<script>window.alert('Data Kosong!')
  window.location='user_page/index.php?ke=semhas-ulang'</script>";
 }else{

 $qry=$link->query("INSERT INTO tbldaftarseminar_skripsi VALUES(
   '',
   '$NIM',
   'Seminar 2',
   '$usul',
   '$namezip',
   'Belum Ada',
   '$savedir',
   '$tgl_input',
   'Menunggu Konfirmasi Ujian Ulang')") OR die(mysqli_error());
   echo "<script>window.alert('Pendaftaran Berhasil')
  window.location='../user_page/index.php?ke=home'</script>";

   $hapus=glob('../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/*.jpg');
   foreach($hapus as $data){
     unlink($data);
   }
}

 ?>
