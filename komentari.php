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
</div>

  
    <div id="commentsMainPart">
<?php
if(isset($_REQUEST['vijest']))
$vijest =htmlspecialchars($_REQUEST['vijest'],ENT_QUOTES,'utf-8');

if(isset($_POST['inputText']) && isset($_POST['inputAutor']))
{
	
	$tekst=htmlspecialchars($_POST['inputText'],ENT_QUOTES,'utf-8');
	$autor=htmlspecialchars($_POST['inputAutor'],ENT_QUOTES,'utf-8');
	$mail=null;
	if(isset($_POST['inputText']))
	$mail=htmlspecialchars($_POST['inputMail'],ENT_QUOTES,'utf-8');
	
	
     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->exec("set names utf8");
     $rezultat = $veza->query("INSERT INTO komentar SET vijest='".htmlspecialchars($_REQUEST['vijest'],ENT_QUOTES,'utf-8')."', tekst='" .htmlspecialchars($tekst,ENT_QUOTES,'utf-8')."', autor='".htmlspecialchars($autor,ENT_QUOTES,'utf-8')."', mail='".htmlspecialchars($mail,ENT_QUOTES,'utf-8')."';");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	header("Location:" .$_SERVER['REQUEST_URI']);
	
	 
	 unset($_POST);
	 
}


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
          print " </p> <br> <p> ".$komentar['tekst']."<br> <br> <strong> E-mail: </strong> ".$komentar['mail']."  <br>";
        print "<hr>";
        
     }
}

?>

</div>

<div class="contactForm">
<h2> Ostavite nam komentar. </h2> <br>
<form id="divForm" method="post" action="komentari.php?vijest=<?php if(isset($_REQUEST['vijest'])) echo htmlspecialchars($_REQUEST['vijest'],ENT_QUOTES,'utf-8') ?>">

<div class="contactFormText">
<p > Ime i prezime*  </p>
<p>  Email </p>
<p > Poruka* </p>
</div>

<div class="contactFormInput" >

<p><input type="text" id="nameInput" name="inputAutor"></p>
<p>  <input type="text" id="mailInput" name="inputMail"> </p>
 <textarea   id="textArea" name="inputText"> </textarea><br><br>
</div>
 <div id="contactFormButtons">
<input type="submit" id="submitButton" onclick="validateFormComment()" value="Komentiraj">  <input type="reset" value="Poništi">
</div>

</form>

</div>


  </body>
</html>
