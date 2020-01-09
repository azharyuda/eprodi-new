<?php
require "/user_page/koneksi.php";

  if($_POST['upload']){
    $allow_ext=array('docx','doc','pdf','zip','jpg');
    $nama=addslashes($_FILES['_file']['name']);
    $x = explode('.', $nama);
    $ext= strtolower(end($x));
    $size=$_FILES['_file']['size'];
    $file_tmp = $_FILES['_file']['tmp_name'];


    $salt="N1m4nD4";
    $NIM = addslashes($_POST['_NIM']);
    $nimacak=md5($NIM.$salt);
    $md5_nim=$nimacak;
    $nm_mahasiswa = addslashes($_POST['_nm_mahasiswa']);
    $tema_skripsi = addslashes($_POST['_tema_skripsi']);
    $judul_skripsi = addslashes($_POST['_judul_skripsi']);
    $dosbing1 = addslashes($_POST['_dosbing1']);
    $dosbing2 = addslashes($_POST['_dosbing2']);
    $dosen_penguji1 = addslashes($_POST['_dosen_penguji1']);
    $dosen_penguji2 = addslashes($_POST['_dosen_penguji2']);
    $tgl_input = date("Y-m-d");
    $status = 'Menunggu Konfirmasi';

    if(in_array($ext, $allow_ext) == true){
      if($size < 1044070){

        $namefile=$NIM.'-Proposal-'.$nama;
        move_uploaded_file($file_tmp, 'admin_page/skripsi_file/skripsi_konfirmasi/files/'.$namefile);

        $dir='skripsi_file/skripsi_konfirmasi/files/';
        $savedir=$dir.$NIM.'-Proposal-'.$nama;
        $qry = mysql_query("INSERT INTO tblpengajuan_proposal VALUES(
          '4',
          '$NIM',
          'SI',
          '$judul_skripsi',
          '$dosbing1',
          '$dosbing2',
          '$dosen_penguji1',
          '$dosen_penguji2',
          '$NIM-Proposal-$nama',
          '$savedir',
          '$tgl_input',
          '$status')") or die(mysql_error());

          if ($qry){
            echo "berhasil upload";
          }
      }
    }
  }
 ?>
