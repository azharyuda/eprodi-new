<?php

if(!isset($_GET['ke'])){
  include "home.php";
}else{
 $ke=$_GET['ke'];
if($ke=='kp'){ include "konfirmasi.php";}

/*
    /* Halaman Proposal Skripsi*/
    elseif($ke=='pr0p'){ include "skripsi_file/skripsi_konfirmasi/skripsi_konfirmasi_utama.php";}
    elseif($ke=='prop_konf'){ include "skripsi_file/skripsi_konfirmasi/skripsi_konfirmasi_input.php";}
    elseif($ke=='konf_smpn'){ include "skripsi_file/skripsi_konfirmasi/skripsi_konfirmasi_simpan.php";}
    elseif($ke=='prop_ok'){ include "skripsi_file/skripsi_diterima.php";}
    elseif($ke=='prop_no'){ include "skripsi_file/skripsi_ditolak.php";}
    elseif($ke=='jdl_ubah'){ include "skripsi_file/skripsi_ubahjudul/ubahjudul_utama.php";}
    elseif($ke=='ubahjdl_konf'){ include "skripsi_file/skripsi_ubahjudul/ubahjudul_konf.php";}
    elseif($ke=='ubahjdl_smpn'){ include "skripsi_file/skripsi_ubahjudul/ubahjudul_smpn.php";}
    elseif($ke=='skr1p_history'){ include "skripsi_file/skripsi_history.php";}

    /* Halaman Ubah Proposal Skripsi */
    elseif($ke=='pr0p_ubahutama'){ include "skripsi_file/skripsi_ubahproposal/ubahprop_utama.php";}
    elseif($ke=='pr0p_ubahkonf'){ include "skripsi_file/skripsi_ubahproposal/ubahprop_konf.php";}
    elseif($ke=='pr0p_smpnubah'){ include "skripsi_file/skripsi_ubahproposal/ubahprop_smpn.php";}

    /* Topik Skripsi */
    elseif($ke=='tpK'){ include "skripsi_file/skripsi_topik/utama_topik.php";}
    elseif($ke=='inpt_tpK'){ include "skripsi_file/skripsi_topik/input_topik.php";}
    elseif($ke=='smpn_tpK'){ include "skripsi_file/skripsi_topik/simpan_topik.php";}
    elseif($ke=='ubh_tpK'){ include "skripsi_file/skripsi_topik/ubahutama_topik.php";}
    elseif($ke=='smpn_ubhtpK'){ include "skripsi_file/skripsi_topik/simpanubah_topik.php";}
    elseif($ke=='hps_tpK'){ include "skripsi_file/skripsi_topik/hapus_topik.php";}

    /* Halaman Seminar KKP */
    elseif($ke=='kkP_dftr'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_utamaKKP.php";}
    elseif($ke=='kkP_konf'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_konfirmasiKKP.php";}
    elseif($ke=='kkP_smpn'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_smpnKKP.php";}
    elseif($ke=='kkP_ruang'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_utamaruanganKKP.php";}
    elseif($ke=='kkP_konfruang'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_inputruanganKKP.php";}
    elseif($ke=='kkP_ruangsmpn'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_smpnruangKKP.php";}
    elseif($ke=='kkP_jdwl'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_daftarKKP.php";}
    elseif($ke=='kkP_undang'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_nomorsuratKKP.php";}
    elseif($ke=='kkP_hsl'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_inputhasilKKP.php";}
    elseif($ke=='kkP_smpnhsl'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_smpnhasilKKP.php";}
    elseif($ke=='kkP_sdhmju'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_sudahmajuKKP.php";}

    elseif($ke=='kkP_remed'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_utamaremedyKKP.php";}
    elseif($ke=='kkP_konfremed'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_konfirmasiremedyKKP.php";}
    elseif($ke=='kkP_smpnremed'){include "seminar_file/seminarKKP-PI_file/seminarKKP/seminarKKPorPI_smpnremedyKKP.php";}

    /*Khusus seminar PI */
    elseif($ke=='P1_dftr'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_utamaPI.php";}
    elseif($ke=='P1_konf'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_konfirmasiPI.php";}
    elseif($ke=='P1_smpn'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_smpnPI.php";}
    elseif($ke=='P1_ruang'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_utamaruanganPI.php";}
    elseif($ke=='P1_konfruang'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_inputruanganPI.php";}
    elseif($ke=='P1_ruangsmpn'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_smpnruangPI.php";}
    elseif($ke=='P1_jdwl'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_daftarPI.php";}
    elseif($ke=='P1_undang'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_nomorsuratPI.php";}
    elseif($ke=='P1_hsl'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_inputhasilPI.php";}
    elseif($ke=='P1_smpnhsl'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_smpnhasilPI.php";}
    elseif($ke=='P1_sdhmju'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_sudahmajuPI.php";}

    elseif($ke=='P1_remed'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_utamaremedPI.php";}
    elseif($ke=='P1_konfremed'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_konfirmasiremedPI.php";}
    elseif($ke=='P1_smpnremed'){include "seminar_file/seminarKKP-PI_file/seminarPI/seminarKKPorPI_smpnremedPI.php";}

    /* Halaman Seminar proposal */
    elseif($ke=='sempr0'){include "seminar_file/seminar1_file/seminar1_utama.php";}
    elseif($ke=='sempr0_konfdaftar'){include "seminar_file/seminar1_file/seminar1_konfirmasidaftar.php";}
    elseif($ke=='sempr0_smpndaftar'){include "seminar_file/seminar1_file/seminar1_simpandaftar.php";}
    elseif($ke=='sempr0_utamaruang'){include "seminar_file/seminar1_file/seminar1_utamaruang.php";}
    elseif($ke=='sempr0_konf'){include "seminar_file/seminar1_file/seminar1_inputruangan.php";}
    elseif($ke=='sempr0_smpn'){include "seminar_file/seminar1_file/seminar1_smpn.php";}
    elseif($ke=='sempr0_jdwl'){include "seminar_file/seminar1_file/seminar1_daftar.php";}
    elseif($ke=='sempr0_hsl'){include "seminar_file/seminar1_file/seminar1_hasil.php";}
    elseif($ke=='sempr0_undang'){include "seminar_file/seminar1_file/seminar1_nomorsurat.php";}
    elseif($ke=='sempr0_smpnhsl'){include "seminar_file/seminar1_file/seminar1_smpnhasil.php";}
    elseif($ke=='sempr0_sudahmaju'){include "seminar_file/seminar1_file/seminar1_sudahmaju.php";}
    elseif($ke=='sempr0_remedy'){include "seminar_file/seminar1_file/seminar1_utamaremedy.php";}
    elseif($ke=='sempr0_konfremedy'){include "seminar_file/seminar1_file/seminar1_konfirmasiremedy.php";}
    elseif($ke=='sempr0_smpnremedy'){include "seminar_file/seminar1_file/seminar1_simpanremedy.php";}

    /* Halaman Seminar 2 */
    elseif($ke=='semh4s'){include "seminar_file/seminar2_file/seminar2_utama.php";}
    elseif($ke=='semh4s_konfdaftar'){include "seminar_file/seminar2_file/seminar2_konfirmasidaftar.php";}
    elseif($ke=='semh4s_smpndaftar'){include "seminar_file/seminar2_file/seminar2_simpandaftar.php";}
    elseif($ke=='semh4s_utamaruang'){include "seminar_file/seminar2_file/seminar2_utamaruang.php";}
    elseif($ke=='semh4s_konf'){include "seminar_file/seminar2_file/seminar2_inputruangan.php";}
    elseif($ke=='semh4s_smpn'){include "seminar_file/seminar2_file/seminar2_smpn.php";}
    elseif($ke=='semh4s_jdwl'){include "seminar_file/seminar2_file/seminar2_daftar.php";}
    elseif($ke=='semh4s_undang'){include "seminar_file/seminar2_file/seminar2_nomorsurat.php";}
    elseif($ke=='semh4s_hsl'){include "seminar_file/seminar2_file/seminar2_hasil.php";}
    elseif($ke=='semh4s_smpnhsl'){include "seminar_file/seminar2_file/seminar2_smpnhasil.php";}
    elseif($ke=='semh4s_sudahmaju'){include "seminar_file/seminar2_file/seminar2_sudahmaju.php";}
    /* Halaman Seminar 2 Remedy */
    elseif($ke=='semh4s-remedy'){include "seminar_file/seminar2_file/seminar2_utamaremedy.php";}
    elseif($ke=='semh4s_konfremedy'){include "seminar_file/seminar2_file/seminar2_konfirmasiremedy.php";}
    elseif($ke=='semh4s_smpnremedy'){include "seminar_file/seminar2_file/seminar2_simpanremedy.php";}

    /* Halaman Seminar Pendadaran */
    elseif($ke=='d4r'){include "seminar_file/seminarpendadaran_file/dadar_utama.php";}
    elseif($ke=='d4r_konfdaftar'){include "seminar_file/seminarpendadaran_file/dadar_konfirmasidaftar.php";}
    elseif($ke=='d4r_smpndaftar'){include "seminar_file/seminarpendadaran_file/dadar_simpandaftar.php";}
    elseif($ke=='d4r_utamaruang'){include "seminar_file/seminarpendadaran_file/dadar_utamaruang.php";}
    elseif($ke=='d4r_konf'){include "seminar_file/seminarpendadaran_file/dadar_inputruangan.php";}
    elseif($ke=='d4r_smpn'){include "seminar_file/seminarpendadaran_file/dadar_smpn.php";}
    elseif($ke=='d4r_jdwl'){include "seminar_file/seminarpendadaran_file/dadar_daftar.php";}
    elseif($ke=='d4r_undang'){include "seminar_file/seminarpendadaran_file/dadar_nomorsurat.php";}
    elseif($ke=='d4r_hsl'){include "seminar_file/seminarpendadaran_file/dadar_hasil.php";}
    elseif($ke=='d4r_smpnhsl'){include "seminar_file/seminarpendadaran_file/dadar_smpnhasil.php";}
    elseif($ke=='d4r_sudahmaju'){include "seminar_file/seminarpendadaran_file/dadar_sudahmaju.php";}

    /* Halaman Mahasiswa */
    elseif($ke=='mh5_predik'){ include "mahasiswa_file/mahasiswa_prediksi.php";}
    elseif($ke=='mh5_alert'){ include "mahasiswa_file/mahasiswa_peringatan.php";}
    elseif($ke=='mh5_dftr'){ include "mahasiswa_file/mahasiswa_user/mahasiswa_user_utama.php";}
    elseif($ke=='mh5_aktif'){ include "mahasiswa_file/mahasiswa_user_terdaftar.php";}
    elseif($ke=='mh5_konf'){ include "mahasiswa_file/mahasiswa_user/mahasiswa_user_konf.php";}
    elseif($ke=='mh5_smpnkonf'){ include "mahasiswa_file/mahasiswa_user/mahasiswa_user_smpn.php";}

    /* Halaman Ubah Proposal Mahasiswa */
    elseif($ke=='mh5_jdl'){ include "mahasiswa_file/mahasiswa_gantijudul/mahasiswa_utamaskrip.php";}
    elseif($ke=='mh5_ubhprop'){ include "mahasiswa_file/mahasiswa_gantijudul/mahasiswa_konfskrip.php";}
    elseif($ke=='mh5_smpnubh'){ include "mahasiswa_file/mahasiswa_gantijudul/mahasiswa_smpnskrip.php";}
    /* Halaman dosen */
    elseif($ke=='d5n'){include "dosen_file/dosen_utama.php";}
    elseif($ke=='inpt_dsn'){include "dosen_file/dosen_input.php";}
    elseif($ke=='hps_dsn'){include "dosen_file/dosen_hps.php";}
    elseif($ke=='smpn_dsn'){include "dosen_file/dosen_simpan.php";}
    elseif($ke=='ubh_dsn'){include "dosen_file/dosen_ubah.php";}
    elseif($ke=='smpn_ubhdsn'){include "dosen_file/dosen_simpanubah.php";}
    elseif($ke=='reset_dsn'){include "dosen_file/dosen_resetkuota.php";}
    elseif($ke=='grafik'){include "dosen_file/graph.php";}
    /* Skripsi Lama */
    elseif($ke=='skrP'){include "skripsi_file/skripsi_lama/skripsi_utama.php";}
    elseif($ke=='inpt_skrp'){include "skripsi_file/skripsi_lama/skripsi_input.php";}
    elseif($ke=='smpn_skrp'){include "skripsi_file/skripsi_lama/skripsi_simpan.php";}
    elseif($ke=='ubh_skrp'){include "skripsi_file/skripsi_lama/skripsi_ubah.php";}
    elseif($ke=='smpn_ubhskrp'){include "skripsi_file/skripsi_lama/skripsi_simpanubah.php";}


    elseif($ke=='hps_skrp'){include "skripsi_file/skripsi_lama/skripsi_hps.php";}

    elseif($ke=='ubh-pass'){include "akun/ubah_pass.php";}
    elseif($ke=='smpn-pass'){include "akun/ubah_passw_smpn.php";}
    elseif($ke='home'){include "core/home.php";}
    elseif($ke=='grafik'){include "core/graph.php";}
    else{include "core/404.php";}

    /* URL */
}
 ?>
