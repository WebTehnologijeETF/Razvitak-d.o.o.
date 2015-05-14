<?php

$ime = $_POST['ime'];
$mail = $_POST['mail'];
$message = $_POST['textArea'];
$firm = $_POST['firm'];
echo          '<div id="confirmationDiv">';
echo		 '<p class="h2Style">Provjerite da li ste ispravno unijeli podatke:</p>';
echo         '<p class="djelatnost">Ime: ' .$ime. '</p>';
echo         '<p class="djelatnost">Email: ' .$mail. '</p>';
echo         '<p class="djelatnost">Poruka: ' .$message. '</p>';
echo         '<p class="djelatnost">Firma: ' .$firm. '</p>';
echo 		 '<form class="formElements" method="post" action="sendEmail.php">';
echo            '<input type="hidden" name="ime" value="' . $ime . '">';
echo            '<input type="hidden" name="mail" value="' . $mail . '">';
echo            '<input type="hidden" name="firm" value="' . $firm . '">';
echo            '<input type="hidden" name="textArea" value="' . $message . '">';

echo         	'<input type="submit" id="siguranButton" value="Siguran sam"><br>';
echo         '</form>';
echo 		 '<p class="h2Style">Ako ste pogrešno unijeli podatke, ovdje ih možete ispraviti:</p>';
echo         '</div>';
?>