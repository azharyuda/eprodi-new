<?php
  error_reporting();
  session_start();


  include "../dist/koneksi.php";
  /* Sesi */

  $NIM=$_SESSION['NIM'];
  $nm=$_SESSION['nm_mahasiswa'];
  $wali=$_SESSION['dosen_wali'];

  /* dari form */
  $pilihan=htmlspecialchars(addslashes(trim($_POST['_pilihan'])));
  if($pilihan=='kkP'){
    $terpilih="KKP";
  }elseif($pilihan=='p1'){
    $terpilih="PI";
  }else{
    echo "<script>window.alert('Pilihan tidak tersedia!')
   window.location='../user_page/index.php?ke=kkpi-daftar'</script>";
  }
  $judul=htmlspecialchars(addslashes(trim($_POST['_judul'])));
  $uji1=htmlspecialchars(addslashes(trim($_POST['_dosenuji1'])));
  $uji2=htmlspecialchars(addslashes(trim($_POST['_dosenuji2'])));
  $tgl_input=date('Y-m-d');


  /* untuk file */
  foreach ($_FILES["_file_persyaratan"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {

    $allow_ext=array('jpg','jpeg','zip');
    $name = $_FILES["_file_persyaratan"]["name"][$key];
    $x = explode('.', $name);
    $ext= strtolower(end($x));
  $tmp_name = $_FILES["_file_persyaratan"]["tmp_name"][$key];

  if(in_array($ext, $allow_ext) === false){
    echo "<script>window.alert('Ekstensi file tidak sama!')
   window.location='../user_page/index.php?ke=kkpi-daftar'</script>";
  }else{
  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-kaprodi.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/'.$name, $name);
       $zip->close();
     }

  }
}
}

 $savedir='files_upload/seminar_file/seminarKKP-PI_Persyaratan/';

     if($wali==$uji1 || $wali==$uji2 || $uji1==$uji2){
       echo "<script>window.alert('Data dosen ada yang sama!')
      window.location='../user_page/index.php?ke=kkpi-daftar'</script>";

     }elseif($NIM=='' || $terpilih=='' || $judul=='' ||
     $uji1=='' || $uji2=='' || $namezip=='' || $savedir==''){
       echo "<script>window.alert('Data Kosong')
      window.location='../user_page/index.php?ke=kkpi-daftar'</script>";
     }else{

 $qry=$link->query("INSERT INTO tbldaftarseminar_kkporpi VALUES(
   '',
   '$NIM',
   '$terpilih',
   '$judul',
   '$uji1',
   '$uji2',
   '$namezip',
   'Belum Ada',
   '$savedir',
   '$tgl_input',
   'Menunggu Konfirmasi')") OR die(mysqli_error());

   echo "<script>window.alert('Data Berhasil Disimpan!')
  window.location='../user_page/index.php?ke=home'</script>";
     $hapus=glob('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/*.jpg');
     foreach($hapus as $data){
       unlink($data);
     }
   }



 ?>
