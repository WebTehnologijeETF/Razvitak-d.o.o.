<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="skripta.js" type="text/javascript"> </script>
    <title>Izmjena korisnika</title>
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
if(isset($_REQUEST['korisnik']))
{
	$korisnik =htmlspecialchars($_REQUEST['korisnik'],ENT_QUOTES,'utf-8');
	$_SESSION['izmjenaKorisnikaId']=$korisnik;
	print "<h2> id:".$korisnik."</h2>";
	
}

else if(isset($_SESSION['izmjenaKorisnikaId']))
{
	$korisnik =htmlspecialchars($_SESSION['izmjenaKorisnikaId'],ENT_QUOTES,'utf-8');
	$_SESSION['izmjenaKorisnikaId']=$korisnik;
	print "<h2> id:".$korisnik."</h2>";
}
else
{
	print "<h2> Greska pri dobavljanju korisnika </h2>";

}

if(isset($_POST['usernameInput']) && isset($_POST['passwordInput']))
{
	
	$username=htmlspecialchars($_POST['usernameInput'],ENT_QUOTES,'utf-8');
	$password=htmlspecialchars($_POST['passwordInput'],ENT_QUOTES,'utf-8');
	
	$veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("UPDATE korisnici SET username='".$username."', password=MD5('" .$password."') where username='".$_SESSION['izmjenaKorisnikaId']."';");
     $rezultat->execute();
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	
	header("Location:adminpanelkorisnici.php");
	unset($_POST);
	
}
$veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
  
$veza->prepare("set names utf8");
     $rezultat = $veza->prepare("select username from korisnici where username='".$_SESSION['izmjenaKorisnikaId']."';");
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
foreach($rezultat as $korisnik)
{
$korisnickoime=$korisnik['username'];

}

?>
<div id="newsFormDiv">

<form method="post" action="izmjenaKorisnika.php" >

<label for="usernameInput"> Username </label><input type="text" id="usernameInput" name="usernameInput" value="<?php echo(isset($korisnickoime))?$korisnickoime:''; ?>"> <br> <br>
<label for="passwordInput"> Password </label><input type="password" id="passwordInput" name="passwordInput"> <br> <br>

<input type="submit" value="Izmijeni">

</form>
</div>

</div>

</body>
</html>