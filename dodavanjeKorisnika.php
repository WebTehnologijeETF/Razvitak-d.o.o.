<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="skripta.js" type="text/javascript"> </script>
    <title>Dodavanje korisnika</title>
  </head>
  <body>
  <div id="logo">
<img src="slike/logo.png" alt="logo">

</div>
  
  <div id="navigation">
<?php include('navigacija.php');?>
<?php include('navigacijaAdmin.php');?>
</div>

<div id="mainPart">


<?php
session_start();
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}


if(isset($_POST['usernameInput']) && isset($_POST['passwordInput']))
{
	
	$username=htmlspecialchars($_POST['usernameInput'],ENT_QUOTES,'utf-8');
	$password=htmlspecialchars($_POST['passwordInput'],ENT_QUOTES,'utf-8');
	
     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("INSERT INTO korisnici SET username='".$username."', password=MD5('" .$password."');");
     $rezultat->execute();
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	
	header("Location:adminpanelkorisnici.php");
	
	 
	 unset($_POST);
	 
}

?>

<div id="newsFormDiv">

<form method="post" action="dodavanjeKorisnika.php" >

<label for="usernameInput">Username </label><input type="text" id="usernameInput" name="usernameInput"> <br> <br>
<label for="passwordInput"> Password </label><input type="password" id="passwordInput" name="passwordInput" > <br> <br>

<input type="submit" value="Dodaj korisnika">

</form>
</div>

</div>

</body>
</html>