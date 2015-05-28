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

  
    <div id="commentsMainPart">
<?php
session_start();
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}



if(isset($_REQUEST['vijest']))
$vijest =htmlspecialchars($_REQUEST['vijest'],ENT_QUOTES,'utf-8');


if(isset($_REQUEST['vijest']))
echo "<h1> Vijest: ".htmlspecialchars($vijest,ENT_QUOTES,'utf-8') . "</h1> <hr>";
     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
     if(isset($_REQUEST['vijest'])){
     $veza->exec("set names utf8");
     $rezultat = $veza->query("select id,tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2,vijest, autor, mail from komentar where vijest=".$vijest." order by vrijeme asc;");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

     foreach ($rezultat as $komentar) {
		 print "<p class='author'> <strong> Autor: </strong> ".$komentar['autor']." </p> <p class='datePosted'> <strong> Datum i vrijeme : </strong> ".date("d.m.Y. (h:i)", $komentar['vrijeme2'])."</p>";
          print " </p> <br> <p> ".$komentar['tekst']."<br> <br> <strong> E-mail: </strong> ".$komentar['mail']."  <br> <br> <br>";
        
        print "<input type='button' value='Brisanje'  onclick=\"ajaxMenu('brisanjeKomentara.php?komentar=".$komentar['id']."');\">"; 
		print "<hr>";
     }
}

?>

</div>

  </body>
</html>
