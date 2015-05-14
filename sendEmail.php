<?php
$to = "ahalilovic5@etf.unsa.ba";
<<<<<<< HEAD
$subject = "Razvitak-poruka";
$ime = strip_tags($_POST['ime']);
$mail = strip_tags($_POST['mail']);
$message = strip_tags($_POST['textArea']);
$firm = strip_tags($_POST['firm']);
$txt = 'Ime: ' . $ime . '\n' . 'Email: ' . $mail . '\n' . 'Firma: ' . $firm . '\n' . 'Poruka: ' . $message;
$headers = ' From:' .$mail .'CC: almin.halilovic@hotmail.com' . '\r\n' . 'Reply-To: ' . $message;
=======
$subject = "Test poruka - kontakt forma";
$txt = 'Ime: ' . $_POST['ime'] . '\n' . 'Email: ' . $_POST['mail'] . '\n' . 'Firma: ' . $_POST['firm'] . '\n' . 'Poruka: ' . $_POST['textArea'];
$headers = 'CC: almin.halilovic@hotmail.com' . '\r\n' . 'Reply-To: ' . $_POST['mail'];
>>>>>>> origin/master
$isMailSent = mail($to,$subject,$txt,$headers);
echo '<script>' . 'alert("' . $isMailSent . '")' . '</script>';
?>