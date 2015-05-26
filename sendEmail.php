<?php

$ime = strip_tags($_POST['ime']);
$mail = strip_tags($_POST['mail']);
$message = strip_tags($_POST['textArea']);
$firm = strip_tags($_POST['firm']);

 $txt = 'Ime: ' . $ime . "\r\n" . 'Email: ' . $mail . "\r\n" . 'Firma: ' . $firm . "\r\n" . 'Poruka: ' . $message;
$headers = 'From: ahalilovic5@etf.unsa.ba CC: almin.halilovic@hotmail.com' . "\r\n" . 'Reply-To: ' . $mail;

$url = 'https://api.sendgrid.com/';
$user = 'Jhr1Ie5JRQ';
$pass = 'Vda6dFVVLp';
$cc = 'almin.halilovic@hotmail.com';
$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'ahalilovic5@etf.unsa.ba',
    'subject'   => 'Kontakt forma Razvitak d.o.o.',
    'text'      => $txt,
    'from'      => $mail,
	'cc'		=> $cc
  );
$request =  $url.'api/mail.send.json';
// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
// obtain response
$response = curl_exec($session);
curl_close($session);
// print everything out
print_r($response);
$json_response = json_decode($response, true);
if($json_response["message"] == "success") header("Location: index.php?poslan=da");
else header("Location: index.php?poslan=ne");
						

?>
