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
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}


if(isset($_POST['titleInput']) && isset($_POST['authorInput'])&& isset($_POST['imageInput']) && isset($_POST['textInput']))
{
	
	$tekst=htmlspecialchars($_POST['textInput'],ENT_QUOTES,'utf-8');
	$autor=htmlspecialchars($_POST['authorInput'],ENT_QUOTES,'utf-8');
	$naslov=htmlspecialchars($_POST['titleInput'],ENT_QUOTES,'utf-8');
	$slika=$_POST['imageInput'];
	$detalji=htmlspecialchars($_POST['detailsInput'],ENT_QUOTES,'utf-8');
	$imaDetalja=0;
	if($detalji!="") $imaDetalja=1;
	
     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("INSERT INTO vijest SET naslov='".$naslov."', tekst='" .$tekst."', autor='".$tekst."', slika='".$slika."', imaDetalja='".$imaDetalja."', detalji='" .$detalji."';");
     $rezultat->execute();
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	
	header("Location:adminpanel.php");
	
	 
	 unset($_POST);
	 
}

?>

<div id="newsFormDiv">

<form method="post" action="dodavanjeNovosti.php" >

<label for="titleInput"> Naslov </label><input type="text" id="titleInput" name="titleInput"> <br> <br>
<label for="authorInput"> Autor </label><input type="text" id="authorInput" name="authorInput" > <br> <br>
<label for="imageInput"> Link slike </label><input type="text" id="imageInput" name="imageInput" > <br> <br>
<label for="textInput"> Tekst </label><textarea id="textInput" name="textInput"></textarea> <br> <br>
<label for="detailsInput"> Detalji </label><textarea id="detailsInput" name="detailsInput" ></textarea> <br> <br>

<input type="submit" value="Dodaj vijest">

</form>
</div>

</div>

</body>
</html>