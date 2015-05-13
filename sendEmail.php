<?php
$to = "ahalilovic5@etf.unsa.ba";
$subject = "Test poruka - kontakt forma";
$txt = 'Ime: ' . $_POST['ime'] . '\n' . 'Email: ' . $_POST['mail'] . '\n' . 'Firma: ' . $_POST['firm'] . '\n' . 'Poruka: ' . $_POST['textArea'];
$headers = 'CC: almin.halilovic@hotmail.com' . '\r\n' . 'Reply-To: ' . $_POST['mail'];
$isMailSent = mail($to,$subject,$txt,$headers);
echo '<script>' . 'alert("' . $isMailSent . '")' . '</script>';
?>