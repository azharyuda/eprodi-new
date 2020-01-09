<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  $qry=$link->query("SELECT * from tbldaftarseminar_kkporpi WHERE NIM=$_SESSION[NIM]");
  $take=$qry->fetch_array();

  $kd=$take['kode_daftar'];
  $jdl=$take['judul_KKPorPI'];
  $uji1=$take['rekom_dosenuji1'];
  $uji2=$take['rekom_dosenuji2'];
  $pil=$take['pilihan_KKPorPI'];
  $NIM=$_SESSION['NIM'];
  $tanggl=trim($_POST['_tglseminar']);
  $jam=trim($_POST['_jam']);
  $now=date("Y-m-d");
  $tgl=date("Y-m-d", strtotime($tanggl));

  if(empty($tanggl) || empty($jam) || empty($kd)){
    echo "<script>window.alert('Ada data yang belum terisi!')
   window.location='../user_page/index.php?ke=kkpi-ruang'</script>";
 }else{

  foreach ($_FILES["_persyaratan"]["error"] as $key => $error) {
  if ($error == UPLOAD_ERR_OK) {
    $allow_ext=array('jpg','jpeg');
    $name = $_FILES["_persyaratan"]["name"][$key];
    $x = explode('.', $name);
    $ext= strtolower(end($x));
  $tmp_name = $_FILES["_persyaratan"]["tmp_name"][$key];
if(in_array($ext, $allow_ext) === false){
  echo "<script>window.alert('Ekstensi File Salah')
 window.location='../user_page/index.php?ke=kkpi-ruang'</script>";
}else{
  $jadizip=move_uploaded_file($tmp_name, '../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/'.$name);
  if($jadizip){

    $zip = new ZipArchive;
    $namezip="$NIM-persyaratan-sekprodi.zip";
    if($zip->open('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/'.$namezip, ZipArchive::CREATE) !== TRUE) {
        echo "gagal zip";
      }
       $zip->addFile('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/'.$name, $name);
       $zip->close();
     }
   }
}
}
$simpan=$link->query("UPDATE tbldaftarseminar_kkporpi SET file_persyaratan2='$namezip' WHERE kode_daftar='$kd'") or die(mysqli_error());
  if($pil=='KKP'){
    $qry=$link->query("INSERT INTO tblseminar_kkp VALUES(
      '$kd',
      '$NIM',
      '$jdl',
      '$uji1',
      '$uji2',
      '$tgl',
      '$jam',
      '-',
      '0',
      '0',
      '0',
      '0',
      'Menunggu ruangan seminar',
      '$now')");

  }elseif($pil=='PI'){
    $qry=$link->query("INSERT INTO tblseminar_pi VALUES(
      '$kd',
      '$NIM',
      '$jdl',
      '$uji1',
      '$uji2',
      '$tgl',
      '$jam',
      '-',
      '0',
      '0',
      '0',
      '0',
      'Menunggu ruangan seminar',
      '$now')");

    }

    else{
      echo "<script>window.alert('Pilihan tidak tersedia!')
     window.location='../user_page/index.php?ke=kkpi-daftar'</script>";
    }
  }
    echo "<script>window.alert('Data Berhasil Disimpan!')
   window.location='../user_page/index.php?ke=home'</script>";
    $hapus=glob('../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/*.jpg');
    foreach($hapus as $data){
      unlink($data);
}
 ?>
