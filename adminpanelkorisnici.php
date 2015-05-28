<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="skripta.js" type="text/javascript"> </script>
    <title>Komentari</title>
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
if(!isset($_SESSION['username'])) {header("Location:prijava.php");} 
?>


<?php 

     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	// $veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("select username from korisnici");
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 $korisnici=array();
	 
	 $brojKorisnika=$rezultat->rowCount();
	 $_SESSION['brojKorisnika']=$brojKorisnika;
	 
	 
	 foreach($rezultat as $korisnik)
	 array_push($korisnici,$korisnik);
	 
	 for ($i=0; $i<count($korisnici); $i++)
	 {
	 $k=$korisnici[$i];
	 echo "<h3> ".$k['username']. "</h3>";
	 print "<input type='button' value='Izmjena' onclick=\"ajaxMenu('izmjenaKorisnika.php?korisnik=".$k['username']."');\">";
	 print "<input type='button' value='Brisanje' onclick=\"ajaxMenu('brisanjeKorisnika.php?korisnik=".$k['username']."');\">";
	 echo "<hr>";
	 
	 }
	 ?>
	 <input type="button" onclick="document.location.href='dodavanjeKorisnika.php'" value="Dodaj korisnika">
</div>
</body>
</html>
