<?php
$to = "ahalilovic5@etf.unsa.ba";
$subject = "Razvitak-poruka";
$ime = strip_tags($_POST['ime']);
$mail = strip_tags($_POST['mail']);
$message = strip_tags($_POST['textArea']);
$firm = strip_tags($_POST['firm']);
$txt = 'Ime: ' . $ime . '\n' . 'Email: ' . $mail . '\n' . 'Firma: ' . $firm . '\n' . 'Poruka: ' . $message;
$headers = ' From:' .$mail .'CC: almin.halilovic@hotmail.com' . '\r\n' . 'Reply-To: ' . $message;
$isMailSent = mail($to,$subject,$txt,$headers);
echo '<script>' . 'alert("' . $isMailSent . '")' . '</script>';
?>
