<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'dist/vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $passw='3pr0D1w1Cid4';
    //Pakai SMTP (Cari Pengertiannya nanti)

    $mail->IsHTML(false);
    //Debug SMTP. 0 untuk tidak ada pesan
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    //hostname
    $mail->Host = 'smtp.gmail.com';
    // $mail->Host = gethostbyname('smtp.gmail.com'); kalau SMTP ga support IPv6
    // port TLS untuk smtp gmail. bisa pakai 475 dan 25 (587)
    $mail->Port = 587;
    //sistem enkripsi yang digunakan
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'eprodi.prodisi@gmail.com';
    //Password to use for SMTP authentication
    $mail->Password =  "$passw";
    $mail->setFrom('eprodi.prodisi@gmail.com', 'eprodi-noreply');
?>
