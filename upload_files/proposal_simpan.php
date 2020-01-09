<?php
  error_reporting();
  session_start();
  include "../dist/koneksi.php";
  /* Sesi */
  $NIM=$_SESSION['NIM'];
  $nm=$_SESSION['nm_mahasiswa'];
  /* Tpik Skripsi */
  $pilihan=htmlspecialchars(addslashes(trim($_POST['_topik'])));
  $judul=htmlspecialchars(addslashes(trim($_POST['_judul'])));
  $bing1=htmlspecialchars(addslashes(trim($_POST['_dosbing1'])));
  $bing2=htmlspecialchars(addslashes(trim($_POST['_dosbing2'])));
  $tgl_input=date('Y-m-d');
  $stat='Menunggu Konfirmasi';
  if(empty($NIM) || $judul=="" || $bing1=="" || $bing2=="" || $pilihan==""){
    echo "<script>window.alert('Ada data yang kosong')
   window.location='../user_page/index.php?ke=proposal-aju'</script>";
 }else{
  /* untuk file */
  $allow_ext=array('docx','doc','zip');
  $nama=addslashes($_FILES['_file_proposal']['name']);
  $x = explode('.', $nama);
  $ext= strtolower(end($x));
  $size=$_FILES['_file_proposal']['size'];
  $file_tmp = $_FILES['_file_proposal']['tmp_name'];
  if(in_array($ext, $allow_ext) === true){
      $namefile=$NIM.'-Proposal-'.$nama;
      move_uploaded_file($file_tmp, '../admin_page/files_upload/proposal_file/'.$namefile);
      $dir='files_upload/proposal_file/';
      $savedir=$dir.$namefile;


     /* validasi agar dosen tidak ada yang sama */
if($bing1==$bing2){
  echo "<script>window.alert('Dosen Pembimbing Sama!')
 window.location='../user_page/index.php?ke=proposal-aju'</script>";
}else{
 $qry=$link->query("INSERT INTO tblpengajuan_proposal VALUES(
   '',
   '$NIM',
   '$pilihan',
   '$judul',
   '$bing1',
   '$bing2',
   '$NIM-Proposal-$nama',
   '$savedir',
   '$tgl_input',
   '$stat')") OR die(mysqli_error());
}
}else{
  echo "<script>window.alert('Ekstensi File salah')
 window.location='../user_page/index.php?ke=proposal-aju'</script>";
}
echo "<script>window.alert('Data berhasil disimpan')
window.location='../user_page/index.php?ke=home'</script>";
}



 ?>
