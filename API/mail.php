<?php     
require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->$SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = '360storereport@gmail.com';
$mail->Password = 'Abbasali@360store';
$mail->SetFrom('shahbazlatheef@gmail.com');
$mail->Subject = 'Hello shaz';
$mail->Body = "Hi Shaz";
$mail->AddAddress('shahbazlatheef@gmail.com');
$mail->Send();
?>